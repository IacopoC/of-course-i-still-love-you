<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_Multiavatar(): string
    {
        $userId = Auth::id();

        return Avatar::getAvatar($userId);
    }

    /**
     * Show the count of messages of the logged-in user in dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $userId = Auth::id();
        $svgCode = $this->get_Multiavatar();

        return view('dashboard', [
            'count_messages' => Message::where('user_id',$userId)->count(), 'svgCode' => $svgCode
        ]);
    }

}
