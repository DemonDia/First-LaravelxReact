<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Mockery\Exception\InvalidOrderException;

class UserController extends Controller
{
    //get all
    public function index()
    {
        try {
            return User::all();
        }
        catch (Exception $exception) {
            return response()->json([
                "status" => 500,
                "message" => $exception
            ]);
        }

    }

    // get one
    public function show($id)
    {
        try {
            $result = User::find($id);
            if ($result == null) {
                return response()->json([
                    "status" => 404,
                    "message" => "User not found."
                ]);
            }
            return $result;
        } 
        catch (Exception $exception) {
            return response()->json([
                "status" => 500,
                "message" => $exception
            ]);
        }
    }

    // 'Name',
    // 'Email',
    // 'Password',
    // 'Nric',
    // 'PhoneNumber',
    // "UserType"

    // create
    public function store(Request $request)
    {
        try {
            User::create([
                "Name" => $request->get("Name"),
                "Email" => $request->get("Email"),
                "Nric" => $request->get("Nric"),
                "PhoneNumber" => $request->get("PhoneNumber"),
                "UserType" => $request->get("UserType"),
            ]);
            // return $status;
            return response()->json([
                "status" => 200,
                "message" => "User created.",
            ]);
        } catch (Exception $exception) {
            return response()->json([
                "status" => 500,
                "message" => $exception
            ]);
        }
    }

    // update
    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if ($user == null) {
                return response()->json([
                    "status" => 500,
                    "message" => "User not found.",
                ]);
            }
            $input = $request->all();
            $user->update($input);
            return response()->json([
                "status" => 200,
                "message" => "User updated successfully.",
            ]);
        } catch (Exception $exception) {
            return response()->json([
                "status" => 500,
                "message" => $exception
            ]);
        }
    }
    public function destroy($id)
    {
        try {
            $result = User::destroy($id);
            if ($result == 1) {
                return response()->json([
                    "status" => 200,
                    "message" => "User deleted successfully.",
                ]);
            }
            return response()->json([
                "status" => 500,
                "message" => "User deletion unsuccessful.",
            ]);
        } catch (Exception $exception) {
            return response()->json([
                "status" => 500,
                "message" => $exception
            ]);
        }
    }
}
