<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;

session_start();
class RejectPost extends Controller
{
    function resubmit(Request $request)
    {
        $postID = $request->input("postID");
        $status = "pending";
        $re = \DB::update("update posts set status='$status' where id = ?", [$postID]);
        $_SESSION['reupload'] = "You have successfully reupload your review!";
        return redirect('/myaccount');
    }
    function editpost(Request $request)
    {
        $postID = $request->input("postID");

        $reject = \DB::table('posts')
            ->select('posts.*', 'dishes.*', 'users.username','posts.num_of_pp_rating')
            ->join('dishes','dishes.dishID','=','posts.dishID')
            ->join('users','users.id','=','posts.reviewerID')
            ->where('posts.id','=',$postID)
            ->get();  
        
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");


        return view('edit')->with('reject', $reject)
                            ->with('countries', $countries);
    }

    function update(Request $request)
    {
        $dishID = $request->input("dishID");
        $postID = $request->input("postID");
        // $uID = $request->input("id");
        $fname = $request->input("name");
        $main_cat = $request->input("main-cat");
        $country = $request->input("country");
        $swe="";
        $spi="";
        $cat="";
        $img1="";
        $img2="";
        $img3="";
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

        if($request->hasfile('img1')){
            $img1 = $request->file('img1');
            $name1 = time().'.'.$img1->extension();
            $img1->move(public_path().'/uploads/cover/', $name1); 
            $img1 = 'uploads/cover/'.$name1; 
            return $img1;

            \DB::update("update dishes set cover='$img1' where dishID = ?", [$dishID]);
        }

        $i=0;
        $gal = array();
        if($request->hasfile('img2')){
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

            \DB::update("update dishes set gallery1='$img2', gallery2='$img3' where dishID = ?", [$dishID]);
        }

        $status = "pending";

        if($main_cat == "Food") $r = \DB::update("update dishes set name='$fname', category='$cat', main_cat='$main_cat', country='$country', spicyness='$spi', ease_of_making='$ease', ingredient='$ing', recipe='$rec' where dishID=?",[$dishID]);
        else $r = \DB::update("update dishes set name='$fname', type='$cat', main_cat='$main_cat', country='$country', sweetness='$swe', ease_of_making='$ease', ingredient='$ing', recipe='$rec' where dishID=?",[$dishID]);

        $re = \DB::update("update posts set status='$status' where id = ?", [$postID]);
        
        $_SESSION['reupload'] = "You have successfully reuploaded your review!";
        return redirect('/myaccount');
    }

    function unfavourite()
    {   
        if(isset($_GET['saveID'])) 
        {   
            $saveID = $_GET['saveID'];
            \DB::table('saveFoods')->where('saveID', '=', $saveID)->delete();
        }

        if(isset($_GET['postID'])) 
        {
            $pID = $_GET['postID'];
            $uid = $_GET['uID'];
            \DB::table('saveFoods')->where('id', '=', $pID)->where('reviewerID', '=', $uid)->delete();


            $data = \DB::table('posts')
                    ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating','saveFoods.reviewerID as saverID')
                    ->join('dishes','dishes.dishID','=','posts.dishID')
                    ->join('users','users.id','=','posts.reviewerID')
                    ->where('posts.status','=','accepted')
                    ->leftJoin('saveFoods','posts.id','=','saveFoods.id','AND','saveFoods.reviewerID','=',$uid)
                    ->orderBy('posts.date', 'desc')
                    ->get();


                    
            $tview = \DB::table('posts')
                    ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating','saveFoods.reviewerID as saverID')
                    ->join('dishes','dishes.dishID','=','posts.dishID')
                    ->join('users','users.id','=','posts.reviewerID')
                    ->where('posts.status','=','accepted')
                    ->leftJoin('saveFoods','posts.id','=','saveFoods.id','AND','saveFoods.reviewerID','=',$uid)
                    ->orderBy('click_count', 'desc')
                    // ->groupBy('posts.id')
                    ->get();

            $trating = \DB::table('posts')
                    ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"), 'saveFoods.reviewerID as saverID')
                    ->join('dishes','dishes.dishID','=','posts.dishID')
                    ->join('users','users.id','=','posts.reviewerID')
                    ->where('posts.rating', '=', '5')
                    ->where('posts.status','=','accepted')
                    ->leftJoin('saveFoods','posts.id','=','saveFoods.id','AND','saveFoods.reviewerID','=',$uid)
                    ->orderBy('posts.date', 'desc')->get();

            $topRating = view('widgets.toprating')
                    ->with('trating',$trating)
                    ->with('uid', $uid)
                    ->__toString();
      
            $itemView = view('widgets.allitem')
                    ->with('data',$data)
                    ->with('uid', $uid)
                    ->__toString();

            $topview = view('widgets.topview')
                    ->with('tview',$tview)
                    ->with('uid', $uid)
                    ->__toString();

            return response()->json(
                ['allitem'=>$itemView,
                'toprating'=>$topRating,
                'topview'=>$topview]
            );
        }
    }

