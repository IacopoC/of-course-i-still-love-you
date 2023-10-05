<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        if($request->has('trap')) {
            $trapValue = true;
            $trapValue->save();
        } else {
            $trapValue = false;
            $trapValue->save();
        }

        return redirect(route('dashboard'));
    }

}
