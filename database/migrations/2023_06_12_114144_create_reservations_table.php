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
        Schema::create('reservations', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("voiture_id");
            $table->date("date_debut");
            $table->date("date_fin");
            $table->integer('total');
            $table->string('état');
            $table->string('payement');
            $table->string('retour');
            $table->integer('total_pénalité')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('voiture_id')->references('id')->on('voitures')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
