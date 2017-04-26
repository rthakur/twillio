<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_agents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_id');
            $table->integer('agent_id');
            $table->text('message')->nulable();
            $table->tinyInteger('type')->comment('1: for send, 0 for receive');
            $table->tinyInteger('status')->comment('1: for read, 0 for unread');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_agents');
    }
}
