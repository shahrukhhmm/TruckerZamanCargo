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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('container_number')->nullable;
            $table->string('date_of_loading')->nullable;
            $table->string('date_of_shipping')->nullable;
            $table->string('place')->nullable;
            $table->string('shipping_mark')->nullable;
            $table->string('status')->nullable;
            $table->string('paid_amount')->nullable;
            $table->string('total_amount')->nullable;
            $table->json('deals_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
