<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Updown;
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
     * @return View
     */
    public function index(): View
    {
        $userId = Auth::id();
        $svgCode = $this->get_Multiavatar();
        $count_messages = Message::where('user_id',$userId)->count();
        $count_updowns = Updown::where('user_id',$userId)->count();

        $total_count_activity = $count_messages + $count_updowns;

        return view('dashboard', [
            'count_messages' => $count_messages,
            'count_updowns' => $count_updowns,
            'total_count_activity' => $total_count_activity,
            'svgCode' => $svgCode
        ]);
    }

}
