<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;

class MainController extends Controller
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Customer::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bonus_percent = rand(5, 20);
        $userId = $request->input('user_id');

        User::find($userId)->profile()->save(
            new Customer([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'country' => $request->input('country'),
                'bonus_percent' => $bonus_percent,
                'user_id' => 1
            ])
        );
    }

}
