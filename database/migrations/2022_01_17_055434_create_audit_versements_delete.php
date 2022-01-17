<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAuditVersementsDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER versement_audit_delete
            AFTER DELETE ON versements
            FOR EACH ROW
            BEGIN
                INSERT INTO audit_versements(typeAction, date , numVerse, client_id , montantAncien, montantNouv, user_id)
                VALUES ('Suppression', NOW(), OLD.id, OLD.client_id , OLD.montantVerse, OLD.montantVerse, OLD.user_id);
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
        Schema::dropIfExists('audit_versements_delete');
    }
}
