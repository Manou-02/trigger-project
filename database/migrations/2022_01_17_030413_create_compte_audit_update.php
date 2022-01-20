<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCompteAuditUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER compte_audit_update
            AFTER UPDATE ON clients
            FOR EACH ROW
            BEGIN
                IF(NEW.deleted = OLD.deleted) THEN
                    INSERT INTO audit_comptes(typeAction, date, numCompte, nomClient, soldeAncien, soldeNouveau, user_id)
                    VALUES ('Modification', NOW(), OLD.id, NEW.nomClient, OLD.soldeClient, NEW.soldeClient, NEW.user_id);
                END IF;
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
        DB::unprepared('
            DROP TRIGGER IF EXISTS compte_audit_update;
        ');
    }
}
