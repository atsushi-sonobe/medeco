<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TemplateItem;

class TemplateItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // https://docs.google.com/spreadsheets/d/1GTwNZWNKcRlFUL6h15f2-oaqn77tihFY4h7fKS1VBX8/edit#gid=1084700384

        TemplateItem::create([
            'category_id' => '1',
            'label'=> '体温',
            'value' => '{"items": [{"title": null, "type": "decimal", "value": null, "unit": "℃"}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '体重',
            'value' => '{"items": [{"title": null, "type": "decimal", "value": null, "unit": "kg"}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '脈拍（分） ',
            'value' => '{"items": [{"title": null, "type": "number", "value": null, "unit": "回"}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '酸素飽和度 ',
            'value' => '{"items": [{"title": null, "type": "number", "value": null, "unit": "%"}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '最高血圧  ',
            'value' => '{"items": [{"title": null, "type": "decimal", "value": null, "unit": "mmHg"}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '最低血圧  ',
            'value' => '{"items": [{"title": null, "type": "decimal", "value": null, "unit": "mmHg"}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '睡眠',
            'value' => '{"items": [{"title": "就寝時間を選択", "type": "time", "value": null, "unit": null},{"title": "就寝時間を選択", "type": "time", "value": null, "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '運動',
            'value' => '{"items": [{"title": null, "type": "decimal", "value": null, "unit": "時間"}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '咳 ',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '鼻水',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '鼻詰まり  ',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> 'くしゃみ  ',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '目の痒み  ',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '喉の痛み  ',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '頭痛',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '腹痛',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '気分が悪い ',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> 'だるい',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> 'めまい',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '吐き気・嘔吐',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> '下痢',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '1',
            'label'=> 'メモ',
            'value' => '{"items": [{"title": null, "type": "textbox", "value": null, "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '2',
            'label' => '服薬記録',
            'value' => '{"items": [{"title": "朝", "type": "text", "value": null, "unit": null},{"title": "昼", "type": "text", "value": null, "unit": null},{"title": "夜", "type": "text", "value": null, "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '3',
            'label' => 'めまいレベル',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","激しい","経験ない強さ"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '3',
            'label' => '自覚的苦痛度',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","激しい","経験ない強さ"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '3',
            'label' => '活動レベル ',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","激しい","経験ない強さ"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '4',
            'label' => '血糖値',
            'value' => '{"items": [{"title": "時間", "type": "time", "value": null, "unit": null},{"title": "値", "type": "text", "value": null, "unit": "mg/dL"}]}',
        ]);
        TemplateItem::create([
            'category_id' => '4',
            'label' => 'インスリン注射',
            'value' => '{"items": [{"title": "朝", "type": "time", "value": null, "unit": null},{"title": "昼", "type": "time", "value": null, "unit": null},{"title": "夜", "type": "time", "value": null, "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '4',
            'label' => '朝食',
            'value' => '{"items": [{"title": "時間", "type": "time", "value": null, "unit": null},{"title": "食べたもの", "type": "text", "value": null, "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '4',
            'label' => '昼食',
            'value' => '{"items": [{"title": "時間", "type": "time", "value": null, "unit": null},{"title": "食べたもの", "type": "text", "value": null, "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '4',
            'label' => '夕食',
            'value' => '{"items": [{"title": "時間", "type": "time", "value": null, "unit": null},{"title": "食べたもの", "type": "text", "value": null, "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '回転性めまい',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '非回転性めまい',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '耳鳴り',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '難聴',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '耳閉塞感',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '音がひびく ',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '吐き気・嘔吐',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '肩・首すじのこり',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '頭痛（午前）',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '頭痛（午後）',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '頭痛（夜） ',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '頭重',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '頭痛の生活への影響度',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
        TemplateItem::create([
            'category_id' => '5',
            'label' => '生理',
            'value' => '{"items": [{"title": null, "type": "select", "value": ["なし","軽度","中等度","重度"], "unit": null}]}',
        ]);
    }
}
