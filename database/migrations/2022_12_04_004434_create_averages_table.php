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
        Schema::create('averages', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('year_id')->references('id')->on('years')->constrained();
            $table->string('arm_id')->references('id')->on('arms')->constrained();
            $table->float('mean');
            $table->year('entry_year')->default(now()->year);
            $table->integer('term');
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
        Schema::dropIfExists('averages');
    }
};
