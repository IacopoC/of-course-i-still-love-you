<?php

namespace App\Http\Controllers;

use App\Models\Updown;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UpdownController extends Controller
{

    public function index(): View
    {
        $userId = Auth::id();
        $updowns = Updown::where('user_id',$userId)->latest()->get();

        return view('updowns.index', [
            'updowns' => $updowns
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'updown_message' => 'required|string|max:155',
            'updown' => 'required|string',
        ]);
        $request->user()->updowns()->create($validated);

        return redirect(route('updowns.index'));
    }

    /**
     * Delete the specified updown.
     *
     * @param  Updown  $updown
     * @return RedirectResponse
     */
    public function destroy(Updown $updown): RedirectResponse
    {
        $this->authorize('delete', $updown);
        $updown->delete();

        return redirect(route('updowns.index'));
    }
}
