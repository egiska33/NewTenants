<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1495389663BillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('bills')) {
            Schema::create('bills', function (Blueprint $table) {
                $table->increments('id');
                $table->tinyInteger('type')->default(1);
                $table->decimal('total', 15, 2)->nullable();
                $table->integer('house_id')->unsigned()->nullable();
                $table->foreign('house_id', '38736_5921d5dfaea22')->references('id')->on('houses')->onDelete('cascade');
                
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
        Schema::dropIfExists('bills');
    }
}
