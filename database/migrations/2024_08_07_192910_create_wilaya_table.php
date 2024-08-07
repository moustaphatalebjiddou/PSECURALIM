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
        Schema::create('wilaya', function (Blueprint $table) {
            $table->id();
            $table->string('moughataa');
            $table->string('localite');
            $table->string('commune');
            $table->string('nom_du_perimetre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilaya');
    }
};
