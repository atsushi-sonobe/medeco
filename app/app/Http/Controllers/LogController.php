<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\TemplateItem;
use App\Models\UserRelation;
use App\Models\Logs;


class LogController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // todo 患者側側 医師の検索
        $relations = UserRelation::where('user_id', $user->id)
        ->join('users', 'users.id', '=', 'user_relations.doctor_id')
        ->get();

        return view('logs.index', [
            'user' => $user,
            'relations' => $relations,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $user = $request->user();
        $relation = UserRelation::where('user_id', $id)
        ->join('templates', 'templates.doctor_id', '=', 'user_relations.doctor_id')
        ->first();
        $items = TemplateItem::whereIn('id', explode(",",$relation->items))->get();

        return view('logs.edit', [
            'id' => $id,
            'user' => $user,
            'items' => $items,
        ]);
    }

    public function update(Request $request, $id)
    {
        // todo
        // dd($request->request);
        // var_dump(json_encode($request->request));
        // exit;
    }

    // public function destroy(Request $request)
    // {
    // }
}
