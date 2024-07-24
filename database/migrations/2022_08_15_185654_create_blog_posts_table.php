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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('snippet', 100);
            $table->longText('content');
            $table->string('youtube_link', 255)->nullable();
            $table->boolean('enabled')->default(1);

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
        Schema::dropIfExists('blog_posts');
    }
};
