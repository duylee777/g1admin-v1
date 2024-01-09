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
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('featured')->after('active');
            $table->string('origin');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function($table) {
            $table->dropColumn('featured');
            $table->dropColumn('origin');
            $table->dropColumn('unit_id');
            $table->dropColumn('brand_id');
        });
    }
};
