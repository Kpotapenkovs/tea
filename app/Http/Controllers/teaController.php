<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;

use Illuminate\Validation\Rules\Password;

use Illuminate\Validation\ValidationException;

use App\Models\User;

use App\Models\Tea;

class teaController extends Controller
{

    public function sessiondestroy()
    {
        Auth::logout();
        return redirect("/");
    }
    public function sessionstore(request $request){

        $validated = $request->validate([
            "username" => ['required'],
            "password" => ['required']
          ]);

          if (!Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                "username" => "Nepareiz lietotājvārds vai parole"
              ]);
        }


        $request->session()->regenerate();
          
        return redirect("/homepage");

         
    }

    public function sessioncreate()
    {
        return view("auth.login");
    }




    public function index()
    {
        $teas = Tea::where('user_id', '=', Auth::user()->id)->get();
        $user = Auth::user();
        return view("tea.index", compact("teas", "user"));
    }

    public function show(Tea $tea, User $user) {
        return view("tea.show", compact("tea", "user"));
      }

      
    public function create(Tea $tea, User $user) {
        return view("tea.create", compact("tea", "user"));
      }

    public function edit(Tea $tea, User $user) {
        return view("tea.edit", compact("tea", "user"));
      }

    public function store(Request $request) {
        
        $validated = $request->validate([
            "tea_name" => ["required", "max:255"],
            "shugar" => ["integer"],
            "planing_time" => ["date_format:H:i"],
            "planing_date" => ["date"],
            "is_it_drunk" => ["boolean", "nullable"],
            "favorite" => ["boolean", "nullable"],
            "bonus_snack" => ["max:255", "nullable"]
          ]);
        
        Tea::create([
            "user_id" => auth()->id(),
            "tea_name" => $request->tea_name,
            "shugar" => $request->shugar,
            "planing_time" => $request->planing_time,
            "planing_date" => $request->planing_date,
            "is_it_drunk" => $request->is_it_drunk ?? 0,
            "favorite" => $request->favorite ?? 0,
            "bonus_snack" => $request->bonus_snack ?? null
          ]);
        
        return redirect("/homepage");
    }




    public function update(Request $request, Tea $tea) {

      $validated = $request->validate([
        "tea_name" => ["required", "max:255"],
        "shugar" => ["integer"],
        "planing_time" => ["integer"],
      ]);

      $tea->tea_name = $validated["tea_name"];
      $tea->shugar = $validated["shugar"];
      $tea->planing_time = $validated["planing_time"];
      $tea->save();
      return redirect("/homepage");
    }



    public function destroy(Tea $tea){
      $tea->delete();
      return redirect("/homepage");
    }
}
