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

        // 医師側 患者の検索
        $relations = UserRelation::where('user_id', $user->id)
        ->join('users', 'users.id', '=', 'user_relations.user_id')
        ->get();

        // todo 患者側側 医師の検索
        // $relations = UserRelation::where('user_id', $user->id)
        // ->join('users', 'users.id', '=', 'user_relations.doctor_id')
        // ->get();

        return view('relation.index', [
            'user' => $user,
            'relations' => $relations,
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

        // todo 使っていない古いpinを消すようにする ( 5分有効にする )
        // todo 紹介機能をもっと厳密に
        UserRelation::create([
            'doctor_id' => $user->id, // todo
            'user_id' => '',
            'status' => 'invite',
            'pin' => $pin,
        ]);

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

        UserRelation::where([
            'status' => 'invite',
            'pin' => $request->pin,
        ])->update([
            'user_id' => $user->id, // todo
            'status' => 'connected'
        ]);
        // todo 自分のアカウントと繋がるの防止する
        // todo 重複がないようにする

        return Redirect::route('relation.index');
    }


}
