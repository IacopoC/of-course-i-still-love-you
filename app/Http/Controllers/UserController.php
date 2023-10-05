<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'trap' => 'boolean',
        ]);

        if($request->has('trap')) {
            $trapValue = $request->input('trap');
            $trapValue->update($validated);
        }

        return redirect(route('dashboard'));
    }

}
