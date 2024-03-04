<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    function contact(){
        // var_dump('helloworld');
        // dd("helloworld");
        $name="myat moe kyaw";
        // $job = "developer";
        $email = "myatmoekyaw@gmail.com";
        $phone = "09-998998899";
        // return ['name' => 'myat moe'];
        // return response()->json([
        //     'name' => 'myat'
        // ]);
        return view('contact',[
            'name' => $name,
            // 'job' => $job,
            'email' => $email,
            'phone' => $phone
        ]);
    }
}
