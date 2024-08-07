<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('wilaya', function (Blueprint $table) {
            $table->string('nom_du_wilaya')->after('id'); // Ajouter la colonne après l'ID
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('wilaya', function (Blueprint $table) {
            $table->dropColumn('nom_du_wilaya');
        });
    }
};
