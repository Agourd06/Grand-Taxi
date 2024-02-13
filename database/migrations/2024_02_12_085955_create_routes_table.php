<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('trip');
            $table->string('date');
            $table->enum('archive', ['1', '0'])->default('0');
            $table->enum('favori', ['1', '0'])->default('0');
            $table->enum('Note', ['none', '1', '2', '3', '4', '5'])->default('none');
            $table->foreignId('Chauffeur_id')->constrained('chauffeurs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('passager_id')->constrained('passagers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
};
