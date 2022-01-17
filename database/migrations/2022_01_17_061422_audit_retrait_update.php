<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AuditRetraitUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared("
            CREATE TRIGGER retrait_audit_update
            AFTER UPDATE ON retraits
            FOR EACH ROW
            BEGIN
                INSERT INTO audit_retraits(typeAction, date , numRet, client_id , montantAnc, montantNouv, user_id)
                VALUES ('Modification', NOW(), OLD.id, OLD.client_id , OLD.montantRet, NEW.montantRet, NEW.user_id);
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
        //
        DB::unprepared("
            DROP TRIGGER IF EXISTS retrait_audit_update;
        ");
    }
}
