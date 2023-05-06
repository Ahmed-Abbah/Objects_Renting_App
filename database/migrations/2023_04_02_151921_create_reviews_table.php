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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->String('note_client_partenaire');
            $table->String('commantaire_client_partenaire');

            $table->String('note_client_objet');
            $table->String('commantaire_client_objet');

            $table->String('note_partenaire_client');
            $table->String('commantaire_partenaire_client');

            $table->unsignedBigInteger('id_client');
            $table->foreign('id_client')->references('id')->on('users');
        
            $table->unsignedBigInteger('id_partenaire');
            $table->foreign('id_partenaire')->references('id')->on('users');
        
            $table->unsignedBigInteger('id_reservation');
            $table->foreign('id_reservation')->references('id')->on('reservations');
        
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
