<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function showLibrary()
    {
        return view('profile.game.library');
    }

    public function showWishlist()
    {
        return view('profile.game.wishlist');
    }

    /**
     * Display the user's profile form.
     */
    public function showProfile(): View
    {
        return view('profile.show', [
            'user' => Auth::user(),
        ]);
    }

}
