<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->unsignedInteger('promo_code_id')->nullable();
            $table->decimal('subtotal', 8,2);
            $table->decimal('promo_code_discount_amount', 8,2)->default(0);
            $table->decimal('delivery_fees', 8,2);
            $table->decimal('total', 8,2);
            $table->tinyInteger('payment_method_id')->unsigned()->default(1);
            $table->tinyInteger('order_status_id')->unsigned()->default(1);
            $table->unsignedInteger('user_id');
            $table->string('country');
            $table->string('governorate');
            $table->string('city');
            $table->text('address');
            $table->string('building')->nullable();
            $table->string('floor')->nullable();
            $table->string('apartment')->nullable();
            $table->string('mobile');
            $table->string('landline')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
