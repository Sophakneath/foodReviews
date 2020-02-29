<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;

class moreData extends Controller
{
    function showData()
    {
        $uid=0;
        if(Auth::check()) 
        {
            $user = Auth::user();
            $uid = $user->id;
        }
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating','saveFoods.reviewerID as saverID')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('posts.status','=','accepted')
                            ->leftJoin('saveFoods','posts.id','=','saveFoods.id','AND','saveFoods.reviewerID','=',$uid)
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('uid',$uid)->with('code',"0");
    }

    function showTopView()
    {
        $uid=0;
        if(Auth::check()) 
        {
            $user = Auth::user();
            $uid = $user->id;
        }
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating','saveFoods.reviewerID as saverID')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('posts.status','=','accepted')
                            ->leftJoin('saveFoods','posts.id','=','saveFoods.id','AND','saveFoods.reviewerID','=',$uid)
                            ->orderBy('click_count', 'desc')
                            ->paginate(9);

        $title = "TOP VIEW DISHES";
        return view('moreData')->with('data', $data)->with('title', $title)->with('uid',$uid)->with('code',"0");
    }

    function showTopRating()
    {
        $uid=0;
        if(Auth::check()) 
        {
            $user = Auth::user();
            $uid = $user->id;
        }
        $data = \DB::table('posts')
                           ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"), 'saveFoods.reviewerID as saverID')
                           ->join('dishes','dishes.dishID','=','posts.dishID')
                           ->join('users','users.id','=','posts.reviewerID')
                           ->where('posts.rating', '=', '5')
                           ->where('posts.status','=','accepted')
                           ->leftJoin('saveFoods','posts.id','=','saveFoods.id','AND','saveFoods.reviewerID','=',$uid)
                           ->orderBy('posts.checked_at', 'desc')
                           ->paginate(16);

        $title = "TOP RATING DISHES";

        return view('topRating')->with('data', $data)->with('title', $title)->with('uid',$uid)->with('code',"0");
    }

    function showDataFood()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Food')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataVeg()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Vegetarian')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataMeat()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Meat Lover')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataHealthy()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Healthy')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataSpicy()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Spicy Lover')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showTopViewFood()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Food')
                            ->where('posts.status','=','accepted')
                            ->orderBy('click_count', 'desc')
                            ->paginate(9);

        $title = "TOP VIEW FOOD";
        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }
    function showTopRatingFood()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Food')
                            ->where('posts.rating','=','5')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(16);

        $title = "TOP RATING FOOD";

        return view('topRating')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataDrink()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Drink')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataSmo()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Smoothie')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataJuice()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Juice')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataEnergy()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Energy')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataAlc()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Alcoholic')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showTopViewDrink()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Drink')
                            ->where('posts.status','=','accepted')
                            ->orderBy('click_count', 'desc')
                            ->paginate(9);

        $title = "TOP VIEW Drink";
        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }
    function showTopRatingDrink()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Drink')
                            ->where('posts.rating','=','5')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(16);

        $title = "TOP RATING Drink";

        return view('topRating')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataDessert()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Dessert')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataCoo()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Cookie')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataCake()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Cake')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataCho()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Chocolate')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }

    function showDataIce()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Ice Cream')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }


    function showTopViewDessert()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Dessert')
                            ->where('posts.status','=','accepted')
                            ->orderBy('click_count', 'desc')
                            ->paginate(9);

        $title = "TOP VIEW Dessert";
        return view('moreData')->with('data', $data)->with('title', $title)->with('code',"1");
    }
    function showTopRatingDessert()
    {
        $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Dessert')
                            ->where('posts.rating','=','5')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.checked_at', 'desc')
                            ->paginate(16);

        $title = "TOP RATING Dessert";

        return view('topRating')->with('data', $data)->with('title', $title)->with('code',"1");
    }
}
