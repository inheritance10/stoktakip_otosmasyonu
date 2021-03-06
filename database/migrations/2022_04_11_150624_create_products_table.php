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
            $table->integer('model_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('capacity');
            $table->string('year');
            $table->integer('hour');
            $table->string('license')->nullable();
            $table->string('license_plate')->nullable();
            $table->timestamp('examination_date')->nullable();
            $table->double('credit_amount')->nullable();
            $table->double('price');
            $table->integer('using_status')->comment('1- Yeni Araç, 2- 2. El')->nullable();
            $table->integer('status')->comment('1- mevcut, 2- satıldı, 3- opsiyonlandı')->nullable();
            $table->timestamp('bought_date')->nullable();
            $table->timestamp('sold_date')->nullable();
            $table->integer('customer_data_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
