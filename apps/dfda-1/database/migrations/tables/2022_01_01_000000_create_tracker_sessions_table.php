<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackerSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tracker_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->bigInteger('user_id')->index();
            $table->bigInteger('device_id')->nullable()->index();
            $table->bigInteger('agent_id')->nullable()->index();
            $table->string('client_ip')->index();
            $table->bigInteger('referer_id')->nullable()->index();
            $table->bigInteger('cookie_id')->nullable()->index();
            $table->bigInteger('geoip_id')->nullable()->index();
            $table->boolean('is_robot');
            $table->timestamp('created_at')->useCurrent()->index();
            $table->timestamp('updated_at')->useCurrent()->index();
            $table->softDeletes();
            $table->string('client_id')->nullable()->index('tracker_sessions_client_id_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracker_sessions');
    }
}
