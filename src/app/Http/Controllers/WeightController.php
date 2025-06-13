<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class WeightController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $target = WeightTarget::where('user_id', $user->id)->first();
        $targetWeight = $target ? $target->target_weight : null;

        $latestLog = WeightLog::where('user_id', $user->id)
        ->orderBy('date', 'desc')
        ->first();
        $currentWeight = $latestLog ? $latestLog->weight : null;

        $difference = ($currentWeight !== null && $targetWeight !== null)
        ? $currentWeight - $targetWeight
        : null;

        $query = WeightLog::where('user_id', $user->id)->orderBy('date', 'desc');

        $from = $request->input('start_date');
        $to = $request->input('end_date');

        if ($from && $to) {
            $query->whereBetween('date', [$from, $to]);
        }

        $logs = $query->paginate(8);

        return view('weights.index', [
            'targetWeight' => $targetWeight,
            'currentWeight' => $currentWeight,
            'difference' =>$difference,
            'logs' => $logs,
            'from' => $from,
            'to' => $to,
        ]);
    }
}
