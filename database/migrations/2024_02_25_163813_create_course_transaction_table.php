<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_transaction', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Change id to UUID and set it as primary key
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('course_id')->constrained('course')->onDelete('cascade');
            $table->boolean('is_paid')->default(0);
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
        Schema::dropIfExists('course_transaction');
    }
}
