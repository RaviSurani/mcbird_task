<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Facades\Agent;

class HomeController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "firstName" => 'required',
            "lastName" => 'required',
            "userPone" => 'required|unique:users',
            'userEmail' => 'required|email|max:255|unique:users',
            "dob" => 'required',
            // "ip_address" => 'required',


            // "device_type" => 'required',
            // "browser" => 'required',
            // "user_agent" => 'required',


        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $validated = $validator->validated();
            $validated['ip_address'] = $request->ip();

            $userDetails =  User::create($validated);

            return response()->json(["sucess" => true, "data" => $userDetails], 200);
        }
    }

    public function addUserAddress(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "user_id" => 'required',
            "addressList" => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $validated = $validator->validated();

            foreach ($validated['addressList'] as $address) {
                $address['user_id'] = $validated['user_id'];
                user_address::create($address);
            }

            return response()->json(["sucess" => true], 200);
        }
    }
}
