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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->double('prix');
            $table->string('ville');
            $table->string('adresse');
            $table->string('status');

            $table->unsignedBigInteger('id_partenaire');

            $table->foreign('id_partenaire')->references('id')->on('users');
        
            $table->unsignedBigInteger('id_objet');

            $table->foreign('id_objet')->references('id')->on('objets');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
