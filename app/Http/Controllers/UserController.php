<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    protected $statuscode;
    protected $currency;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($statuscode = null, $currency = null)
    {
        $this->statuscode = $statuscode;
        $this->currency = $currency;
        $users = User::withWhereHas('transactions', function ($query) {
            if ($this->statuscode && $this->statuscode != "all") {
                $query->where('statusCode',   $this->statuscode);
            }
            if ($this->currency) {
                $query->where('currency',   $this->currency);
            }
        })
            ->get();
        return Response::json($users, 200);
    }


    public function import(User $User)
    {
        $path = storage_path() . "/json/users.json";
        $users = json_decode(file_get_contents($path), true);
        foreach ($users['users'] as $user) {
            User::create($user);
        }
        return Response::json("users imported successfully", 200);
    }
}
