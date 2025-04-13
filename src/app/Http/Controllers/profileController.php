<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function  profile(Request $request)
    {
        return view('profile');
    }
    public function store(Request $request)
    {
        Profile::create([
            'user_id' => Auth::id(),
            'target_weight' => $request->target_weight,
            'now_weight' => $request->now_weight,
        ]);

        return redirect('/weight_logs');
    }
}
