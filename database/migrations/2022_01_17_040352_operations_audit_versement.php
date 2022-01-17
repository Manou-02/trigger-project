<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OperationsAuditVersement extends Migration
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
            CREATE TRIGGER operation_audit_versement
            AFTER INSERT ON versements
            FOR EACH ROW
            BEGIN
                INSERT INTO audit_operations(typeAction, date, numCheque, client_id, montant, user_id)
                VALUES ('Versement', NOW(),NEW.numCheque , NEW.client_id,  NEW.montantVerse, NEW.user_id);
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
        DB::unprepared('
            DROP TRIGGER IF EXISTS operation_audit_versement;
        ');
    }
}
