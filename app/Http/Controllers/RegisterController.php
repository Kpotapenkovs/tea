<?php

namespace App\Http\Controllers;

use App\models\User;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use Illuminate\Validation\Rules\Password;

use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function create() {
        return view("auth.register");
      }

    public function store(Request $request) {
        
        $validated = $request->validate([
            "username" => ['required', Rule::unique('users', 'username')],
            "password" => ["required", "confirmed", Password::min(6)->numbers()->letters()->symbols() ]
          ]);
          $user = User::create($validated);
          Auth::login($user);
          return redirect("/homepage");
      }

}