<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update() {
        // To store the avatar

        return back()->with('message', 'Avatar is updated successfully.');
    }
}
