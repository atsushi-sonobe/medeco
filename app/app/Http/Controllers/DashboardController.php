<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Template;
use App\Models\UserRelation;
use App\Models\Log;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $template = Template::where('doctor_id', $user->id)->first();

        // (user) 連携している医師
        $relations_doctor = UserRelation::where('user_id', $user->id)
        ->join('users', 'users.id', '=', 'user_relations.doctor_id')
        ->get();

        // (doctor) 連携しているユーザー
        $relations_user = UserRelation::where('doctor_id', $user->id)
        ->join('users', 'users.id', '=', 'user_relations.user_id')
        ->get();

        return view('dashboard', [
            'user' => $user,
            'template' => $template,
            'relations_doctor' => $relations_doctor,
            'relations_user' => $relations_user,

        ]);
    }

}
