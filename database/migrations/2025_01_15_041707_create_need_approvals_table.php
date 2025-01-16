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
        Schema::create('need_approvals', function (Blueprint $table) {
            $table->id('idneed_approvals');
            $table->integer('idworkflow_approvals')->nullable();
            $table->integer('idtransactions')->nullable();
            $table->integer('nik');
            $table->string('name');
            $table->string('email');
            $table->string('position');
            $table->integer('level')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('need_approvals');
    }
};
