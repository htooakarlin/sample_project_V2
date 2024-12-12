<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Car;
use App\Models\Purchase;
use Carbon\Carbon;

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
    // public function buyCar($userID){
    //     return view("articles/buyCar", [
    //         'buyerID' => $userID
    //     ]);
    // }

//     public function buyCar(Request $request, $userID)
// {
//     // Validate the car ID from the request
//     $validatedData = $request->validate([
//         'car_id' => 'required|exists:cars,id', // Ensure the car exists in the cars table
//     ]);

//     $carID = $validatedData['car_id'];

//     // Check if the user exists
//     $customer = Customer::find($userID);
//     if (!$customer) {
//         return redirect("/articles/users")->with('error', 'User not found.');
//     }

//     // Check if the car is already purchased by this user
//     $existingPurchase = Purchase::where('customer_id', $userID)->where('car_id', $carID)->first();

//     if ($existingPurchase) {
//         return redirect("/articles/users/{$userID}/buyCar")->with('error', 'This car has already been purchased.');
//     }

//     // Create a new purchase
//     Purchase::create([
//         'customer_id' => $userID,
//         'car_id' => $carID,
//         'purchase_date' => now(),
//     ]);

//     // Fetch all purchased cars for this user
//     $purchasedCars = Purchase::with('car') // Use Eloquent relationship to fetch car details
//         ->where('customer_id', $userID)
//         ->get();

//     // Return the view with purchased cars
//     return view("articles.buyCar", [
//         'buyerID' => $userID,
//         'purchasedCars' => $purchasedCars,
//     ])->with('success', 'Car purchased successfully!');
// }

public function buyCar($userID)
{
    $cars = Car::all(); // Assuming all available cars are shown
    $buyerID = $userID;

    return view('articles.buyCar', compact('cars', 'buyerID'));
}



    // public function buyCarProcess($uid, $cid){
    //     return "User ($uid) buy car ($cid)";
    // }

    public function buyCarProcess($uid, $cid)
{
    // Create a new purchase record
    $purchase = Purchase::create([
        'customer_id' => $uid,
        'car_id' => $cid,
        'purchase_date' => Carbon::now(),
    ]);

    // Return success message or redirect
    if ($purchase) {
        return redirect('/articles/users')->with('success', "User ($uid) successfully bought car ($cid)");
    }

    return back()->with('error', "Failed to process the purchase.");
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
