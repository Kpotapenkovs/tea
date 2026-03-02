<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\TeaList;

class TealistController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tealist = Auth::check() ? TeaList::where('user_id', '=', Auth::user()->id)->get() : collect();
    }

    public function show(Tealist $tealist, User $user) {
        $tealist = Auth::check() ? TeaList::where('user_id', '=', Auth::user()->id)->get() : collect();
        return view("tea.showlist", compact("tealist", "user"));
      }

    public function create(Tealist $tealist, User $user) {
        return view("tea.createTea", compact("tealist", "user"));
      }

    public function store(Request $request) {
        
        $validated = $request->validate([
            "name" => ["required", "max:255"],
          ]);
        
        TeaList::create([
            "user_id" => auth()->id(),
            "name" => $request->name,
          ]);
        
        return redirect("/homepage/create");
    }

}
