<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\SaveLink;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $urlToSave = $request->query('save');

        // No save param, just show homepage
        if (!$urlToSave) {
            return Inertia::render('Homepage');
        }

        // If user is logged in
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the link already exists for this user
            $exists = SaveLink::where('user_id', $user->id)
                ->where('link_url', $urlToSave)
                ->exists();

            if (!$exists) {
                SaveLink::create([
                    'user_id' => $user->id,
                    'link_url' => $urlToSave,
                ]);

                return redirect()
                    ->route('bookmark.listing', ['id' => $user->id])
                   ->with('flash', ['message' => 'DONE. Bookmark saved.']);
            }

            return redirect()
                ->route('bookmark.listing', ['id' => $user->id])
                ->with('flash', ['message' => 'Bookmark already exists.']);
        }

        // User is not logged in
        return redirect()
            ->route('user_login.index')
            ->with('flash', ['message' => 'You need to log in first to save bookmarks.']);
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }
}
