<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('disk')->nullable();
            $table->nullableMorphs('fileable');
            $table->string("url")->nullable();
            $table->string('path')->nullable();
            $table->string('original_file_name')->nullable();
            $table->string('hash')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('extension')->nullable();
            $table->string('size')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('files');
    }
}