    function favourite(Request $request)
    {   
    
        $pID = $_GET['postID'];
        $uid = $_GET['uID'];
        $dID = $_GET['dishID'];

        \DB::insert('insert into saveFoods (id,reviewerID,dishID) values (?, ?,?)', [$pID, $uid, $dID]);
  
        $data = \DB::table('posts')
                              ->select('posts.*','dishes.*','users.username','posts.num_of_pp_rating','saveFoods.reviewerID as saverID')
                              ->join('dishes','dishes.dishID','=','posts.dishID')
                              ->join('users','users.id','=','posts.reviewerID')
                              ->where('posts.status','=','accepted')
                              ->leftJoin('saveFoods','posts.id','=','saveFoods.id','AND','saveFoods.reviewerID','=',$uid)
                              ->orderBy('posts.date', 'desc')
                              ->get();
  
           
                              
        $tview = \DB::table('posts')
                              ->select('posts.*','dishes.*', 'dishes.main_cat', 'users.username','posts.num_of_pp_rating','saveFoods.reviewerID as saverID')
                              ->join('dishes','dishes.dishID','=','posts.dishID')
                              ->join('users','users.id','=','posts.reviewerID')
                              ->where('posts.status','=','accepted')
                              ->leftJoin('saveFoods','posts.id','=','saveFoods.id','AND','saveFoods.reviewerID','=',$uid)
                              ->orderBy('click_count', 'desc')
                            //   ->groupBy('posts.id')
                              ->get();
  
        $trating = \DB::table('posts')
                              ->select('posts.*','dishes.*', 'users.username','posts.num_of_pp_rating', \DB::raw("posts.rating/posts.num_of_pp_rating AS r"), 'saveFoods.reviewerID as saverID')
                              ->join('dishes','dishes.dishID','=','posts.dishID')
                              ->join('users','users.id','=','posts.reviewerID')
                              ->where('posts.rating', '=', '5')
                              ->where('posts.status','=','accepted')
                              ->leftJoin('saveFoods','posts.id','=','saveFoods.id','AND','saveFoods.reviewerID','=',$uid)
                              ->orderBy('posts.date', 'desc')->get();

        $topRating = view('widgets.toprating')
              ->with('trating',$trating)
              ->with('uid', $uid)
              ->__toString();
            
        $itemView = view('widgets.allitem')
              ->with('data',$data)
              ->with('uid', $uid)
              ->__toString();
              
        $topview = view('widgets.topview')
              ->with('tview',$tview)
              ->with('uid', $uid)
              ->__toString();

        return response()->json(
            ['allitem'=>$itemView,
            'toprating'=>$topRating,
            'topview'=>$topview]
        );
    }

    function unfavouriteMoreData()
    {   
        if(isset($_GET['saveID'])) 
        {   
            $saveID = $_GET['saveID'];
            \DB::table('saveFoods')->where('saveID', '=', $saveID)->delete();
        }

        if(isset($_GET['postID'])) 
        {
            $pID = $_GET['postID'];
            $uid = $_GET['uID'];
            \DB::table('saveFoods')->where('id', '=', $pID)->where('reviewerID', '=', $uid)->delete();

            return "success";
        }
    }

    function favouriteMoreData(Request $request)
    {   
        
        $pID = $_GET['postID'];
        $uid = $_GET['uID'];
        $dID = $_GET['dishID'];

        \DB::insert('insert into saveFoods (id,reviewerID,dishID) values (?, ?,?)', [$pID, $uid, $dID]);
        return "success";
    }

    function acceptPost(Request $request)
    {
        $admin = $request->input("admin");
        $reviewerID = $request->input("reviewerID");
        $dishID = $request->input("dishID");
        $postID = $request->input("postID");
        $fname = $request->input("name");
        $main_cat = $request->input("main-cat");
        $country = $request->input("country");
        $swe="";
        $spi="";
        $cat="";
        $img1="";
        $img2="";
        $img3="";
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

        if($request->hasfile('img1')){
            
            $img1 = $request->file('img1');
            $name1 = time().'.'.$img1->extension();
            $img1->move(public_path().'/uploads/cover/', $name1); 
            $img1 = 'uploads/cover/'.$name1; 

            \DB::update("update dishes set cover='$img1' where dishID = ?", [$dishID]);
        }

        $i=0;
        $gal = array();
        if($request->hasfile('img2')){
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

            \DB::update("update dishes set gallery1='$img2', gallery2='$img3' where dishID = ?", [$dishID]);
        }

        $status = "accepted";
        $check_at=now();

        if($main_cat == "Food") $r = \DB::update("update dishes set name='$fname', category='$cat', main_cat='$main_cat', country='$country', spicyness='$spi', ease_of_making='$ease', ingredient='$ing', recipe='$rec' where dishID=?",[$dishID]);
        else $r = \DB::update("update dishes set name='$fname', type='$cat', main_cat='$main_cat', country='$country', sweetness='$swe', ease_of_making='$ease', ingredient='$ing', recipe='$rec' where dishID=?",[$dishID]);

        $re = \DB::update("update posts set status='$status', checked_at='$check_at', check_by='$admin' where id = ?", [$postID]);

        $ps = \DB::select('select * from users where id = ?', [$reviewerID]);
        
        foreach($ps as $p)
        {
            $point = $p->point;
            $point = $point+1;
            \DB::update("update users set point='$point' where id = ?", [$reviewerID]);
        }

        $_SESSION['accept'] = "You have successfully accepted a review!";
       return redirect('/adminReview');
    }
}
