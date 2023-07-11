<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->decimal('total', 10, 2);
            $table->string('invoice_id');
            $table->string('transaction_id');
            $table->boolean('paid')->default(1);
            $table->datetime('picked_date')->nullable();
            $table->datetime('shipped_date')->nullable();
            $table->datetime('delivered_date')->nullable();
            $table->datetime('return_date')->nullable();
            $table->longText('return_reason')->nullable();
            $table->foreignId('user_id')->constrained()->ondDelete('cacade');
            $table->foreignId('product_id')->constrained()->ondDelete('cacade');
            $table->foreignId('coupon_id')->nullable()->constrained()->ondDelete('cacade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
