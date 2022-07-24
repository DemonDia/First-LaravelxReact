<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Exception;



class RoleController extends Controller
{

    //get all
    public function index()
    {
        try {
            return Role::all();
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
            $result = Role::find($id);
            if ($result == null) {
                return response()->json([
                    "status" => 404,
                    "message" => "Role not found."
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

    // create
    public function store(Request $request)
    {
        try {
            $role_name = $request->get("RoleName");
            Role::create([
                "RoleName" => $role_name
            ]);
            return response()->json([
                "status" => 200,
                "message" => "Role created.",
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
            $role = Role::find($id);
            if ($role == null) {
                return response()->json([
                    "status" => 500,
                    "message" => "Role not found.",
                ]);
            }
            $input = $request->all();
            $role->update($input);
            return response()->json([
                "status" => 200,
                "message" => "Role updated successfully.",
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
            $result = Role::destroy($id);
            if ($result == 1) {
                return response()->json([
                    "status" => 200,
                    "message" => "Role deleted successfully.",
                ]);
            }
            return response()->json([
                "status" => 500,
                "message" => "Role deletion unsuccessful.",
            ]);
        } catch (Exception $exception) {
            return response()->json([
                "status" => 500,
                "message" => $exception
            ]);
        }
    }
}
