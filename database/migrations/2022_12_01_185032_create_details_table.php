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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->enum('exam',[0,1]);
            $table->enum('term', [1, 2,3]);
            $table->integer('small_value');
            $table->integer('large_value');
            $table->year('entry_year')->default(now()->year);
            $table->enum('show_result',[0,1]);
            $table->enum('show_all_result',[0,1]);
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
        Schema::dropIfExists('details');
    }
};
