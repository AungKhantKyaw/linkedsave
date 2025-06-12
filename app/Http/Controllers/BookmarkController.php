<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\SaveLink;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function listing($id)
    {
        $bookmarks = SaveLink::where('user_id', $id)->get();

        return Inertia::render('Bookmark/Listing', [
            'userId' => $id,
            'bookmarks' => $bookmarks,
            'flash' => session('flash'), // Pass flash messages from the session
        ]);
    }

    public function destroy($id)
    {
        $bookmark = SaveLink::findOrFail($id);
       
        if ($bookmark->user_id !== Auth::id()) {
            abort(403); // Forbidden
        }

        $bookmark->delete();

        // Set flash message in the session
        session()->flash('flash', ['message' => 'Bookmark deleted successfully.']);

        $bookmarks = SaveLink::where('user_id', Auth::id())->get();
        
        // Return a minimal JSON response with X-Inertia header
        return Inertia::render('Bookmark/Listing', [
            'userId' => Auth::id(),
            'bookmarks' => $bookmarks,
            'flash' => ['message' => 'Bookmark deleted successfully.'],
        ]);
    }

}