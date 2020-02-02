<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class EditProfile extends Controller
{
    function editP(Request $request)
    {
        $username = $request->input("name");
        $id = $request->input("id");
        $name = "";
        $sta = "";
        echo $request->file('myfile');
        if($request->hasFile('myfile'))
        {
            $pro = $request->file('myfile');
            $name = time().'.'.$pro->extension();
            $pro->move(public_path().'/uploads/', $name); 
            $pro = public_path().'/uploads/'.$name;
            if($username != '')
            {
                echo "yes";
                $sta = "username = '$username', image='$pro'";
            }
            else
            {
                echo "NO";
                $sta = "image = '$pro'";
            }
        }
        else 
        {
            echo "abc";
            $sta = "username = '$username'";
        }

        $r = \DB::update("update users set $sta where id = ?", [$id]);  

        // return back()->with('success', "Username change successfully");
    }
}
