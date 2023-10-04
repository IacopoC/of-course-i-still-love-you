<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'trap' => 'boolean',
        ]);

        $request->user()->update($validated);

        if($request->filled('trap')) {
            $trapValue = $request->input('trap');
            $trapValue->save();
        } else {
            $trapValue = 0;
            $trapValue->save();
        }

        return redirect(route('dashboard'));
    }
}
