<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsAuditRetrait extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER operation_audit_retrait
            AFTER INSERT ON retraits
            FOR EACH ROW
            BEGIN
                INSERT INTO audit_operations(typeAction, date, numCheque, client_id, montant, user_id)
                VALUES ('Retraits', NOW(),NEW.numCheque , NEW.client_id,  NEW.montantRet, NEW.user_id);
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
            DROP TRIGGER IF EXISTS operation_audit_retrait;
        ');
    }
}
