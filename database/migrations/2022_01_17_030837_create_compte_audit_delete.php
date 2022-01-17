<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteAuditDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER compte_audit_delete
            AFTER DELETE ON clients
            FOR EACH ROW
            BEGIN
                INSERT INTO audit_comptes(typeAction, date, numCompte, nomClient, soldeAncien, soldeNouveau, user_id)
                VALUES ('Suppression', NOW(), OLD.id, OLD.nomClient, OLD.soldeClient, OLD.soldeClient, OLD.user_id);
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
        Schema::dropIfExists('compte_audit_delete');
    }
}
