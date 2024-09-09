<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentences', function (Blueprint $table) {
            $table->id(); // 自動インクリメントのIDカラム
            $table->text('sentence'); // 和文そのものを保存するカラム
            $table->unsignedTinyInteger('difficulty')->comment('単語の難しさ: 1から5の整数');
            $table->unsignedInteger('word_count')->comment('単語数');
            $table->timestamps(); // 作成日時と更新日時のカラム
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sentences');
    }
}
