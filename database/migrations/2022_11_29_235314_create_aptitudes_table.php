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
        Schema::create('aptitudes', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('year_id')->references('id')->on('years')->constrained();
            $table->string('arm_id')->references('id')->on('arms')->constrained();
            $table->enum('punctuality',[0,1,2,3,4,5]);
            $table->enum('attendance',[0,1,2,3,4,5]);
            $table->enum('team_spirit',[0,1,2,3,4,5]);
            $table->enum('relationship_with_others',[0,1,2,3,4,5]);
            $table->enum('self_control',[0,1,2,3,4,5]);
            $table->enum('obedience',[0,1,2,3,4,5]);
            $table->enum('neatness',[0,1,2,3,4,5]);
            $table->enum('respect_for_authority',[0,1,2,3,4,5]);
            $table->enum('handwriting',[0,1,2,3,4,5]);
            $table->enum('handling of materials',[0,1,2,3,4,5]);
            $table->enum('sports',[0,1,2,3,4,5]);
            $table->enum('extracurricular',[0,1,2,3,4,5]);
            $table->enum('teacher_remarks',[0,1,2,3,4,5]);
            $table->year('entry_year')->default(now()->year);
            $table->integer('term');
            $table->string('teacher_id')->references('id')->on('users')->constrained();
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
        Schema::dropIfExists('aptitudes');
    }
};
