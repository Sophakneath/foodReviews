<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class testing extends Controller
{
//    function test(){
//        return view('index');
//    }

   function getData()
   {
      $data = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type', 'dishes.category', 'dishes.main_cat', 'dishes.country','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('posts.status','=','accepted')->get();
                            
      $tview = \DB::table('posts')
                            ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country','dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('posts.status','=','accepted')
                            ->orderBy('click_count', 'desc')
                            ->groupBy('posts.id')
                            ->get();

      $trating = \DB::table('posts')
                           ->select('posts.rating','posts.click_count','dishes.name','dishes.type','dishes.country', 'dishes.category', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
                           ->join('dishes','dishes.dishID','=','posts.dishID')
                           ->join('users','users.id','=','posts.reviewerID')
                           ->where('posts.rating', '=', '5')
                           ->where('posts.status','=','accepted')->get();

      $restaurant = \DB::table('restaurants')->select('name','image','link')->get();
      
         return view('index')
         ->with('data',$data)
         ->with('tview',$tview)
         ->with('trating',$trating)
         ->with('restaurant', $restaurant);
   }

   function getKeySuggestion(Request $request)
   {
      $type = $request->input("type");
      $limit = $request->input("limit");
      $offset = $request->input("offset");
      $trating = \DB::table('posts')
      ->select('posts.rating','dishes.name','dishes.type','dishes.country','users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"))
      ->join('dishes','dishes.dishID','=','posts.dishID')
      ->join('users','users.id','=','posts.reviewerID')
      ->where('posts.status','=','accepted')
      ->havingRaw('r = 5')->get();
     $type = $request->input("type");
     
     return $trating;
   }

   function showAbout()
   {
      return view('about');
   }

   

   // function checkLogin(Request $request)
   // {
   //    $this->validate($request,[
   //       'email'     => 'required|email',
   //       'password'  => 'required|alphaNum|min:3'   
   //    ]);

   //    $user_data = array(
   //       'email'     => $request->get('email'),
   //       'password'  => $request->get('password')
   //    );

   //    if(Auth::attempt($user_data))
   //    {
   //       return redirect('/myaccount');
   //    }
   //    else
   //    {
   
   //       return back()->with('error', 'Wrong login detail');

   //    }
   // }

   // function signin()
   // {
   //    return view('login');
   // }

   // function signup()
   // {
   //    return view('signup');
   // }
}
