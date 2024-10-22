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
        Schema::create('members', function (Blueprint $table) {
            $table->id(); 
            $table->string('department', 100);
            $table->string('nip', 20);
            $table->string('name', 100);
            $table->string('phone_number', 15);
            $table->text('address');
            $table->string('position', 50);
            $table->string('barcode', 50); 
            $table->timestamps(); 
            $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
