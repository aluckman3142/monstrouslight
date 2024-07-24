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
        Schema::create('sub_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('short_desc');
            $table->longText('long_desc');
            $table->boolean('enabled')->default(1);

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
        Schema::dropIfExists('sub_sub_categories');
    }
};
