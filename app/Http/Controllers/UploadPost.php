<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

session_start();

class UploadPost extends Controller
{
    function upload(Request $request)
    {
        $uID = $request->input("id");
        $fname = $request->input("name");
        $main_cat = $request->input("main-cat");
        $country = $request->input("country");
        $swe="";
        $spi="";
        $cat="";
        $img1="";
        if($main_cat == "Food") {
            $spi = $request->input("spi");
            $cat = $request->input("food");
        }
        else if($main_cat == "Drink"){
            $swe = $request->input("swe");
            $cat = $request->input("drink");
        }
        else{
            $swe = $request->input("swe");
            $cat = $request->input("dessert");
        }
        $ease = $request->input("ease");
        $ing = $request->input("ing");
        $rec = $request->input("rec");

        $img1 = $request->file('img1');
        $name1 = time().'.'.$img1->extension();
        $img1->move(public_path().'/uploads/cover/', $name1); 
        $img1 = 'uploads/cover/'.$name1; 

        $i=0;
        $gal = array();
        foreach($request->file('img2') as $file)
        { 
            $gal[$i] = $file;
            $i++; 
            if($i > 1) break;
        }
        $name2 = time().'.'.$gal[0]->extension();
        $gal[0]->move(public_path().'/uploads/gallery1/', $name2); 
        $img2 = 'uploads/gallery1/'.$name2;

        $name3 = time().'.'.$gal[1]->extension();
        $gal[1]->move(public_path().'/uploads/gallery2/', $name3); 
        $img3 = 'uploads/gallery2/'.$name3;

        $date = now();
        $status = "pending";

        if($main_cat == "Food") $r = \DB::insert('insert into dishes (name,category,main_cat,country,spicyness,ease_of_making,ingredient,recipe,cover,gallery1,gallery2) values (?, ?,?,?,?,?,?,?,?,?,?)', [$fname, $cat,$main_cat,$country,$spi,$ease,$ing,$rec,$img1,$img2,$img3]);
        else $r = \DB::insert('insert into dishes (name,type,main_cat,country,sweetness,ease_of_making,ingredient,recipe,cover,gallery1,gallery2) values (?, ?,?,?,?,?,?,?,?,?,?)', [$fname, $cat,$main_cat,$country,$swe,$ease,$ing,$rec,$img1,$img2,$img3]);

        $records = \DB::select('select * from dishes order by dishID desc limit 1');

        foreach($records as $rec){
            
            $re = \DB::insert('insert into posts (dishID, date, reviewerID, status) values (?, ?,?,?)', [$rec->dishID, $date, $uID, $status]);
        }

        $_SESSION['success'] = "You have successfully uploaded a review!";
        return back();
    }

    function uploadAdvertise(Request $request)
    {
        $name = $request->input("name");
        $contact = $request->input("contact");
        $location = $request->input("location");
        $link = $request->input("link");
        $status = $request->input("status");
        $creator = $request->input("creator");
        $des = $request->input("short-des");
        $serve = $request->input("serve");

        $img1 = $request->file("img1");
        $name1 = time().'.'.$img1->extension();
        $img1->move(public_path().'/uploads/advertise/', $name1); 
        $img1 = 'uploads/advertise/'.$name1; 
        $date = now();

        $r = \DB::insert('insert into restaurants (name,image,location,contact,link,status,date,create_by,serve,short_des) values (?, ?,?,?,?,?,?,?,?,?)', [$name, $img1,$location,$contact,$link,$status,$date,$creator,$serve,$des]);
        $_SESSION['addAdvertise'] = "You have successfully uploaded an Advertisement!";
        return back();
    }
    function uploadEditAdvertise(Request $request)
    {
        $name = $request->input("name");
        $contact = $request->input("contact");
        $location = $request->input("location");
        $link = $request->input("link");
        $status = $request->input("status");
        $id = $request->input("id");
        $des = $request->input("short-des");
        $serve = $request->input("serve");

        if($request->hasFile("img1"))
        {
            $img1 = $request->file("img1");
            $name1 = time().'.'.$img1->extension();
            $img1->move(public_path().'/uploads/advertise/', $name1); 
            $img1 = 'uploads/advertise/'.$name1; 

            \DB::update("update restaurants set image='$img1' where restaurantID = ?", [$id]);
        }
        
        \DB::update("update restaurants set name = '$name', contact='$contact', location='$location', link='$link', status='$status', short_des='$des', serve='$serve' where restaurantID = ?", [$id]);
        $_SESSION['editAdvertise'] = "You have successfully edited an Advertisement!";
        return redirect('/adminAdvertisement');
    }

