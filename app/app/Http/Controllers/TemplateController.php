<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Template;
use App\Models\TemplateItem;
use App\Models\TemplateItemCategory;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $template = Template::where('doctor_id', $user->id)->first();
        $items = TemplateItem::all();

        return view('templates.index', [
            'user' => $user,
            'items' => $items,
            'template' => $template
        ]);
    }

    public function edit(Request $request)
    {
        $user = $request->user();
        $template = Template::where('doctor_id', $user->id)->first();
        $items = TemplateItem::all();
        $categories = TemplateItemCategory::all();

        return view('templates.edit', [
            'user' => $user,
            'template' => $template,
            'items' => $items,
            'categories' => $categories
        ]);
    }

    public function update(Request $request)
    {
        Template::updateOrCreate(
            ['doctor_id' => $request->doctor_id],
            ['doctor_id' => $request->doctor_id, 'items' => $request->item_ids],
        );

        return Redirect::route('templates.edit');
    }

    // public function destroy(Request $request)
    // {
    // }
}
