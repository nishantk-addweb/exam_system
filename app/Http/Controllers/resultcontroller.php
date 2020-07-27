<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\result;
use App\questions;
use Auth;
class resultcontroller extends Controller
{
    //
    function save(Request $req)
    {
        $result = new result;
        $result->user_id=$req->user_id;
        $result->q_id=$req->q_id;
        $result->selectedans=$req->result;
        $result->category_id=$_COOKIE['first'];
        $result->save();
        
        //session()->flash('msg', 'Successfully done the operation.');
        return redirect()->back();
        
    }

    function display()
    {
        $valcookie = $_COOKIE['first'];
        $totalcorrectans = 0;
        $totalwrongans = 0;
        $show = result::where('user_id',Auth::user()->id)
                ->where("category_id",$valcookie)
                ->get();
        
        $totalquestions = questions::where("cat_id",$valcookie)->count();
        // die;
        //return $correctans;
        foreach($show as $show1)
        {
            $qid = $show1->q_id;
            $selectedans = $show1->selectedans;
            $dataans = questions::where('id',$qid)->first();
            $correctans = $dataans->correctans;
            
            if(trim($selectedans) == trim($correctans))
            {
                $totalcorrectans++;
            } else{
                $totalwrongans++;
            }
            //echo "<br>".$correctans;
        }
        //echo $totalcorrectans."<br>".$totalwrongans;
        
        return view('displayresult',compact(['totalcorrectans','totalwrongans','totalquestions']));

    }
}
