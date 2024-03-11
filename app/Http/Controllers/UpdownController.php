<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdownController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'updown_message' => 'required|string|max:155',
            'updown' => 'required|string',
        ]);
        $request->user()->updowns()->create($validated);
        return redirect(route('updowns.index'));
    }
}
