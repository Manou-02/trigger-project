<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AuditRetraitDelete extends Migration
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
            CREATE TRIGGER retrait_audit_delete
            AFTER DELETE ON retraits
            FOR EACH ROW
            BEGIN
                INSERT INTO audit_retraits(typeAction, date , numRet, client_id , montantAnc, montantNouv, user_id)
                VALUES ('Suppression', NOW(), OLD.id, OLD.client_id , OLD.montantRet, OLD.montantRet, OLD.user_id);
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
            DROP TRIGGER IF EXISTS retrait_audit_delete;
        ");
    }
}
