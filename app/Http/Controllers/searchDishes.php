<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class searchDishes extends Controller
{
    function showResult(Request $request)
    {
        $name = $request->input("name");
        $mainCat = $request->input("mainCat");
        $result = \DB::table('posts')
                           ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                           ->join('dishes','dishes.dishID','=','posts.dishID')
                           ->join('users','users.id','=','posts.reviewerID')
                           ->where('dishes.name', 'like', '%'.$name.'%')
                           ->where('dishes.main_Cat','=',$mainCat)
                           ->where('posts.status','=','accepted')
                           ->orderBy('posts.checked_at', 'desc')
                           ->get();
        
        return view('search')->with('result', $result)->with('name', $name)->with('mainCat',$mainCat);
    }
    function showFood(Request $request)
    {
        $name = $request->input("name");
        $type = $request->input("type");
        $result = \DB::table('posts')
                           ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                           ->join('dishes','dishes.dishID','=','posts.dishID')
                           ->join('users','users.id','=','posts.reviewerID')
                           ->where('dishes.name', 'like', '%'.$name.'%')
                           ->where('dishes.category','=',$type)
                           ->where('posts.status','=','accepted')
                           ->orderBy('posts.checked_at', 'desc')
                           ->get();
        
        return view('searchFood')->with('result', $result)->with('name', $name)->with('type',$type);
    }

    function showDrink(Request $request)
    {
        $name = $request->input("name");
        $type = $request->input("type");
        $result = \DB::table('posts')
                           ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                           ->join('dishes','dishes.dishID','=','posts.dishID')
                           ->join('users','users.id','=','posts.reviewerID')
                           ->where('dishes.name', 'like', '%'.$name.'%')
                           ->where('dishes.type','=',$type)
                           ->where('posts.status','=','accepted')
                           ->orderBy('posts.checked_at', 'desc')
                           ->get();
        
        return view('searchDrink')->with('result', $result)->with('name', $name)->with('type',$type);
    }

    function showDessert(Request $request)
    {
        $name = $request->input("name");
        $type = $request->input("type");
        $result = \DB::table('posts')
                           ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                           ->join('dishes','dishes.dishID','=','posts.dishID')
                           ->join('users','users.id','=','posts.reviewerID')
                           ->where('dishes.name', 'like', '%'.$name.'%')
                           ->where('dishes.type','=',$type)
                           ->where('posts.status','=','accepted')
                           ->orderBy('posts.checked_at', 'desc')
                           ->get();
        
        return view('searchDessert')->with('result', $result)->with('name', $name)->with('type',$type);
    }
}
