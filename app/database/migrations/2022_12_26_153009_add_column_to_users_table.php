<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('kana'); // フリガナ
            $table->string('tel'); // 電話番号
            $table->string('belongs'); // 所属
            $table->string('occupation'); // 職種
            $table->string('clinical_department'); // 診療科目
            $table->string('license_number'); // 資格番号

            $table->string('zip'); // 郵便番号
            $table->string('address1'); // 住所・都道府県
            $table->string('address2'); // 住所・市区町村
            $table->string('address3'); // 住所・以降

            $table->string('insurance_card1'); // 保険証1
            $table->string('insurance_card2'); // 保険証2

            $table->string('type'); // 医師(doctor)・患者(user)・システム(system)
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('kana'); // フリガナ
            $table->dropColumn('tel'); // 電話番号
            $table->dropColumn('belongs'); // 所属
            $table->dropColumn('occupation'); // 職種
            $table->dropColumn('clinical_department'); // 診療科目
            $table->dropColumn('license_number'); // 資格番号

            $table->dropColumn('zip'); // 郵便番号
            $table->dropColumn('address1'); // 住所・都道府県
            $table->dropColumn('address2'); // 住所・市区町村
            $table->dropColumn('address3'); // 住所・以降

            $table->dropColumn('insurance_card1'); // 保険証1
            $table->dropColumn('insurance_card2'); // 保険証2

            $table->dropColumn('type'); // 医師(doctor)・患者(user)・システム(system)
            $table->dropSoftDeletes();
        });
    }
};
