<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Updown;

class UpdownController extends Controller
{
    public function up($messageId): RedirectResponse
    {
        $upvote = new Updown();
        $upvote->up($messageId, Auth::id());
        return redirect()->back();
    }

    public function down($messageId): RedirectResponse
    {
        $downvote = new Updown();
        $downvote->down($messageId, Auth::id());
        return redirect()->back();
    }
}
