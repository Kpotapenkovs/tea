<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;

use Illuminate\Validation\Rules\Password;

use Illuminate\Validation\ValidationException;

use App\Models\User;

use App\Models\Tea;

use App\Models\TeaList;

class TeaController extends Controller
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
        $teas = Auth::check() ? Tea::where('user_id', '=', Auth::user()->id)->get() : collect();
        $user = Auth::user();
        $tealist = Auth::check() ? TeaList::where('user_id', '=', Auth::user()->id)->get() : collect();
        return view("tea.index", compact("tealist" ,"teas", "user"));
    }

    public function show(Tea $tea, User $user) {
        return view("tea.show", compact("tea", "user"));
      }

      
    public function create(Tea $tea, User $user) {
      $tealist = Auth::check() ? TeaList::where('user_id', '=', Auth::user()->id)->get() : collect();
        return view("tea.create", compact("tealist", "tea", "user"));
      }

    public function edit(Tea $tea, User $user) {
        return view("tea.edit", compact("tea", "user"));
      }

    public function store(Request $request) {
        $validated = $request->validate([
            "tea_name" => ["required", "max:255"],
            "shugar" => ["integer"],
            "planing_time" => ["required", "date"],
            "is_it_drunk" => ["boolean", "nullable"],
            "favorite" => ["boolean"],
            "bonus_snack" => ["max:255", "nullable"]
          ]);
        
        Tea::create([
            "user_id" => auth()->id(),
            "tea_name" => $request->tea_name,
            "shugar" => $request->shugar,
            "planing_time" => $request->planing_time,
            "is_it_drunk" => $request->is_it_drunk ?? 0,
            "favorite" => false,
            "bonus_snack" => $request->bonus_snack ?? null
          ]);
        
        return redirect("/homepage");
    }


    public function update(Request $request, Tea $tea) {

      $validated = $request->validate([
        "tea_name" => ["required", "max:255"],
        "shugar" => ["integer"],
        "planing_time" => ["required", "date"],
      ]);

      $tea->tea_name = $validated["tea_name"];
      $tea->shugar = $validated["shugar"];
      $tea->planing_time = $validated["planing_time"];
      $tea->favorite = $request->favorite ?? 0;
      $tea->save();
      return redirect("/homepage");
    }



    public function destroy(Tea $tea){
      $tea->delete();
      return redirect("/homepage");
    }
}
