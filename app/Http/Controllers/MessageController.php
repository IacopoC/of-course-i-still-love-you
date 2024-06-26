<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function get_single_Multiavatar(): string
    {
        $userId = Auth::id();

        return Avatar::getAvatar($userId);
    }

    /**
     * Display a listing of messages of specific author and single avatar.
     *
     * @return View
     */

    public function index(): View
    {
        $userId = Auth::id();
        $svgCode = $this->get_single_Multiavatar();
        $messages = Message::where('user_id',$userId)->latest()->paginate(10);

        return view('messages.index', [
            'messages' => $messages, 'svgCode' => $svgCode
        ]);
    }

    /**
     * Get Avatar by every user id
     *
     * @return array
     */

    public function get_Multiavatar(): array
    {
        $messages = Message::with('user')->latest()->paginate(10);

        $avatarCodes = [];
        foreach ($messages as $message) {
            $userId = $message->user->id;
            $avatarCode = Avatar::getAvatar($userId);
            $avatarCodes[$message->id] = $avatarCode;
        }

        return $avatarCodes;
    }

    /**
     * Store message and location.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);
        $request->user()->messages()->create($validated);
        return redirect(route('messages.index'));
    }

    /**
     * Show the form for editing the specified message.
     *
     * @param  Message  $message
     * @return View
     */
    public function edit(Message $message): View
    {
        $this->authorize('update', $message);
        return view('messages.edit', [
            'message' => $message
        ]);
    }

    /**
     * Update the specified message.
     *
     * @param  Request  $request
     * @param  Message  $message
     * @return RedirectResponse
     */
    public function update(Request $request, Message $message): RedirectResponse
    {

        $this->authorize('update', $message);
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        $message->update($validated);

        return redirect(route('messages.index'));
    }

    /**
     * Delete the specified message.
     *
     * @param  Message  $message
     * @return RedirectResponse
     */
    public function destroy(Message $message): RedirectResponse
    {
        $this->authorize('delete', $message);
        $message->delete();

        return redirect(route('messages.index'));
    }
}
