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
        Schema::create('parts', function (Blueprint $table) {
            $table->string('id', 8)->nullable(false)->primary();
            $table->string('material_description', 200)->nullable(false);
            $table->string('material_type', 5)->nullable(false);
            $table->integer('qty')->nullable(false)->default(0);
            $table->string('location', 50)->nullable(true);

            $table->foreign('material_type')->on('material_types')->references('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts');
    }
};
