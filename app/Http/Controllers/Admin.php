<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class Admin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function adminReview()
    {
        $user = Auth::user();
        $id = $user->id;

        if($user->role == "admin" || $user->role == "editor"){
            $data = \DB::table('users')
                ->select('users.*')
                ->where('users.id',"=",$id)
                ->get();

            $pending = \DB::table('posts')
                ->select('posts.*','dishes.*', 'users.username', 'users.id as reviewerID')
                ->join('dishes','dishes.dishID','=','posts.dishID')
                ->join('users','users.id','=','posts.reviewerID')
                ->where('posts.status','=','pending')
                ->orderBy('posts.date', 'desc')
                ->get();

            $accept = \DB::table('posts')
                ->select('posts.*','dishes.*', 'users.username','users.id as reviewerID')
                ->join('dishes','dishes.dishID','=','posts.dishID')
                ->join('users','users.id','=','posts.reviewerID')
                ->where('posts.status','=','accepted')
                ->orderBy('posts.checked_at', 'desc')
                ->get();

            $reject = \DB::table('posts')
                ->select('posts.*', 'dishes.*', 'users.username','posts.num_of_pp_rating','users.id as reviewerID')
                ->join('dishes','dishes.dishID','=','posts.dishID')
                ->join('users','users.id','=','posts.reviewerID')
                ->where('posts.status','=','rejected')
                ->orderBy('posts.checked_at', 'desc')
                ->get();  

            return view('adminReview')->with('data', $data)->with('pending',$pending)->with('accept', $accept)->with('reject',$reject);
        }
        else
        {
            return view('widgets.warning')->with('role', "Admin or Editor");
        }
    }

    function adminAdvertise()
    {
        $user = Auth::user();
        $id = $user->id;

        if($user->role == "admin" || $user->role == "advertiser"){
            $data = \DB::table('users')
                ->select('users.*')
                ->where('users.id',"=",$id)
                ->get();

            $active = \DB::table('restaurants')
                ->select('restaurants.*')
                ->where('status',"=",'Active')
                ->orderby('date','desc')
                ->get();

            $inactive = \DB::table('restaurants')
                ->select('restaurants.*')
                ->where('status',"=",'Inactive')
                ->orderby('date','desc')
                ->get();

            return view('adminAdvertise')->with('data',$data)->with('active',$active)->with('inactive',$inactive);
        }
        else
        {
            return view('widgets.warning')->with('role', "Admin or Advertiser");
        }
    }
    function adminArticle()
    {
        $user = Auth::user();
        $id = $user->id;
        if($user->role == "admin" || $user->role == "author"){
            $data = \DB::table('users')
                ->select('users.*')
                ->where('users.id',"=",$id)
                ->get();

            $active = \DB::table('article')
                ->select('*')
                ->where('status',"=",'Active')
                ->orderby('created_at','desc')
                ->get();

            $inactive = \DB::table('article')
                ->select('*')
                ->where('status',"=",'Inactive')
                ->orderby('created_at','desc')
                ->get();

            return view('adminArticle')->with('data',$data)->with('active',$active)->with('inactive',$inactive);
        }
        else
        {
            return view('widgets.warning')->with('role', "Admin or Author");
        }
    }

    function checkAndEdit(Request $request)
    {
        $postID = $request->input("postID");
        $user = Auth::user();
        $admin = $user->username;

        $reject = \DB::table('posts')
            ->select('posts.*', 'dishes.*', 'users.username','users.id as reviewerID','posts.num_of_pp_rating')
            ->join('dishes','dishes.dishID','=','posts.dishID')
            ->join('users','users.id','=','posts.reviewerID')
            ->where('posts.id','=',$postID)
            ->get();  
        
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

        return view('checkAndEdit')->with('reject', $reject)
                            ->with('countries', $countries)
                            ->with('admin',$admin);
    }

    function rejectPost(Request $request)
    {
        $user = Auth::user();
        $admin = $user->username;

        $postID = $request->input("postID");
        $status = "rejected";
        $reason = $request->input("reason");
        $check_at = now();
        $re = \DB::update("update posts set status='$status', checked_at='$check_at', check_by='$admin', reason='$reason' where id = ?", [$postID]);
        
        return redirect('/adminReview');
    }

    function postDetail(Request $request)
    {
        $postID = $request->input("postID");
        $status = $request->input("status");
        $reviewerID = $request->input("reviewerID");

        $reviewer = \DB::table('users')
                ->select('users.*')
                ->where('users.id',"=",$reviewerID)
                ->get();

        $data = \DB::table('posts')
            ->select('posts.*', 'dishes.*', 'users.username','users.image')
            ->join('dishes','dishes.dishID','=','posts.dishID')
            ->join('users','users.id','=','posts.reviewerID')
            ->where('posts.id','=',$postID)
            ->get();  

        return view('adminPostDetail')->with('data', $data)->with('status',$status)->with('reviewer', $reviewer);
    }

    function seeAdvertiseDetail(Request $request)
    {
        $id = $request->input("id");

        $data = \DB::table('restaurants')
                ->select('restaurants.*')
                ->where('restaurantID',"=",$id)
                ->orderby('date','desc')
                ->get();

        return view('adminAdvertiseDetail')->with('data', $data);

    }

    function editAdvertise(Request $request)
    {
        $id = $request->input("id");
        // $user = Auth::user();

        $data = \DB::table('restaurants')
                ->select('restaurants.*')
                ->where('restaurantID',"=",$id)
                ->orderby('date','desc')
                ->get();

        return view('adminEditAdvertise')->with('data', $data);
    }

    function searchActiveAdvertise()
    {
        $name = $_GET['name'];

        $item = \DB::table('restaurants')
                ->select('restaurants.*')
                ->where('name', 'like', '%'.$name.'%')
                ->where('status','=','Active')
                ->orderby('date','desc')
                ->get();

        $itemView = view('widgets.advertiseItem')
              ->with('item',$item)
              ->__toString();

        return response()->json(
            ['activeAdvertise'=>$itemView]
        );
    }

    function searchInactiveAdvertise()
    {
        $name = $_GET['name'];

        $item = \DB::table('restaurants')
                ->select('restaurants.*')
                ->where('name', 'like', '%'.$name.'%')
                ->where('status','=','Inactive')
                ->orderby('date','desc')
                ->get();

        $itemView = view('widgets.advertiseItem')
              ->with('item',$item)
              ->__toString();

        return response()->json(
            ['inactiveAdvertise'=>$itemView]
        );
    }

    function searchPendingReview()
    {
        $name = $_GET['name'];

        $item = \DB::table('posts')
                ->select('posts.*','dishes.*', 'users.username', 'users.id as reviewerID')
                ->join('dishes','dishes.dishID','=','posts.dishID')
                ->join('users','users.id','=','posts.reviewerID')
                ->where('posts.status','=','pending')
                ->where('name', 'like', '%'.$name.'%')
                ->orderBy('posts.date', 'desc')
                ->get();

        $itemView = view('widgets.reviewItem')
              ->with('item',$item)
              ->__toString();

        return response()->json(
            ['pendingReview'=>$itemView]
        );
    }

    function searchAcceptReview()
    {
        $name = $_GET['name'];

        $item = \DB::table('posts')
                ->select('posts.*','dishes.*', 'users.username', 'users.id as reviewerID')
                ->join('dishes','dishes.dishID','=','posts.dishID')
                ->join('users','users.id','=','posts.reviewerID')
                ->where('posts.status','=','accepted')
                ->where('name', 'like', '%'.$name.'%')
                ->orderBy('posts.date', 'desc')
                ->get();

        $itemView = view('widgets.reviewItem')
              ->with('item',$item)
              ->__toString();

        return response()->json(
            ['acceptReview'=>$itemView]
        );
    }

    function searchRejectReview()
    {
        $name = $_GET['name'];

        $item = \DB::table('posts')
                ->select('posts.*','dishes.*', 'users.username', 'users.id as reviewerID')
                ->join('dishes','dishes.dishID','=','posts.dishID')
                ->join('users','users.id','=','posts.reviewerID')
                ->where('posts.status','=','rejected')
                ->where('name', 'like', '%'.$name.'%')
                ->orderBy('posts.date', 'desc')
                ->get();

        $itemView = view('widgets.reviewItem')
              ->with('item',$item)
              ->__toString();

        return response()->json(
            ['rejectReview'=>$itemView]
        );
    }

    function seeArticleDetail(Request $request)
    {
        $id = $request->input("id");

        $data = \DB::table('article')
                ->select('*')
                ->where('id',"=",$id)
                ->orderby('created_at','desc')
                ->get();

        return view('adminArticleDetail')->with('data', $data);
    }

    function editArticle(Request $request)
    {
        $id = $request->input("id");
        // $user = Auth::user();

        $data = \DB::table('article')
                ->select('*')
                ->where('id',"=",$id)
                ->orderby('created_at','desc')
                ->get();

        return view('adminEditArticle')->with('data', $data);
    }

    function searchActiveArticle()
    {
        $name = $_GET['name'];

        $item = \DB::table('article')
                ->select('*')
                ->where('name', 'like', '%'.$name.'%')
                ->where('status','=','Active')
                ->orderby('created_at','desc')
                ->get();

        $itemView = view('widgets.articleitem')
              ->with('item',$item)
              ->__toString();

        return response()->json(
            ['activeArticle'=>$itemView]
        );
    }

    function searchInactiveArticle()
    {
        $name = $_GET['name'];

        $item = \DB::table('article')
                ->select('*')
                ->where('name', 'like', '%'.$name.'%')
                ->where('status','=','Inactive')
                ->orderby('created_at','desc')
                ->get();

        $itemView = view('widgets.articleitem')
              ->with('item',$item)
              ->__toString();

        return response()->json(
            ['inactiveArticle'=>$itemView]
        );
    }
}
