<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactmeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_me', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('email_id', 255)->nullable();
            $table->string('subject', 255)->nullable();
            $table->mediumText('message')->nullable();
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
        Schema::dropIfExists('contact_me');
    }
}
