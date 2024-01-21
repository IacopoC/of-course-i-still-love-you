<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

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
     * Display a listing of messages of specific author.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): View
    {
        $userId = Auth::id();
        $messages = Message::where('user_id',$userId)->latest()->get();

        return view('messages.index', [
            'messages' => $messages
        ]);
    }

    /**
     * Display messages in a list with pagination
     *
     * @return \Illuminate\Http\Response
     */
    public function messages(): View
    {
        $avatarCodes = $this->get_Multiavatar();
        $messages = Message::with('user')->latest()->paginate(10);

        return view('messages-list', [
            'messages' => $messages, 'avatarCodes' => $avatarCodes
        ]);
    }

    /**
     * Store message and location.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message): RedirectResponse
    {
        $this->authorize('delete', $message);
        $message->delete();

        return redirect(route('messages.index'));
    }
}
