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
        Schema::create('ClassJobCategory', function (Blueprint $table) {
            $table->id();
            $table->string('name_cn')->comment("职业类型中文名")->nullable();
            $table->string('name_en')->comment("职业类型英文名")->nullable();
            $table->string('name_jp')->comment("职业类型日文名")->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
