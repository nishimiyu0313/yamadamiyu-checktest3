<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weight_log;
use App\Models\Weight_target;
use Illuminate\Support\Facades\Auth;




class Weight_logController extends Controller
{
    public function  admin()
    {
        return view('admin');
    }
    public function create(Request $request)
    {
        return view('create');
    }
    public function store(Request $request)
    {
        Weight_log::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calorise,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);
        return redirect('/weight_logs');
    }
    public function search(Request $request)
    {
        $query = Weight_log::query();
        if ($request->date) {
            $query = $query->whereDate('created_at', '=', $request->date);
        }
        $Weight_logs = $query->paginate(8);
        return view('admin',compact('Weight_logs'));
    }
    public function  target(Request $request)
    {
        Weight_target::create([
            'user_id' => Auth::id(),
            'target_weight' => $request->target_weight,
        ]);
        return redirect('/weight_logs');
    }
}
