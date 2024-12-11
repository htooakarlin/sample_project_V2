<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function carView(){
        return view('articles/car');
    }
    public function userView(){
        return view('articles/user');
    }

    // User Section -----------------------------------------

    public function userAdd(){
        return view('articles/createUser');
    }
    // public function userCreate(){
    //     return "User Create Process";
    // }
    public function userEdit($userID){
        return view("articles/editUser");
    }
    public function userUpdate(){
        return "User Update Process";
    }
    public function userDelete($userID){
        return "User ID: ($userID) Delete Process";
    }
    public function buyCar($userID){
        return view("articles/buyCar", [
            'buyerID' => $userID
        ]);
    }
    public function buyCarProcess($uid, $cid){
        return "User ($uid) buy car ($cid)";
    }
    public function ownerCarEdit($userID){
        return view("articles/ownerCarEdit", [
            'ownerID' => $userID
        ]);
    }
    public function ownerCarDelete($uid, $cid){
        return "User ($uid) delete car ($cid)";
    }

    // Car Section ------------------------------------------

    public function carAdd(){
        return view('articles/createCar');
    }
    public function carCreate(){
        return "Car Create Process";
    }
    public function carEdit($carID){
        return view("articles/editCar");
    }
    public function carUpdate(){
        return "Car Update Process";
    }
    public function carDelete($carID){
        return "Car ID: ($carID) Delete Process";
    }
}
