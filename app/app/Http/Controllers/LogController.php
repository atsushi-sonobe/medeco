<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Template;
use App\Models\TemplateItem;
use App\Models\UserRelation;
use App\Models\Log;


class LogController extends Controller
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

        return view('logs.index', [
            'user' => $user,
            'relations_doctor' => $relations_doctor,
            'relations_user' => $relations_user,
        ]);
    }

    public function edit(Request $request, $id)
    {
        // 患者だけ
        $user = $request->user();

        $relation = UserRelation::where('user_id', $user->id)
        ->join('templates', 'templates.doctor_id', '=', 'user_relations.doctor_id')
        ->first();
        if(isset($relation->items)) {
            $items = TemplateItem::whereIn('id', explode(",",$relation->items))->get();
        } else {
            $items = null;
        }

        return view('logs.edit', [
            'id' => $id,
            'user' => $user,
            'items' => $items,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        $user = $request->user();
        // todo 最新のみ保存にする？
        // 編集の場合は？
        Log::create([
            'user_id' => $user->id,
            'template_id' => $id,
            'log' => json_encode($data),
        ]);
        return Redirect::route('logs.index');
    }

    public function view(Request $request, $id)
    {
        // 医者だけ
        // todo 患者側でも履歴を見れるようにしたい
        $user = $request->user();

        // 患者の情報の取得
        $relation = UserRelation::where('user_id', $id)
        ->join('users', 'users.id', '=', 'user_relations.user_id')
        ->first();

        $items = TemplateItem::all();

        //日付が選択されたら
        $from = !empty($request['from']) ? $request['from'] : null;
        $until = !empty($request['until']) ? $request['until'] : null;
        // todo IDの指定
        if ($from && $until) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            $data = Log::where('user_id', $id)->whereBetween("created_at", [$from, $until])->get();
        } else {
            //リクエストデータがなければそのままで表示
            $data = Log::where('user_id', $id)->get();
        }

        return view('logs.view', [
            'id' => $id,
            'from' => $from,
            'until' => $until,
            'items' => $items,
            'data' => $data,
            'user' => $user,
            'relation' => $relation,
        ]);
    }

    // public function destroy(Request $request)
    // {
    // }
}
