<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowcaseCrud extends Controller
{

    public function add(Request $request){
        $request->validate([
            "Email"=>"required",
            "ProjectTitle"=>"required",
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
            "VideoLink"=>"required"
        ]);

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

    public function surveyIndex(){
        return view("/survey");
    }

    public function showcaseIndex(){

        $data = array(
            'list' => DB::table("ShowcaseEntries")->get()
        );
        



        return view("CSE-Showcase", $data);
    }

    public function get(Request $request){

    }
}




?>