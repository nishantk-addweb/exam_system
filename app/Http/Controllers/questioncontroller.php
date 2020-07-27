<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questions;
use App\categories;
use Session;
use Cookie;
class questioncontroller extends Controller
{
    //

     function show(Request $request)
    {   
            
       // return $valcookie;
        // die;       


        if($request->has('q_id')){
            
            $valcookie = $_COOKIE['first'];
            $q_id = $request->q_id;
            $data = questions::where("cat_id","=",$valcookie)
                    ->where("id",">",$q_id)
                    ->limit(1)
                    ->get();     
                   // return $data;
                   //  die;
        } else {
            // echo $request->cat_id;
            // die;
            $name = "first";
            // unset($_COOKIE['first']);
            setcookie($name,$request->cat_id);
            $_COOKIE['first']=$request->cat_id;
            
            $valcookie = $_COOKIE[$name];
            $data = questions::where("cat_id",$valcookie)->limit(1)->get();
        }
        // if($request->has('next')){
        //     $q_id = $request->q_id;
        //     //Save in data base code here
        // }
        
        return view('question',['data'=>$data]);
    }
    function save(Request $req)
    {


        $result = new questions;
        $result->cat_id=$req->category;
        $result->quename=$req->qname;
        $result->optA=$req->optA;
        $result->optB=$req->optB;
        $result->optC=$req->optC;
        $result->optD=$req->optD;
        $result->correctans=$req->correct;
        $result->save();

        return redirect()->back();
    }

    function showcat(Request $req)
    {
        $cat = categories::all();

        return view('insquestion',['cat'=>$cat]);
    }
}
