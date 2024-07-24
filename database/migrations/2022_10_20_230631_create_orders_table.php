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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->unconstrained();
            $table->string('billing_email');
            $table->string('billing_name');
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('postcode')->nullable();
            $table->string('name_on_card')->nullable();
            $table->decimal('discount',8, 2)->nullable();
            $table->decimal('tax',8, 2);
            $table->decimal('total',8, 2);
            $table->string('payment_gateway')->default('evo');
            $table->string('status')->default('New');
            $table->string('type')->default('Online');
            $table->boolean('shipped')->default(false);
            $table->string('error')->nullable();

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
        Schema::dropIfExists('orders');
    }
};
