<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $procedure = "DROP PROCEDURE IF EXISTS `SaveProcedure`;

            CREATE PROCEDURE `ocs`.`SaveProcedure`(
                IN sp_idworkflow_approvals INT(11),
                IN sp_idtransactions INT(11),
                IN sp_value DECIMAL(15,2)
            )
            BEGIN 
                DECLARE sp_nik INT(11);
                DECLARE sp_created_at DATETIME;
                DECLARE sp_updated_at DATETIME;

                SET sp_created_at = NOW();
                SET sp_updated_at = NOW();

                    INSERT INTO need_approvals(idworkflow_approvals,idtransactions,nik,name,email,position,level, created_at, updated_at)
                    SELECT 
                        (SELECT idworkflow_approvals FROM workflow_approvals WHERE idworkflow_approvals = sp_idworkflow_approvals),
                        sp_idtransactions,
                        (SELECT nik FROM workflow_approvals WHERE idworkflow_approvals = sp_idworkflow_approvals),
                        (SELECT name FROM workflow_approvals WHERE idworkflow_approvals = sp_idworkflow_approvals),
                        (SELECT email FROM workflow_approvals WHERE idworkflow_approvals = sp_idworkflow_approvals),
                        (SELECT position FROM workflow_approvals WHERE idworkflow_approvals = sp_idworkflow_approvals),
                        sp_value,
                        sp_created_at,
                        sp_updated_at;
            END;";

  

        \DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /* Schema::dropIfExists('stored_procedures'); */
    }
};
