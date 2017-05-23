<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1495389434TenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->integer('landlord_id')->unsigned()->nullable();
                $table->foreign('landlord_id', '38724_5921d4fa8393c')->references('id')->on('landlords')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->dropForeign('38724_5921d4fa8393c');
            $table->dropIndex('38724_5921d4fa8393c');
            $table->dropColumn('landlord_id');
            
        });

    }
}
