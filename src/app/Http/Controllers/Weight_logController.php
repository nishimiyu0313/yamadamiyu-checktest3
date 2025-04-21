<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Weight_logRequest;
use App\Models\Weight_log;
use App\Models\Weight_target;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;




class Weight_logController extends Controller
{

    public function  admin()
    {
        $weight_logs = Weight_log::where('user_id', Auth::id())->get();
        $startDate = '';
        $endDate = '';
        return view('admin', compact('weight_logs', 'startDate', 'endDate'));
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
        $weightLogs = Weight_Log::with('user')->where('user_id', $userId)->DateSearch($startDate, $endDate)->Paginate(8)->appends([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        $latestWeightLog = Weight_Log::with('user')->where('user_id', $userId)->orderBy('created_at', 'desc')->first();
        $weightTarget = Weight_Target::with('user')->where('user_id', $userId)->orderBy('created_at', 'desc')->first();
        return view('admin', compact('weightLogs', 'weightTarget', 'latestWeightLog', 'startDate', 'endDate'));
    }

    

    public function destroy(Request $request)
    {
        Weight_log::find($request->id)->delete();
        return redirect('/weight_logs');
    }

    public function  target(Request $request)
    {
        Profile::where('user_id', Auth::id())->update([
            'target_weight' => $request->target_weight,
        ]);
        return redirect('/weight_logs');
    }

    public function  target_view(Request $request)
    {
        $weight_target = Profile::where('user_id', Auth::id())->get()->first();
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
