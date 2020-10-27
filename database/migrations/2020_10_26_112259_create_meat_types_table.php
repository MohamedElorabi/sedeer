<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeatTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meat_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('age');
            $table->string('slaughter_date');
            $table->integer('butcher_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meat_types');
    }

    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment','ref')->where('ref_type','App\Models\MeatTaype');
    }
}
