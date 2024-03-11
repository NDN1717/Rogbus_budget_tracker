<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LoginRequest;

class AuthManager extends Controller
{
    // Login function
    function login(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }
    
    public function loginRetrofit(Request $request){
        // 1. Find the user by email
        $user = User::where('email', $request->email)->first();
    
        if ($user && Auth::attempt($request->only('email', 'password'))) {
            // Generate a token for the user
            $token = $user->createToken('AuthToken')->plainTextToken;
    
            return response()->json([
                'message' => 'Login successful',
                'email' => $user->email,
                'userId' => $user->id,
                'token' => $token, // Include the token in the response
            ], 200); 
        } else {
            // Invalid credentials (or user not found)
            return response()->json([
                'error' => 'Invalid credentials'
            ], 401); 
        }
    }

    // Registration function
    function registration(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('registration');
    }

    // Login post function
    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('dashboard'));
        }
        return redirect(route('login'))->with("error", "Invalid credential");
    }

    // Registration post function
    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['password']= Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error", "Registration failed try again");
        }
        return redirect(route('login'))->with("success", "Registration Successful");
    }

    // Logout function
    function logout(){        
        Auth::logout();
        return redirect(route('login'));
    }

    // Dashboard function
    function dashboard(){
        // Code related to dashboard
    }

    // Index function
    public function index(){
        return User::with('expenses', 'savings', 'reminders')->get(); // Include 'savings' relationship
    }

    // Store function
    public function store(Request $request){
        $user = User::create($request->all());
        if($request->has('expenses', 'savings', 'reminders')){
            $user->expenses()->createMany($request->input('expenses'));
            $user->savings()->createMany($request->input('savings'));
            $user->reminders()->createMany($request->input('reminders'));
        }
        return response()->json($user, 200);
    }

    // Update function
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return response()->json(['user' => $user]);
    }

    // Destroy function
    public function destroy($id){
        $user = User::find($id);
        $user->expenses()->delete();
        $user->savings()->delete(); // Delete associated savings
        $user->delete();
        return response()->json(['message' => "successfully deleted data"]);
    }
}


