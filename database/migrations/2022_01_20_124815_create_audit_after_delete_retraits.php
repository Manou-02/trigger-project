<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAuditAfterDeleteRetraits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER delete_retraits_trigger
            AFTER UPDATE ON retraits
            FOR EACH ROW
            BEGIN
                IF (NEW.deleted <> OLD.deleted) THEN
                    INSERT INTO audit_retraits(typeAction, date , numRet, client_id , montantAnc, montantNouv, user_id)
                    VALUES ('Suppression', NOW(), OLD.id, OLD.client_id , OLD.montantRet, OLD.montantRet, NEW.user_id);
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
            DROP TRIGGER IF EXISTS delete_retraits_trigger;
        ");
    }
}
