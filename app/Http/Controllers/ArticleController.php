<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class ArticleController extends Controller
{
    public function carView(){
        $carDatas = Car::all();
        return view('articles/car', [
            'carDatas' => $carDatas
        ]);
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
        $car = new Car;
        $car->model = request()->model;
        $car->brand = request()->make;
        $car->price = request()->price;
        $car->year = request()->year;
        $car->save();

        return redirect('/');
    }
    public function carEdit($carID){
        $carDatas = Car::find($carID);
        return view("articles/editCar", [
            'carDatas' => $carDatas
        ]);
    }
    public function carUpdate($carID){
        $car = Car::find($carID);
        $car->model = request()->model;
        $car->brand = request()->make;
        $car->price = request()->price;
        $car->year = request()->year;
        $car->save();

        return redirect('/');
    }
    public function carDelete($carID){
        $carDatas = Car::find($carID);
        $carDatas->delete();

        return back();
    }
}
