<?php

namespace App\Http\Controllers;

use App\Models\Updown;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UpdownController extends Controller
{

    public function get_single_Multiavatar(): string
    {
        $userId = Auth::id();

        return Avatar::getAvatar($userId);
    }

    /**
     * Display a listing of updowns of specific author and single avatar.
     *
     * @return View
     */
    public function index(): View
    {
        $userId = Auth::id();
        $svgCode = $this->get_single_Multiavatar();
        $updowns = Updown::where('user_id',$userId)->latest()->paginate(10);

        return view('updowns.index', [
            'updowns' => $updowns, 'svgCode' => $svgCode
        ]);
    }

    /**
     * Store updown message and dropdown value.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
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
     * Show the form for editing the specified message.
     *
     * @param  Updown  $updown
     * @return View
     */
    public function edit(Updown $updown): View
    {
        $this->authorize('update', $updown);
        return view('updowns.edit', [
            'updown' => $updown
        ]);
    }

    /**
     * Update the specified updown message.
     *
     * @param  Request  $request
     * @param  Updown  $updown
     * @return RedirectResponse
     */
    public function update(Request $request, Updown $updown): RedirectResponse
    {
        $this->authorize('update', $updown);
        $validated = $request->validate([
            'updown_message' => 'required|string|max:155',
            'updown' => 'required|string',
        ]);
        $updown->update($validated);

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
