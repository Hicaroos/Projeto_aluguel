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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('address_street');
            $table->string('address_number')->nullable();
            $table->string('address_complement')->nullable(); 
            $table->string('address_neighborhood'); 
            $table->string('address_city');
            $table->string('address_state', 100);  
            $table->string('address_zipcode', 20);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('garage_spaces');
            $table->enum('status', ['available', 'rented', 'unavailable']);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('property_owner_id')->nullable()->constrained('property_owners')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
