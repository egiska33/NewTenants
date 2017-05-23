<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1495389291HousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('houses')) {
            Schema::create('houses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('city');
                $table->string('address');
                $table->integer('tenant_id')->unsigned()->nullable();
                $table->foreign('tenant_id', '38726_5921d46b9b43b')->references('id')->on('tenants')->onDelete('cascade');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
