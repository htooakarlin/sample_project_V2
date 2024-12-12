<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Purchase;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function userView(){
        $customers = Customer::all();

        // Pass the customers data to the view
        return view('articles.user', compact('customers'));
    }

    public function userAdd(){
        return view('articles/createUser');
    }

    public function store(Request $request) {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:13',
        ]);

        // Create a new customer
        Customer::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
        ]);

        // Redirect back to the user list with a success message
        return redirect('/articles/users')->with('success', 'User created successfully!');
    }

    public function userEdit($userID){
        $user = Customer::findOrFail($userID);

        // Pass the user data to the view
        return view("articles.editUser", compact('user'));
    }

    public function userUpdate(Request $request, $userID) {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:13',
        ]);
    
        // Find the user and update their details
        $user = Customer::findOrFail($userID);
        $user->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
        ]);
    
        // Redirect back to the user list with a success message
        return redirect('/articles/users')->with('success', 'User updated successfully!');
    }

    public function userDelete($userID)
{
    // Find the user by their ID
    $user = Customer::find($userID);

    if ($user) {
        // If the user exists, delete them
        $user->delete();

        // Redirect back with a success message
        return redirect('/articles/users')->with('success', 'User deleted successfully!');
    } else {
        // If the user does not exist, return an error message
        return redirect('/articles/users')->with('error', 'User not found.')->withInput();
    }
}

// public function showUserCars($userId)
// {
//     $user = Customer::with('purchases.car')->findOrFail($userId);
//     return view('articles.user', compact('user'));
// }

// public function showUserCars($id)
// {
//     $purchases = \DB::table('purchases')
//         ->join('cars', 'purchases.car_id', '=', 'cars.id')
//         ->select('purchases.*', 'cars.model', 'cars.make', 'cars.year')
//         ->where('purchases.customer_id', $id)
//         ->get();

//     return response()->json(['purchases' => $purchases]);
// }

// public function showUserCars($id)
// {
//     $customer = Customer::with(['purchases.car'])->find($id);

//     if (!$customer) {
//         return response()->json(['message' => 'Customer not found'], 404);
//     }

//     $purchases = $customer->purchases->map(function ($purchase) {
//         return [
//             'customer_id' => $purchase->customer_id,
//             'car_id' => $purchase->car->id,
//             'purchase_date' => $purchase->purchase_date,
//             'year' => $purchase->car->year,
//         ];
//     });

//     return response()->json(['purchases' => $purchases]);
// }

    public function getPurchases($id) { 
        $purchases = Purchase::where('customer_id', $id)->with('car')->get(); 
        $purchasedData = $purchases->map(function($purchase) {
            return [
                'id' => $purchase->car->id,
                'model' => $purchase->car->model,
                'make' => $purchase->car->brand,
                'price' => $purchase->car->price,
                'year' => $purchase->car->year,
                'purchase_date' => $purchase->purchase_date
            ];
        });
        return response()->json($purchasedData); 
    }

}
