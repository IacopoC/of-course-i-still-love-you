<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Updown;

class UpdownController extends Controller
{
    public function up($messageId): \Illuminate\Http\RedirectResponse
    {
        $upvote = new Updown();
        $upvote->up($messageId, Auth::id());
        return redirect()->back();
    }

    public function down($messageId): \Illuminate\Http\RedirectResponse
    {
        $downvote = new Updown();
        $downvote->down($messageId, Auth::id());
        return redirect()->back();
    }
}
