<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RetraitsSoldeAfterUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER update_solde_client_after_retraits
            AFTER UPDATE ON retraits
            FOR EACH ROW
            UPDATE clients
            SET soldeClient = soldeClient + OLD.montantRet - NEW.montantRet
            WHERE clients.id = OLD.client_id;
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
            DROP TRIGGER IF EXISTS update_solde_client_after_retraits;
        ");
    }
}
