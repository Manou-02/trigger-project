<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAuditAfterDeleteVersements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER delete_versements_trigger
            AFTER UPDATE ON versements
            FOR EACH ROW
            BEGIN
                IF (NEW.deleted <> OLD.deleted) THEN
                    INSERT INTO audit_versements(typeAction, date , numVerse, client_id , montantAncien, montantNouv, user_id)
                    VALUES ('Suppression', NOW(), OLD.id, OLD.client_id , OLD.montantVerse, OLD.montantVerse, NEW.user_id);
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
        DB::unprepared("
            DROP TRIGGER IF EXISTS delete_versements_trigger;
        ");
    }
}
