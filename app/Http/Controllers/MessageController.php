<?php

namespace App\Http\Controllers;
use App\Models\Updown;
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
        $messages = Message::where('user_id',$userId)->latest()->get();

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
     * Display messages in a list with pagination and corresponding avatar
     *
     * @return View
     */
    public function messages(): View
    {
        $userId = Auth::id();

        $avatarCodes = $this->get_Multiavatar();
        $messages = Message::with('user')->latest()->paginate(10);
        $votes = Updown::with('messages')->where('user_id',$userId)->count();

        foreach ($messages as $message) {
            $message->avatar_code = $avatarCodes[$message->id];
        }

        return view('messages-list', [
            'messages' => $messages, 'votes' => $votes
        ]);
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
