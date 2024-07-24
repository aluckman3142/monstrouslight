<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('product_code')->unique();
            $table->string('slug')->unique();
            $table->string('brand');
            $table->string('short_desc');
            $table->longText('long_desc');
            $table->longText('key_features');
            $table->decimal('buy_price', 8, 2);
            $table->decimal('sell_price',8, 2);
            $table->decimal('in_store_price',8, 2);
            $table->decimal('sale_price',8, 2)->nullable();
            $table->string('height', 10)->nullable();
            $table->string('weight', 10)->nullable();
            $table->string('length', 10)->nullable();
            $table->string('width', 10)->nullable();
            $table->boolean('enabled')->default(true);
            $table->boolean('hot_deal')->default(false);
            $table->boolean('featured')->default(false);
            $table->integer('stock');
            $table->integer('pack_size')->nullable();
            $table->string('pack_product')->nullable();
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->unconstrained();
            $table->foreignId('sub_category_id')->nullable()->references('id')->on('sub_categories')->unconstrained();

            $table->foreignId('created_by')->nullable()->references('id')->on('users')->unconstrained();
            $table->foreignId('updated_by')->nullable()->references('id')->on('users')->unconstrained();
            $table->foreignId('archived_by')->nullable()->references('id')->on('users')->unconstrained();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
