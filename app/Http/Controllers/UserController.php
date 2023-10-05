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

            $trapValue = $request->input('trap');
            $trapValue->save();
            var_dump($trapValue);


        return redirect(route('dashboard'));
    }
}
