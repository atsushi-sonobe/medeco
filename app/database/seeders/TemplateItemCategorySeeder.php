<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TemplateItemCategory;

class TemplateItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TemplateItemCategory::create([
            'label' => '基本',
        ]);

        TemplateItemCategory::create([
            'label' => '服薬記録',
        ]);

        TemplateItemCategory::create([
            'label' => '中耳加圧日誌',
        ]);

        TemplateItemCategory::create([
            'label' => '糖尿病',
        ]);

        TemplateItemCategory::create([
            'label' => 'めまい（メマモリ）',
        ]);


    }
}
