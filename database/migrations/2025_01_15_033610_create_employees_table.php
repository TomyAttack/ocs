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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('nik');
            $table->string('name');
            $table->string('email');
            $table->string('position');
            $table->string('approver1_name');
            $table->string('approver1_email');
            $table->string('approver1_position');
            $table->string('approver2_name');
            $table->string('approver2_email');
            $table->string('approver2_position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
