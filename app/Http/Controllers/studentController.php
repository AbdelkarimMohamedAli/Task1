<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{
    //

     public function createView()
    {
        return view('create');
    }

    public function store(Request $request){


        $name  = $request->name;
        $email = $request->email;
        $password = $request->password;
        $adress = $request->adress;
        $url = $request->url;
        $gender = $request->gender;

     $errors = [];
     if(empty($name)){
       $errors['Name'] = "Field Required";
     }elseif(!preg_match('/^[a-zA-Z\s]*$/',$name) ) {
        $errors['Name'] = "Name : Invalid String";
     }
     if(empty($gender)){
        $errors['gender'] = "Field Required";
      }
     
     if(empty($email)){
        $errors['email'] = "Field Required";
      }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email : Invalid Email";
      }

      if(empty($password)){
        $errors['password'] = "Field Required";
      }elseif (strlen($password) < 6) {
        $errors['password'] = "password : you must be great than 6 char ";
      }

      if(empty($adress)){
        $errors['adress'] = "Field Required";
      }elseif(!strlen($adress) == 10) {
        $errors['adress'] = "adress : you must be == 10 char ";
      }

      if(empty($url)){
        $errors['url'] = "Field Required";
      }elseif(!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors['url'] = "url : Invalid URL ";
      }

     if(count($errors) > 0 ){

         foreach($errors as $key => $value){

           echo '* '.$key.' : '.$value;

        }
      
     }else{
          
           return view('StudentProfile',['data' => $request->except(['_token'])]);
     }
     
    }

    public function StudentProfile(){
        return view('StudentProfile');
    }
    
}
