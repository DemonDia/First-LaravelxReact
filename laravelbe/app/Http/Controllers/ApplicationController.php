<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use Exception;

class ApplicationController extends Controller
{

    //get all
    public function index()
    {
        try {
            return Application::all();
        } catch (Exception $exception) {
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
            $result = Application::find($id);
            if ($result == null) {
                return response()->json([
                    "status" => 404,
                    "message" => "Application not found.",
                ]);
            }
            return $result;
        } catch (Exception $exception) {
            return response()->json([
                "status" => 500,
                "message" => $exception
            ]);
        }
    }

    // 'ApplicationId',
    // 'RoleId',
    // 'ApplicationOutcome',

    // create
    public function store(Request $request)
    {
        try {
            // find role 
            $role = Role::find($request->get("role_id"));
            if ($role == null) {
                return response()->json([
                    "status" => 500,
                    "message" => "Invalid role.",
                ]);
            }
            // find user
            $role = User::find($request->get("user_id"));
            if ($role == null) {
                return response()->json([
                    "status" => 500,
                    "message" => "Invalid user.",
                ]);
            }
            $status = Application::create([
                "user_id" => $request->get("user_id"),
                "role_id" => $request->get("role_id"),
                "CreatedDate" => Carbon::now(),
                "ApplicationOutcome" => $request->get("ApplicationOutcome")
            ]);
            if ($status == null) {
                return response()->json([
                    "status" => 500,
                    "message" => "Application creation unsuccessful.",
                ]);
            }
            return response()->json([
                "status" => 200,
                "message" => "Application created.",
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
            $application = Application::find($id);
            if ($application == null) {
                return response()->json([
                    "status" => 404,
                    "message" => "Application Not found.",
                ]);
            }
            $input = $request->all();

            // find role 
            $role = Role::find($request->get("role_id"));
            if ($role == null) {
                return response()->json([
                    "status" => 500,
                    "message" => "Invalid role.",
                ]);
            }
            // find user
            $role = User::find($request->get("user_id"));
            if ($role == null) {
                return response()->json([
                    "status" => 500,
                    "message" => "Invalid user.",
                ]);
            }

            $application->update($input);
            return response()->json([
                "status" => 200,
                "message" => "Application updated successfully.",
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
            $result = Application::destroy($id);
            if ($result == 1) {
                return response()->json([
                    "status" => 200,
                    "message" => "Application deleted successfully.",
                ]);
            }
            return response()->json([
                "status" => 500,
                "message" => "Application deletion unsuccessful.",
            ]);
        } catch (Exception $exception) {
            return response()->json([
                "status" => 500,
                "message" => $exception
            ]);
        }
    }
}
