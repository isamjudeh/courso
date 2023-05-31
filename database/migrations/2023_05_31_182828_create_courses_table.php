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

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image');
            $table->text('description');
            $table->foreignId('institute_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('teacher_id')->constrained();
            $table->decimal('regular_price');
            $table->decimal('sale_price')->nullable();
            $table->timestamp('sunday_start_time');
            $table->timestamp('sunday_end_time');
            $table->timestamp('monday_start_time');
            $table->timestamp('monday_end_time');
            $table->timestamp('tuesday_start_time');
            $table->timestamp('tuesday_end_time');
            $table->timestamp('wednesday_start_time');
            $table->timestamp('wednesday_end_time');
            $table->timestamp('thursday_start_time');
            $table->timestamp('thursday_end_time');
            $table->timestamp('friday_start_time');
            $table->timestamp('friday_end_time');
            $table->timestamp('saturday_start_time');
            $table->timestamp('saturday_end_time');
            $table->text('address');
            $table->json('main_points');
            $table->timestamp('register_open');
            $table->timestamp('register_close');
            $table->integer('hours');
            $table->timestamp('start_at');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
