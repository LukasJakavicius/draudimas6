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
		Schema::create('cars', function (Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('model');
			$table->string('brand');
			$table->integer('reg_number');
			$table->foreignId('owner_id');
			
			$table->foreign('owner_id')->references('id')->on('owner');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
