<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditVersementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_versements', function (Blueprint $table) {
            $table->id();
            $table->string('typeAction');
            $table->date('date');
            $table->string('numVerse');
            $table->foreignId('client_id')->constrained();
            $table->double('montantAncien');
            $table->double('montantNouv');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('audit_versements');
    }
}
