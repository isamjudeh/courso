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
        Schema::disableForeignKeyConstraints();

        Schema::create('registerations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamp('birth_date');
            $table->string('phone');
            $table->string('sex');
            $table->string('nationality');
            $table->text('address');
            $table->string('socail_status');
            $table->string('certificate_type');
            $table->boolean('registered_before');
            $table->boolean('approved');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('course_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registerations');
    }
};