    function uploadArticle(Request $request){
        $name = $request->input("name");
        $status = $request->input("status");
        $overview = $request->input("overview");
        $detail = $request->input("detail");
        // $detail =  htmlspecialchars($des);

        $creator = $request->input("creator");

        $img1 = $request->file("img1");
        $name1 = time().'.'.$img1->extension();
        $img1->move(public_path().'/uploads/article/cover/', $name1); 
        $img1 = 'uploads/article/cover/'.$name1; 

        $icon = $request->file("icon");
        $name2 = time().'.'.$icon->extension();
        $icon->move(public_path().'/uploads/article/icon/', $name2); 
        $icon = 'uploads/article/icon/'.$name2; 

        $time = now();

        $re = \DB::insert('insert into article (name, created_at, overview, detail, created_by, status, image, icon) values (?, ?,?,?,?,?,?,?)', [$name,$time,$overview,$detail,$creator,$status,$img1,$icon]);
        $_SESSION['addArticle'] = "You have successfully uploaded an Article!";
        return back();
    }

    function uploadEditArticle(Request $request)
    {
        $id = $request->input("id");
        $name = $request->input("name");
        $status = $request->input("status");
        $overview = $request->input("overview");
        $detail = $request->input("detail");

        if($request->hasFile("img1"))
        {
            $img1 = $request->file("img1");
            $name1 = time().'.'.$img1->extension();
            $img1->move(public_path().'/uploads/article/cover/', $name1); 
            $img1 = 'uploads/article/cover/'.$name1; 

            \DB::update("update article set image='$img1' where id = ?", [$id]);
        }

        if($request->hasFile("icon"))
        {
            $icon = $request->file("icon");
            $name2 = time().'.'.$icon->extension();
            $icon->move(public_path().'/uploads/article/icon/', $name2); 
            $icon = 'uploads/article/icon/'.$name2; 

            \DB::update("update article set icon='$icon' where id = ?", [$id]);
        }
        
        \DB::update("update article set name = '$name', status='$status', overview='$overview', detail='$detail' where id = ?", [$id]);
        $_SESSION['editArticle'] = "You have successfully edited an Article!";
        return redirect('/adminArticle');
    }

    function sendComment(Request $request)
    {
        $id = $request->input("postID");
        $uid = $request->input("uid");
        $comment = $request->input("comment");

        $date = now();
        \DB::insert('insert into comments (reviewerID,date,comment,postID) values (?, ?,?,?)', [$uid,$date,$comment,$id]);

        $comment = \DB::table('comments')
                           ->select('comments.*','users.username','users.image')
                           ->join('users','comments.reviewerID','=','users.id')
                           ->where('comments.postID','=',$id)
                           ->orderBy('date','desc')
                           ->get();

        $cmt = view('widgets.commentView')
                    ->with('comments',$comment)
                    ->__toString();

        return response()->json(
            ['cmt'=>$cmt]
        );
    }

    function sendRating(Request $request)
    {
        $id = $request->input("postID");
        $uid = $request->input("uID");
        $rating = $request->input("rating");
        $rs = $request->input("ratingScore");
        $rate=0;
        $ratingScore=0;

        \DB::insert('insert into ratings (reviewerID,rate,postID,rating_score) values (?, ?,?,?)', [$uid,$rating,$id,$rs]);

        $result = \DB::table('posts')
                            ->select('*')
                            ->where('id','=',$id)
                            ->get();
        foreach($result as $r)
        {
            $ratingScore = $r->rating_score;
            $num = $r->num_of_pp_rating;
            $rate = $r->rating;

            $ratingScore = $ratingScore + $rs;
            $num += 1;
            $rate = ($ratingScore / 20) / $num;

            \DB::update("update posts set rating_score = '$ratingScore', num_of_pp_rating='$num', rating='$rate' where id = ?", [$id]);
        }
        
        $rv = view('widgets.ratingView')
                    ->with('rating',$rate)
                    ->with('num',$num)
                    ->__toString();

        return response()->json(
            ['showRating'=>$rv]
        );
    }
}
