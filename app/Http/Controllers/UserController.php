<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::query()
                ->when($request->search, function ($query, $search){
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'editUser' => Auth::user()->can('edit', $user)
                    ]
                ]);
                $filters = $request->search ? ['search' => $request->search] : ['search' => ''];

        return Inertia::render('Users/Index', [
            'users' => $users,
            'filters' => $filters,
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    }

    public function create(){
        return Inertia::render('Users/Create');
    }

    public function store(Request $request){

        $attributes = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required','confirmed','min:6'],

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'remember_token' => Str::random(10),
            'is_admin' => 0
        ]);

        return redirect()->route('login');

    }

    public function myAccount() {

        $orders = Order::where('user_id', '=', Auth::user()->id)->get();
        
        return Inertia::render('MyAccount', [
            'orders' => $orders,
            'wishlist' => Auth::user()->wishlist
        ]);
    }

    public function update(User $user, Request $request) {

        $request->validate([
            'password' => 'required',
        ],
        [
            'password.required' => 'Password is required to update user details',
        ]);

       // dd($user->password); $2y$10$57y6KDSkGgpZWibOmO8qBe/BZnXFixNDb.zxd3508Q.Z8y6JWpsjq
       // dd(bcrypt($request->password)); $2y$10$57y6KDSkGgpZWibOmO8qBe/BZnXFixNDb.zxd3508Q.Z8y6JWpsjq
        $userpass = $user->password;
        $requestpass = $request->password;

       // dd($requestpass, $userpass);
        if (Hash::check($requestpass, $userpass)) {
            if (Hash::check($requestpass, Auth::user()->password)) {

                $dob = Carbon::parse($request->dob)->format('Y-m-d H:i:s');

                if($request->new_password){
                    if($request->new_password === $request->confirm_password){
                        $user->update([
                            'password' => $request->new_password
                        ]);
                    } else {
                        return redirect()->route('myaccount')->with('message', 'New password and confirm passsword do not match');
                    }
                }

                $user->update([
                    'first_name' => $request->first_name,
                    'surname' => $request->surname,
                    'email' => $request->email,
                    'dob' => $dob,
                    'phone_number' => $request->phone_number,
                    'mobile_number' => $request->mobile_number,
                ]);

                return redirect()->route('myaccount')->with('message', 'User Details Updated Successfully');

            } else {
                return redirect()->route('myaccount')->with('message', 'Current Password is Incorrect');
            }
        } else {
            return redirect()->route('myaccount')->with('message', 'Current Password is Incorrect');
        }
    }

}
