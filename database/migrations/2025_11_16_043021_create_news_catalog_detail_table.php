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
        Schema::create('news_catalog_detail', function (Blueprint $table) {
            $table->id('new_catalog_detail_id');

            $table->string('new_id');
            $table->unsignedBigInteger('catalog_detail_id');

            $table->timestamps();

            // // Primary composite para evitar duplicados
            // $table->primary(['news_id', 'catalog_detail_id']);

            // Foreign keys
            $table->foreign('new_id')
                ->references('new_id')
                ->on('news')
                ->onDelete('cascade');

            $table->foreign('catalog_detail_id')
                ->references('catalog_detail_id')
                ->on('catalog_details')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_catalog_detail');
    }
};
