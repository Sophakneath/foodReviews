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
                           ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country', 'dishes.category', 'dishes.main_cat', 'reviewers.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                           ->join('dishes','dishes.dishID','=','posts.dishID')
                           ->join('reviewers','reviewers.reviewerID','=','posts.reviewerID')
                           ->where('dishes.name', 'like', '%'.$name.'%')
                           ->where('dishes.main_Cat','=',$mainCat)
                           ->get();
        
        return view('search')->with('result', $result)->with('name', $name)->with('mainCat',$mainCat);
    }
    function showFood(Request $request)
    {
        $name = $request->input("name");
        $type = $request->input("type");
        $result = \DB::table('posts')
                           ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country', 'dishes.category', 'dishes.main_cat', 'reviewers.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                           ->join('dishes','dishes.dishID','=','posts.dishID')
                           ->join('reviewers','reviewers.reviewerID','=','posts.reviewerID')
                           ->where('dishes.name', 'like', '%'.$name.'%')
                           ->where('dishes.category','=',$type)
                           ->get();
        
        return view('searchFood')->with('result', $result)->with('name', $name)->with('type',$type);
    }

    function showDrink(Request $request)
    {
        $name = $request->input("name");
        $type = $request->input("type");
        $result = \DB::table('posts')
                           ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country', 'dishes.category', 'dishes.main_cat', 'reviewers.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                           ->join('dishes','dishes.dishID','=','posts.dishID')
                           ->join('reviewers','reviewers.reviewerID','=','posts.reviewerID')
                           ->where('dishes.name', 'like', '%'.$name.'%')
                           ->where('dishes.type','=',$type)
                           ->get();
        
        return view('searchDrink')->with('result', $result)->with('name', $name)->with('type',$type);
    }

    function showDessert(Request $request)
    {
        $name = $request->input("name");
        $type = $request->input("type");
        $result = \DB::table('posts')
                           ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country', 'dishes.category', 'dishes.main_cat', 'reviewers.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                           ->join('dishes','dishes.dishID','=','posts.dishID')
                           ->join('reviewers','reviewers.reviewerID','=','posts.reviewerID')
                           ->where('dishes.name', 'like', '%'.$name.'%')
                           ->where('dishes.type','=',$type)
                           ->get();
        
        return view('searchDessert')->with('result', $result)->with('name', $name)->with('type',$type);
    }
}
