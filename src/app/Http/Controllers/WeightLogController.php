<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateWeightLogRequest;
use App\Models\WeightLog;
use Illuminate\Support\Facades\Auth;

class WeightLogController extends Controller
{
    public function edit($weightLogId)
    {
        $weightLog = WeightLog::findOrFail($weightLogId);
        return view('weight_logs.edit', compact('weightLog'));
    }

    public function update(UpdateWeightLogRequest $request, $weightLogId)
    {
        $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric',
            'calories' => 'nullable|integer',
            'exercise_time' => 'nullable|string|max:10',
            'exercise_content' => 'nullable|string|max:120',
        ]);

        $weightLog = WeightLog::findOrFail($weightLogId);

        $weightLog->update([
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect('/weight_logs');
    }

    public function destroy($weightLogId)
    {
        $weightLog = WeightLog::where('user_id', Auth::id())->findOrFail($weightLogId);
        $weightLog->delete();

        return redirect('/weight_logs');
    }
}
