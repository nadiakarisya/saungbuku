<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAclPermissionGrup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW view_permission_group AS  SELECT pg.id AS groupid,
    json_array(group_concat(perg.permission_id)) AS permissions
   FROM (pengguna_grup pg
     LEFT JOIN permission_grup perg ON ((perg.grup_id = pg.id)))
  GROUP BY pg.id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
