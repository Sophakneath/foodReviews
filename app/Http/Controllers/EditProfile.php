<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

session_start();

class EditProfile extends Controller
{
    function editP(Request $request)
    {
        $username = $request->input("name");
        $id = $request->input("id");
        $name = "";
        $sta = "";

        if($request->hasFile('myfile'))
        {
            $pro = $request->file('myfile');
            $name = time().'.'.$pro->extension();
            $pro->move(public_path().'/uploads/profile/', $name); 
            $pro = 'uploads/profile/'.$name;
            if($username != '')
            {
                $sta = "username = '$username', image='$pro'";
            }
            else
            {
                $sta = "image = '$pro'";
            }
        }
        else 
        {
            $sta = "username = '$username'";
        }

        $r = \DB::update("update users set $sta where id = ?", [$id]);  

        $_SESSION['profile'] = "You have successfully updated your profile!";
        return back();
    }
}
