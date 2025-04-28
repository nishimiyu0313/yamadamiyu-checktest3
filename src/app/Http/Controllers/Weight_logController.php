<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Weight_logRequest;
use App\Models\Weight_log;
use App\Models\Weight_target;
use Illuminate\Support\Facades\Auth;




class Weight_logController extends Controller
{

    public function  admin()
    {
        $userId = Auth::id();
        $weight_logs = Weight_log::where('user_id', Auth::id())->get();
        $startDate = '';
        $endDate = '';
        $weight_target = Weight_target::where('user_id', Auth::id())->first();
        $latest_weight_log = Weight_Log::with('user')->where('user_id', $userId)->orderBy('created_at', 'desc')->first();
        return view('admin', compact('weight_logs', 'startDate', 'endDate', 'weight_target', 'latest_weight_log'));
    }
    public function create(Request $request)
    {
        return view('create');
    }
    public function store(Weight_logRequest $request)
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
        $userId=Auth::id();
        $startDate=$request->start_date;
        $endDate=$request->end_date;
        $weight_logs = Weight_Log::with('user')->where('user_id', $userId)->DateSearch($startDate, $endDate)->Paginate(8)->appends([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        $latest_weight_log = Weight_Log::with('user')->where('user_id', $userId)->orderBy('created_at', 'desc')->first();
        $weight_target = Weight_Target::with('user')->where('user_id', $userId)->orderBy('created_at', 'desc')->first();
        return view('admin', compact('weight_logs', 'startDate', 'endDate', 'weight_target', 'latest_weight_log'));
    }

    public function destroy(Request $request, $weight_LogId)
    {
        Weight_log::find($weight_LogId)->delete();
        return redirect('/weight_logs');
    }

    public function  target(Request $request)
    {
        Weight_Target::where('user_id', Auth::id())->update([
            'target_weight' => $request->target_weight,
        ]);
        return redirect('/weight_logs');
    }

    public function  target_view(Request $request)
    {
        $weight_target = Weight_Target::where('user_id', Auth::id())->first();
        return view('target', compact('weight_target'));
    }

    public function detail($weight_LogId)
    {
        $weight_Log = Weight_Log::find($weight_LogId);
        return view('detail', compact('weight_Log'));
    }
    public function update(Request $request, $weight_LogId)
    {
        $weight_Log = $request->only(['date', 'weight', 'calories', 'exercise_time', 'exercise_content']);
        Weight_Log::find($weight_LogId)->update($weight_Log);
        return redirect('/weight_logs');
    }
}
