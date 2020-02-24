<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainCategory extends Controller
{
    function getFood()
    {
        $veg = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Vegetarian')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')
                            ->get();

        $meat = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Meat Lover')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $hea = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Healthy')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $spi = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.category','=','Spicy Lover')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $all = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Food')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $tview = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Food')
                            ->where('posts.status','=','accepted')
                            ->orderBy('click_count', 'desc')
                            ->get();

        $trating = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Food')
                            ->where('posts.rating', '=', '5')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')
                            ->get();

        $restaurant = \DB::table('restaurants')->select('*')->where('status','=','active')->inRandomOrder()->orderBy('date', 'desc')->get();

        return view('food')
                ->with('veg', $veg)
                ->with('meat', $meat)
                ->with('hea', $hea)
                ->with('spi', $spi)
                ->with('all', $all)
                ->with('tview', $tview)
                ->with('restaurant', $restaurant)
                ->with('trating', $trating);
    }

    function getDrink()
    {
        $smo = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.type','=','Smoothie')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $juice = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.type','=','Juice')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $energy = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.type','=','Energy')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $alc = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.type','=','Alcoholic')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $all = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Drink')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $tview = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Drink')
                            ->where('posts.status','=','accepted')
                            ->orderBy('click_count', 'desc')
                            ->get();

        $trating = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Drink')
                            ->where('posts.rating', '=', '5')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')
                            ->get();

        $restaurant = \DB::table('restaurants')->select('*')->where('status','=','active')->inRandomOrder()->orderBy('date', 'desc')->get();

        return view('drink')
                ->with('smo', $smo)
                ->with('juice', $juice)
                ->with('energy', $energy)
                ->with('alc', $alc)
                ->with('all', $all)
                ->with('tview', $tview)
                ->with('restaurant', $restaurant)
                ->with('trating', $trating);
    }
    function getDessert()
    {
        $coo = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.type','=','Cookie')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $cake = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.type','=','Cake')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $cho = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.type','=','Chocolate')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $ice = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.type','=','Ice Cream')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $all = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Dessert')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')->get();

        $tview = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Dessert')
                            ->where('posts.status','=','accepted')
                            ->orderBy('click_count', 'desc')
                            ->get();

        $trating = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('dishes.main_cat','=','Dessert')
                            ->where('posts.rating', '=', '5')
                            ->where('posts.status','=','accepted')
                            ->orderBy('posts.date', 'desc')
                            ->get();

        $restaurant = \DB::table('restaurants')->select('*')->where('status','=','active')->inRandomOrder()->orderBy('date', 'desc')->get();

        return view('dessert')
                ->with('coo', $coo)
                ->with('cake', $cake)
                ->with('cho', $cho)
                ->with('ice', $ice)
                ->with('all', $all)
                ->with('tview', $tview)
                ->with('restaurant', $restaurant)
                ->with('trating', $trating);
    }
}
