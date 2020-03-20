<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("user_id");
            $table->string("customer_name");
            $table->string("shipping_address");
            $table->string("telephone");
            $table->decimal("grand_total",12,4);
            $table->string("payment_method");
            $table->unsignedTinyInteger("status");
            $table->timestamps();// created_at updated_at
            $table->foreign("user_id")->references("id")->on("users");
        });
        Schema::create('orders_products', function (Blueprint $table) {
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("product_id");
            $table->unsignedInteger("qty");
            $table->decimal("price",12,4);
            $table->foreign("order_id")->references("id")->on("orders");
            $table->foreign("product_id")->references("id")->on("product");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_products');
        Schema::dropIfExists('orders');
    }
}
