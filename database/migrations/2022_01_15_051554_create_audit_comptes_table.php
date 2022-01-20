<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_comptes', function (Blueprint $table) {
            $table->id();
            $table->string('typeAction');
            $table->dateTime('date')->default(now());
            $table->string('numCompte');
            $table->string('nomClient');
            $table->double('soldeAncien');
            $table->double('soldeNouveau');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('audit_comptes');
    }
}
