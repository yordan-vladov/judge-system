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

        Schema::create('topics',function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->foreignId('subject_id')->constrained();
        });

        Schema::create('problems',function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->foreignId('topic_id')->constrained();
            $table->string('difficulty');
            $table->text('description');
            $table->text('solution');
            $table->json('inputs');
            $table->json('wildcard_ranges')->nullable();
        });

        Schema::create('problem_details',function(Blueprint $table){
            $table->id();
            $table->foreignId('problem_id')->constrained();
            $table->json('wildcards')->nullable();
            $table->json('outputs')->nullable();
        });

        Schema::create('users_problems',function(Blueprint $table){
            $table->foreignId('user_id')->constrained();
            $table->foreignId('problem_detail_id')->constrained();
            $table->primary(['user_id','problem_detail_id']);
        });

        Schema::create('user_submissions',function(Blueprint $table){
            $table -> foreignId('user_id')->constrained();
            $table -> text('solution');
            $table -> int('score');
            $table -> text('details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problems_tables');
    }
};
