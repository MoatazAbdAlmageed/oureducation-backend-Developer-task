<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Employee::all();
        return Response::json($users, 200);
    }


    public function import(Employee $employee)
    {
        $path = storage_path() . "/json/users.json";
        $users = json_decode(file_get_contents($path), true);
        foreach ($users['users'] as $user) {
            Employee::create($user);
        }
        return Response::json("users imported successfully", 200);
    }
}
