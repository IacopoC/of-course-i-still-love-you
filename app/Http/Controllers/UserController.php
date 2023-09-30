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
        $request->user()->create($validated);
        return redirect(route('dashboard'));
    }
}
