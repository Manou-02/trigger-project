<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAuditVersementUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER versement_audit_update
            AFTER UPDATE ON versements
            FOR EACH ROW
            BEGIN
                IF(OLD.deleted = NEW.deleted) THEN
                    INSERT INTO audit_versements(typeAction, date , numVerse, client_id , montantAncien, montantNouv, user_id)
                    VALUES ('Modification', NOW(), OLD.id, OLD.client_id , OLD.montantVerse, NEW.montantVerse, NEW.user_id);
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
            DROP TRIGGER IF EXISTS versement_audit_update;
        ');
    }
}
