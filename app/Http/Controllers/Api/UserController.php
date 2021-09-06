<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;

class UserController extends Controller
{

    public function show()
    {
        $user = auth()->user();
        $wallet = Wallet::where('user_id', $user->id)->first();
        
        $userDatabase = User::find($user->id);
        $userDatabase->balance = $wallet->balance;

        return response()->json($userDatabase);
    }
}