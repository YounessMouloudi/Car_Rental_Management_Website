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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('model',30);
            $table->string('marque',30);
            $table->string('immatriculation',50);
            $table->integer('année');
            $table->string('transmission',30);
            $table->string('type_carburant',30);
            $table->integer('portes');
            $table->integer('places');
            $table->integer('bagages');
            $table->integer('prix_par_jour');
            $table->string('assurance',70);
            $table->text("description");
            $table->integer("pénalité");
            $table->string('état',40)->default('disponible');
            $table->string('image_path');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
