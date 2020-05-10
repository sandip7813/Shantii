<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picture_title', 255)->unique();
            $table->string('picture_caption', 255)->nullable();
            $table->enum('picture_catagory', ['profile', 'marchendise'])->default('profile');
            $table->tinyInteger('status')->default(1)->comment = "0 = inactive, 1 = active";
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
        Schema::dropIfExists('pictures');
    }
}
