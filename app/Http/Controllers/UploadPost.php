<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class UploadPost extends Controller
{
    function upload(Request $request)
    {
        $uID = $request->input("id");
        $fname = $request->input("name");
        $main_cat = $request->input("main-cat");
        $country = $request->input("country");
        if($main_cat == "Food") {
            $spi = $request->input("spi");
            $cat = $request->input("food");
        }
        else if($main_cat == "Drink"){
            $swe = $request->input("spi");
            $cat = $request->input("drink");
        }
        else{
            $main_cat = $request->input("spi");
            $cat = $request->input("dessert");
        }
        $ease = $request->input("ease");
        $ing = $request->input("ing");
        $rec = $request->input("rec");

        $img1 = $request->file('img1');
        $name = time().'.'.$img1->extension();
        $img1->move(public_path().'/uploads/', $name); 
        $img1 = public_path().'/uploads/'.$name; 

        $i=0;
        $gal = array();
        foreach($request->file('img2') as $file)
        { 
            $gal[$i] = $file;
            $i++; 
            if($i > 1) break;
        }

        $name = time().'.'.$gal[0]->extension();
        $gal[0]->move(public_path().'/uploads/', $name); 
        $img2 = public_path().'/uploads/'.$name;

        $name = time().'.'.$gal[1]->extension();
        $gal[1]->move(public_path().'/uploads/', $name); 
        $img3 = public_path().'/uploads/'.$name;

        $date = now();
        $status = "pending";

        if($main_cat == "Food") $r = \DB::insert('insert into dishes (name,category,main_cat,country,spicyness,ease_of_making,ingredient,recipe,cover,gallery1,gallery2) values (?, ?,?,?,?,?,?,?,?,?,?)', [$fname, $cat,$main_cat,$country,$spi,$ease,$ing,$rec,$img1,$img2,$img3]);
        else $r = \DB::insert('insert into dishes (name,type,main_cat,country,sweetness,ease_of_making,ingredient,recipe,cover,gallery1,gallery2) values (?, ?,?,?,?,?,?,?,?,?,?)', [$fname, $cat,$main_cat,$country,$swe,$ease,$ing,$rec,$img1,$img2,$img3]);

        $records = \DB::select('select * from dishes order by dishID desc limit 1');

        foreach($records as $rec){
            
            $re = \DB::insert('insert into posts (dishID, date, reviewerID, Status) values (?, ?,?,?)', [$rec->dishID, $date, $uID, $status]);
        }

        return back()->with('Success', 'You have successfully upload a review');
    }
}
