<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weight_target;
use App\Models\Weight_log;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function  profile(Request $request)
    {
        return view('profile');
    }
    public function store(Request $request)
    {
        Weight_target::create([
            'user_id' => Auth::id(),
            'target_weight' => $request->target_weight,
        ]);

        Weight_log::create([
            'user_id' => Auth::id(),
            'weight' => $request->now_weight,
            'date' => now(),
        ]);

        return redirect('/weight_logs');
    }
}
