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
        Schema::create('report_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("report_id");
            $table->foreign('report_id')->references('id')->on('reports');
            $table->text("path_document");
            $table->timestamps();
        });

        Schema::table('reports', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_documents');
    }
};
