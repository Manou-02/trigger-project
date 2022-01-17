<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VersementAfterUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER after_versement_update_solde_client
            AFTER UPDATE ON versements
            FOR EACH ROW
            UPDATE clients
            SET soldeClient = soldeClient - OLD.montantVerse + NEW.montantVerse
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
            DROP TRIGGER IF EXISTS after_versement_update_solde_client;
        ");
    }
}
