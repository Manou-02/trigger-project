<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerToUpdateSoldeclientAfterRetrait extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER update_montant_retraits
            AFTER INSERT ON retraits
            FOR EACH ROW
            UPDATE clients
            SET soldeClient = soldeClient - NEW.montantRet
            WHERE clients.id = NEW.client_id;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('
            DROP TRIGGER IF EXISTS update_montant_retraits;
        ');
    }
}
