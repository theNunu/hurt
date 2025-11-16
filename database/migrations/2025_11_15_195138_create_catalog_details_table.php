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
        Schema::create('catalog_details', function (Blueprint $table) {
            $table->id('catalog_detail_id');
            $table->unsignedBigInteger('catalog_id');
            $table->string('value');
            // $table->timestamps();

            $table->foreign('catalog_id')
                ->references('catalog_id')
                ->on('catalogs')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_details');
    }
};
