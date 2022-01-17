<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCompteAuditInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER compte_audit_insert
            AFTER INSERT ON clients
            FOR EACH ROW
            BEGIN
                INSERT INTO audit_comptes(typeAction, date, numCompte, nomClient, soldeAncien, soldeNouveau, user_id)
                VALUES ('insertion', NOW(), NEW.id, NEW.nomClient, NEW.soldeClient, NEW.soldeClient, NEW.user_id);
            END;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compte_audit_insert');
    }
}
