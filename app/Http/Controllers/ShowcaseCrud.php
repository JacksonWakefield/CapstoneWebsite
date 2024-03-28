<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Validator;

class ShowcaseCrud extends Controller
{

    public function add(Request $request){
        $validator = Validator::make($request->all(), [
            'Email' => 'required|email|regex:/@asu\.edu$/i',
            'ProjectTitle' => 'required|unique:ShowcaseEntries,ProjectTitle',
            "ProjectDescription"=>"required",
            "Sponsor"=>"required",
            "MemberNames"=>"required",
            "CourseNumber"=>"required",
            "Demo"=>"required",
            "Power"=>"required",
            "NDA"=> "required",
            'VideoLink' => 'required|url',
        ], [
            'Email.regex' => 'The email must be an "@asu.edu" email address',
            'ProjectTitle.unique' => 'This project name already exists, duplicate entry detected.',
            'VideoLink.url' => 'The video link must be a valid url'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $videolink = $request->input('VideoLink');
        $embedlink = $this->getYouTubeEmbedLink($videolink);
        //$request->merge(['VideoLink' => $embedlink]);

        //$request->validate([
            //"Email"=>"required",
            //"ProjectTitle"=>"required",
            
            //"VideoLink"=>"required"
        //]); shouldnt need anymore

        $query = DB::table('ShowcaseEntries')->insert([
            "Email"=>$request->input("Email"),
            "ProjectTitle"=>$request->input("ProjectTitle"),
            "ProjectDescription"=>$request->input("ProjectDescription"),
            "Sponsor"=>$request->input("Sponsor"),
            "MemberNames"=>$request->input("MemberNames"),
            "CourseNumber"=>$request->input("CourseNumber"),
            "Demo"=>$request->input("Demo"),
            "Power"=>$request->input("Power"),
            "NDA"=>$request->input("NDA"),
            "VideoLink"=>$embedlink,
            "VideoLinkRaw"=>$request->input('VideoLink'),
            "DateStamp"=> date("Y-m-d H:i:s")
        ]);

        //THIS ISNT EFFICIENT - on a time crunch here, but this is used as the info in the email thats sent on success
        $Email = $request->input("Email");
        $ProjectTitle=$request->input("ProjectTitle");
        $ProjectDescription=$request->input("ProjectDescription");
        $Sponsor=$request->input("Sponsor");
        $MemberNames=$request->input("MemberNames");
        $CourseNumber=$request->input("CourseNumber");
        $Demo=$request->input("Demo");
        $Power=$request->input("Power");
        $NDA=$request->input("NDA");
        $VideoLink=$request->input("VideoLink");

        if($query){
            //SEND EMAIL RECIEPT

            $message = "Thank you for submitting your capstone survey information. Below is a reciept outlining the information you have entered.
            \n
            \n
            Email: $Email \n
            Project Title: $ProjectTitle \n
            Project Description: $ProjectDescription \n
            Sponsor: $Sponsor \n
            Team Member Names: $MemberNames \n
            Course Number: $CourseNumber \n
            Demo: $Demo \n
            Power: $Power \n
            NDA: $NDA \n
            Video Link: $VideoLink \n
            \n
            
            Remember: if you need to edit information submitted in this form, please email: showcasewebsite@asu.edu with - \n
            1. The name of your project (exactly as listed on Canvas)
            2. The name of the information you wish to edit (Example: Team Member Names) \n
            3. The new information";

            //might need a failsafe for if the email is weird or innacurate
            mail($Email, 'Thank you for submitting your capstone survey information', $message);

            return view("/surveySuccess");
        }else{
            return back()->with("fail","Something went wrong - data have NOT been inserted");
        }
    }

    private function getYouTubeEmbedLink($watchLink)
    {
        $videoId = $this->getYouTubeVideoId($watchLink);
        return 'https://www.youtube.com/embed/' . $videoId;
    }

    private function getYouTubeVideoId($watchLink)
    {
        $query = parse_url($watchLink, PHP_URL_QUERY);
        parse_str($query, $params);
        return isset($params['v']) ? $params['v'] : null;
    }

    public function surveyIndex(){
        $projectNames = DB::table('teams_and_teams_ids___sheet1')->pluck('Teams');

        $data = array(
            'projectNames' => $projectNames
        );

        return view("/survey",$data);
    }

    public function showcaseIndex(){

        $data = array(
            'list' => DB::table("ShowcaseEntries")->get()
        );
        



        return view("CSE-Showcase", $data);
    }

    public function adminIndex(){
        return view("admin");
    }

    public function getPass(Request $request){
        $data = array(
            'list' => DB::table("admin_pass_hash")->get()
        );
        
        foreach( $data['list'] as $key ){
            if(Hash::check($request->input('pass'), $key->pass_hash)){
                info("Admin Successfuly Logged In");
                return redirect("/adminAuth"); // THIS SETUP IS BAD - TODO: Session IDs/cookies/setup the whole user situation
                //It'll use the "Auth" Facade, so if you're seeing this and want to do it (depends on how secure they
                //want this info to be), look that up
            }
        }
        //sample comment
        info("COULD NOT VERIFY ADMINISTRATION LOGIN");
        return back()->with("success","Admin Login Attempt Failed - Incorrect Password");
    }

    public function adminAuthIndex(){
        return view("adminAuth");
    }

    public function adminDownload(){

        $csvFileName = 'CSE-Showcase-Data.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attatchment; filename="' . $csvFileName . '"',
        ];

        $callback = function() {
            $newdata = array(
                'list' => DB::table("ShowcaseEntries")->get()
            );
    
            
    
            $handle = fopen('php://output','w');
    
            $columnNames = ['Email', 'ProjectTitle', 'ProjectDescription', 'Sponsor', 'MemberNames', 'CourseNumbers', 'Demo', 'Power', 'NDA', 'VideoLink'];
    
            fputcsv($handle, $columnNames);
    
            foreach($newdata['list'] as $listing){
                $row = [];
                foreach($listing as $key => $value){
                    array_push($row, $value);
                }
    
                fputcsv($handle, $row);
            }
    
            fclose($handle);
        };
        

        return response()->stream($callback, 200, $headers);
    }
}