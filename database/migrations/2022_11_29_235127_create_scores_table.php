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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->integer('year_id')->references('id')->on('years')->constrained();
            $table->string('subject_id')->references('id')->on('subjects')->constrained();
            $table->boolean('exam');
            $table->float('score_1');
            $table->float('score_2');
            $table->float('score_3');
            $table->year('entry_date')->default(now()->year);
            $table->integer('term');
            $table->string('remark');
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
        Schema::dropIfExists('scores');
    }
};
