<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class testing extends Controller
{
   function getData()
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
                            ->get();
                            
      $tview = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating','saveFoods.reviewerID as saverID')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('posts.status','=','accepted')
                            ->leftJoin('saveFoods','posts.id','=','saveFoods.id','AND','saveFoods.reviewerID','=',$uid)
                            ->orderBy('click_count', 'desc')
                            ->get();

      $trating = \DB::table('posts')
                           ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"), 'saveFoods.reviewerID as saverID')
                           ->join('dishes','dishes.dishID','=','posts.dishID')
                           ->join('users','users.id','=','posts.reviewerID')
                           ->where('posts.rating', '=', '5')
                           ->where('posts.status','=','accepted')
                           ->leftJoin('saveFoods','posts.id','=','saveFoods.id','AND','saveFoods.reviewerID','=',$uid)
                           ->orderBy('posts.checked_at', 'desc')->get();

      $restaurant = \DB::table('restaurants')->select('*')->where('status','=','active')->inRandomOrder()->get();

      $article = \DB::table('article')->select('*')->where('status','=','active')->take(3)->get();
      
         return view('index')
         ->with('data',$data)
         ->with('tview',$tview)
         ->with('trating',$trating)
         ->with('restaurant', $restaurant)
         ->with('uid', $uid)
         ->with('article', $article);
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

   function reviewDetail(Request $request)
   {
      $uid=0;
      if(Auth::check()) 
      {
         $user = Auth::user();
         $uid = $user->id;
      }

      $postID = $request->input("postID");
      $name = $request->input("name");
      $data = \DB::table('posts')
                            ->select('posts.*','dishes.*', 'users.id as reviewerID', 'users.username','users.image','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('posts.id','=',$postID)
                            ->get();

      $saves = \DB::table('saveFoods')
                     ->select('*')
                     ->where('id','=',$postID)
                     ->where('reviewerID','=',$uid)
                     ->get();

      // $data = \mysql_fetch_array($data);                           
      $suggest = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('posts.status','=','accepted')
                            ->where('dishes.ease_of_making','=','Easy')
                            ->inRandomOrder()
                            ->take(10)
                            ->get();

      $res = \DB::table('restaurants')
                            ->select('*')     
                            ->where('status','=','Active') 
                            ->inRandomOrder()
                            ->take(6)
                            ->get();

      $comment = \DB::table('comments')
                           ->select('comments.*','users.image','users.username')
                           ->join('users','comments.reviewerID','=','users.id')
                           ->where('comments.postID','=',$postID)
                           ->orderBy('date','desc')
                           ->get();

      $rate = \DB::table('ratings')
                           ->select('*')
                           ->where('reviewerID','=',$uid)
                           ->where('postID','=',$postID)
                           ->get();

      foreach($data as $c)
      {
         $click = $c->click_count;
         $click = $click+1;
         \DB::update("update posts set click_count='$click' where id = ?", [$postID]);

         $reviewer = \DB::table('users')
                     ->select('*')
                     ->where('id','=',$c->reviewerID)
                     ->get();

         $food = \DB::table('posts')
                     ->select('posts.*','dishes.*', 'users.id as reviewerID', 'users.username','users.image','posts.num_of_pp_rating')
                     ->join('dishes','dishes.dishID','=','posts.dishID')
                     ->join('users','users.id','=','posts.reviewerID')
                     ->where('posts.status','=','accepted')
                     ->where('dishes.main_cat','=','Food')
                     ->where('posts.reviewerID','=',$c->reviewerID)
                     ->get();

         $drink = \DB::table('posts')
                     ->select('posts.*','dishes.*', 'users.id as reviewerID', 'users.username','users.image','posts.num_of_pp_rating')
                     ->join('dishes','dishes.dishID','=','posts.dishID')
                     ->join('users','users.id','=','posts.reviewerID')
                     ->where('posts.status','=','accepted')
                     ->where('dishes.main_cat','=','Drink')
                     ->where('posts.reviewerID','=',$c->reviewerID)
                     ->get();

         $dessert = \DB::table('posts')
                     ->select('posts.*','dishes.*', 'users.id as reviewerID', 'users.username','users.image','posts.num_of_pp_rating')
                     ->join('dishes','dishes.dishID','=','posts.dishID')
                     ->join('users','users.id','=','posts.reviewerID')
                     ->where('posts.status','=','accepted')
                     ->where('dishes.main_cat','=','Dessert')
                     ->where('posts.reviewerID','=',$c->reviewerID)
                     ->get();
                     
      }

      return view('reviewDetail')
               ->with('data',$data)
               ->with('suggest', $suggest)
               ->with('res', $res)
               ->with('uid',$uid)
               ->with('comments',$comment)
               ->with('saves',$saves)
               ->with('rate',$rate)
               ->with('reviewer',$reviewer)
               ->with('food',$food)
               ->with('drink',$drink)
               ->with('dessert',$dessert);
   }

   function articleDetail(Request $request)
   {
      $id = $request->input("id");
      $article = \DB::table('article')->select('*')->where('id','=',$id)->get();

      $suggest = \DB::table('posts')
                            ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating')
                            ->join('dishes','dishes.dishID','=','posts.dishID')
                            ->join('users','users.id','=','posts.reviewerID')
                            ->where('posts.status','=','accepted')
                            ->inRandomOrder()
                            ->take(10)
                            ->get();

      $res = \DB::table('restaurants')
                            ->select('*')    
                            ->where('status','=','Active')   
                            ->inRandomOrder()
                            ->take(6)
                            ->get();

      return view('articleDetail')->with('article',$article)->with('suggest', $suggest)->with('res', $res);
   }

   function updateClickCount(Request $request)
   {
      $id = $request->input("id");
      $restaurant = \DB::table('restaurants')->select('*')->where('restaurantID','=',$id)->get();
      foreach($restaurant as $c)
      {
         $click = $c->clickCount;
         $click = $click+1;
         \DB::update("update restaurants set clickCount='$click' where restaurantID = ?", [$id]);
      }
   }
}
