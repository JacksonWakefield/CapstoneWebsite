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
            "TeamName"=>"required",
            "Sponsor"=>"required",
            "MemberNames"=>"required",
            "Attendance"=>"required",
            "VegLunch"=>"required",
            "CourseNumber"=>"required",
            "Demo"=>"required",
            "Power"=>"required",
            "NDA"=> "required",
            'VideoLink' => 'required|url'
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
        $request->merge(['VideoLink' => $embedlink]);

        //$request->validate([
            //"Email"=>"required",
            //"ProjectTitle"=>"required",
            
            //"VideoLink"=>"required"
        //]); shouldnt need anymore

        $query = DB::table('ShowcaseEntries')->insert([
            "Email"=>$request->input("Email"),
            "ProjectTitle"=>$request->input("ProjectTitle"),
            "ProjectDescription"=>$request->input("ProjectDescription"),
            "TeamName"=>$request->input("TeamName"),
            "Sponsor"=>$request->input("Sponsor"),
            "MemberNames"=>$request->input("MemberNames"),
            "Attendance"=>$request->input("Attendance"),
            "VegLunch"=>$request->input("VegLunch"),
            "CourseNumber"=>$request->input("CourseNumber"),
            "Demo"=>$request->input("Demo"),
            "Power"=>$request->input("Power"),
            "NDA"=>$request->input("NDA"),
            "VideoLink"=>$request->input("VideoLink")
        ]);

        if($query){
            return back()->with("success","Data have been successfully inserted");
        }else{
            return back()->with("fail","Something webnt wrong - data have NOT been inserted");
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
        return view("/survey");
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
        $newdata = array(
            'list' => DB::table("ShowcaseEntries")->get()
        );

        $csvFileName = 'CSE-Showcase-Data.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attatchment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output','w');

        $columnNames = ['Email', 'ProjectTitle', 'ProjectDescription', 'TeamName', 'Sponsor', 'MemberNames', 'Attendance', 'VegLunch', 'CourseNumbers', 'Demo', 'Power', 'NDA', 'VideoLink'];

        fputcsv($handle, $columnNames);

        foreach($newdata['list'] as $listing){
            $row = [];
            foreach($listing as $key => $value){
                array_push($row, $value);
            }

            fputcsv($handle, $row);
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }
}