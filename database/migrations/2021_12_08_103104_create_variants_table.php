<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();

            $table->string('product_id')->nullable();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('sku')->nullable();
            $table->string('position')->nullable();
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('taxable')->nullable();
            $table->string('barcode')->nullable();
            $table->string('grams')->nullable();
            $table->string('image_id')->nullable();
            $table->string('weight')->nullable();
            $table->string('weight_unit')->nullable();
            $table->string('inventory_item_id')->nullable();
            $table->string('inventory_quantity')->nullable();
            $table->string('old_inventory_quantity')->nullable();
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
        Schema::dropIfExists('variants');
    }
}
