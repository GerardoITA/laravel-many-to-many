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

            $table->bigInteger('typology_id')->unsigned();

            $table->foreign('typology_id')
                ->references('id')
                ->on('typologies');
        });
        Schema::table('category_product', function (Blueprint $table) {

            $table->bigInteger('category_id')->unsigned();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->bigInteger('product_id')->unsigned();

            $table->foreign('product_id')
                ->references('id')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropForeign('products_typology_id_foreign');
        });
        Schema::table('category_product', function (Blueprint $table) {

            $table->dropForeign('category_product_category_id_foreign');
            $table->dropForeign('category_product_product_id_foreign');
        });
    }
};
