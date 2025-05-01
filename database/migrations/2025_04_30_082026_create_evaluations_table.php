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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("livre_id")->constrained("livres")->onDelete("cascade");
            $table->foreignId("lecteur_id")->constrained("lecteurs")->onDelete("cascade");
            $table->integer("note")->unsigned()->default(1)->check('note >= 1 AND note <= 5');
            $table->text("commentaire")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
