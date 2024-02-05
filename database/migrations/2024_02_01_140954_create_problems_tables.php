<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('type');
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('subject_teacher',function(Blueprint $table){
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->primary(['subject_id','user_id']);
        });

        Schema::create('topics',function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->foreignId('subject_id')->constrained();
        });

        Schema::create('problems',function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('language');
            $table->foreignId('topic_id')->constrained();
            $table->string('difficulty');
            $table->text('description');
            $table->text('solution');
            $table->json('inputs');
            $table->json('outputs');
        });

        Schema::create('problem_user',function(Blueprint $table){
            $table->foreignId('user_id')->constrained();
            $table->foreignId('problem_id')->constrained();
            $table->primary(['user_id','problem_id']);
        });

        Schema::create('user_submissions',function(Blueprint $table){
            $table -> id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('problem_id')->unsigned();
            $table -> foreign(['user_id','problem_id'])
            ->references(['user_id','problem_id'])->on('problem_user');
            $table -> text('solution');
            $table -> tinyInteger('score');
            $table -> text('details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_submissions');
        Schema::dropIfExists('user_problems');
        Schema::dropIfExists('teacher_subjects');
        Schema::dropIfExists('problems');
        Schema::dropIfExists('topics');
        Schema::dropIfExists('subjects');
        Schema::table('users',function(Blueprint $table){
            $table->dropColumn('type');
        });
    }
};
