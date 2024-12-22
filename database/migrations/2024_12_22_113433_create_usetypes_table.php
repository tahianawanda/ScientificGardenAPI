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
        Schema::create('usetypes', function (Blueprint $table) {
            $table->id();

            //Key Foreigns
            $table->unsignedBigInteger('plant_id');

            $table->foreign('plant_id')
                ->references('id')
                ->on('plants')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            //Other columns
            $table->string('use');
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usetypes');
    }
};