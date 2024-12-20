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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productImg')->nullable();
            $table->string('productTitle');
            $table->decimal('productPrice', 8, 2);
            $table->text('productDiscription');  // 'productDiscription' yerine 'productDescription' burada doğru mu?
            $table->decimal('productRating');
            $table->string('productCategory');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
