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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->index();
            $table->string('fireman_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('fireman_id')->references('id')->on('users');
            $table->double("latitude")->nullable();
            $table->double("longitude")->nullable();
            $table->tinyInteger("type_report")->index();
            $table->string("report_status", 20)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
