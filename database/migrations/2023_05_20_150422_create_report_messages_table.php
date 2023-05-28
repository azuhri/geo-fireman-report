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
        Schema::create('report_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('report_id')->index()->unsigned();
            $table->foreign('report_id')->references('id')->on('reports');
            $table->string('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text("message");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_messages');
    }
};
