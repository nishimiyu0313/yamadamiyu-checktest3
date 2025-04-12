<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weight_log;
use App\Models\Weight_target;
use Illuminate\Support\Facades\Auth;




class Weight_logController extends Controller
{
    public function  admin(Request $request)
    {
        return view('admin');
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $logs = $request->only([
                'user_id',
                'date',
                'weight',
                'calories',
                'exercise_time',
                'exercise_content',
        ]);
        $data = Weight_log::create($logs);
        redirect('/weight_logs');

            
        

    }
    public function  target(Request $request)
    {
        Weight_target::create([
            'user_id' => Auth::id(),
            'weight_target' => $request->weight_target,
        ]);

        return redirect('/weight_logs');
    }
}
