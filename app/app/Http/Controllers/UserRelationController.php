<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\UserRelation;

class UserRelationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // (user) 連携している医師
        $relations_doctor = UserRelation::where('user_id', $user->id)
        ->join('users', 'users.id', '=', 'user_relations.doctor_id')
        ->get();

        // (doctor) 連携しているユーザー
        $relations_user = UserRelation::where('doctor_id', $user->id)
        ->join('users', 'users.id', '=', 'user_relations.user_id')
        ->get();

        return view('relation.index', [
            'user' => $user,
            'relations_doctor' => $relations_doctor,
            'relations_user' => $relations_user,
        ]);
    }

    public function create(Request $request)
    {
        $user = $request->user();

        return view('relation.create', [
            'user' => $user,
        ]);
    }


    public function code(Request $request)
    {
        $user = $request->user();
        $pin = sprintf('%04d', mt_rand(1000,9999));

        // (user) 医師と連携
        if($user->type == 'user'){
             UserRelation::create([
                'doctor_id' => '',
                'user_id' => $user->id,
                'status' => 'invite',
                'pin' => $pin,
            ]);
        } else { // todo system管理者
            // (doctor) 患者と連携
             UserRelation::create([
                'doctor_id' => $user->id,
                'user_id' => '',
                'status' => 'invite',
                'pin' => $pin,
            ]);
        }

        // todo 使っていない古いpinを消すようにする ( 5分有効にする )
        // todo 紹介機能をもっと厳密に

        return view('relation.code', [
            'user' => $user,
            'pin' => $pin,
        ]);
    }

    public function get(Request $request)
    {
        $user = $request->user();

        // todo 連携しますか？の画面を用意

        return view('relation.get', [
            'user' => $user,
        ]);
    }
    public function readCode(Request $request)
    {
        $user = $request->user();

        // (user) 医師と連携
        if($user->type == 'user'){
            UserRelation::where([
                'status' => 'invite',
                'pin' => $request->pin,
            ])->update([
                'user_id' => $user->id,
                'status' => 'connected'
            ]);
        } else { // todo system管理者
            // (doctor) 患者と連携
            UserRelation::where([
                'status' => 'invite',
                'pin' => $request->pin,
            ])->update([
                'doctor_id' => $user->id,
                'status' => 'connected'
            ]);
        }

        // todo 自分のアカウントと繋がるの防止する
        // todo 重複がないようにする

        return Redirect::route('relation.index');
    }


}
