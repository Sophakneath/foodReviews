<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class moreData extends Controller
{
    function showData()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataFood()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Food')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataVeg()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Vegetarian')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataMeat()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Meat Lover')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataHealthy()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Healthy')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataSpicy()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Spicy Lover')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showTopView()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating', 'posts.click_count', 'dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('posts.status','=','accepted')
                            ->orderBy('click_count', 'desc')
                            ->groupBy('posts.id')
                            ->paginate(9);

        $title = "TOP VIEW DISHES";
        return view('moreData')->with('data', $data)->with('title', $title);
    }
    function showTopRating()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country', 'dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('posts.rating','=','5')
                            ->where('posts.status','=','accepted')
                            ->paginate(16);

        $title = "TOP RATING DISHES";

        return view('topRating')->with('data', $data)->with('title', $title);;
    }

    function showTopViewFood()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating', 'posts.click_count', 'dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Food')
                            ->where('posts.status','=','accepted')
                            ->orderBy('click_count', 'desc')
                            ->groupBy('posts.id')
                            ->paginate(9);

        $title = "TOP VIEW FOOD";
        return view('moreData')->with('data', $data)->with('title', $title);
    }
    function showTopRatingFood()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country', 'dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Food')
                            ->where('posts.rating','=','5')
                            ->where('posts.status','=','accepted')
                            ->paginate(16);

        $title = "TOP RATING FOOD";

        return view('topRating')->with('data', $data)->with('title', $title);;
    }

    function showDataDrink()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Drink')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataSmo()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Smoothie')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataJuice()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Juice')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataEnergy()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Energy')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataAlc()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Alcoholic')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showTopViewDrink()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating', 'posts.click_count', 'dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Drink')
                            ->where('posts.status','=','accepted')
                            ->orderBy('click_count', 'desc')
                            ->groupBy('posts.id')
                            ->paginate(9);

        $title = "TOP VIEW Drink";
        return view('moreData')->with('data', $data)->with('title', $title);
    }
    function showTopRatingDrink()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country', 'dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Drink')
                            ->where('posts.rating','=','5')
                            ->where('posts.status','=','accepted')
                            ->paginate(16);

        $title = "TOP RATING Drink";

        return view('topRating')->with('data', $data)->with('title', $title);;
    }

    function showDataDessert()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Dessert')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataCoo()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Cookie')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataCake()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Cake')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataCho()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Chocolate')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }

    function showDataIce()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Ice Cream')
                            ->where('posts.status','=','accepted')
                            ->paginate(9);

        $title = "FIND OUT MORE ABOUT THESE DISHES";

        return view('moreData')->with('data', $data)->with('title', $title);
    }


    function showTopViewDessert()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating', 'posts.click_count', 'dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Dessert')
                            ->where('posts.status','=','accepted')
                            ->orderBy('click_count', 'desc')
                            ->groupBy('posts.id')
                            ->paginate(9);

        $title = "TOP VIEW Dessert";
        return view('moreData')->with('data', $data)->with('title', $title);
    }
    function showTopRatingDessert()
    {
        $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country', 'dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Dessert')
                            ->where('posts.rating','=','5')
                            ->where('posts.status','=','accepted')
                            ->paginate(16);

        $title = "TOP RATING Dessert";

        return view('topRating')->with('data', $data)->with('title', $title);;
    }
}
