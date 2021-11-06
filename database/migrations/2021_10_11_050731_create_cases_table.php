<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_zh-TW');
            $table->text('description_en');
            $table->text('description_zh-TW');
            $table->text('observes_en');
            $table->text('observes_zh-TW');
            $table->text('perceives_en');
            $table->text('perceives_zh-TW');
            $table->text('needs_en');
            $table->text('needs_zh-TW');
            $table->text('request_en');
            $table->text('request_zh-TW');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases');
    }
}
