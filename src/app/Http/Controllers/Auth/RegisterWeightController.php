<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterWeightRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightTarget;
use App\Models\WeightLog;

class RegisterWeightController extends Controller
{
    public function getstep2()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('/register/step1');
        }

        return view('auth.step2', compact('user'));
    }

    public function store(RegisterWeightRequest $request)
    {
        $user = Auth::user();

        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

        WeightLog::create([
            'user_id' => $user->id,
            'date' => now()->ToDateString(),
            'weight' => $request->current_weight,
            'calories' => null,
            'exercise_time' => null,
            'exercise_content' => null,
        ]);

        return redirect('/weights');
    }
}
