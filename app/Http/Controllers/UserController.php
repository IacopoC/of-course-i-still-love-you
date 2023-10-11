<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $trapValue = (bool)$request->input('trap');

        $user = $request->user();
        $user->trap = $trapValue;

        $user->save();

        return redirect(route('dashboard'));
    }

}
