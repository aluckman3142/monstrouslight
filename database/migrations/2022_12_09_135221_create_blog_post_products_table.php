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
        Schema::create('blog_post_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_post_id')->nullable()->references('id')->on('blog_posts')->unconstrained();
            $table->foreignId('product_id')->nullable()->references('id')->on('products')->unconstrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_product');
    }
};
