<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdlblogCatagoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdlblog_catagories', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("slug")->unique();
            $table->text("description")->nullable();
            $table->integer('count')->default('0');
            $table->unsignedBigInteger("language_id");
            $table->foreign('language_id')->references('id')->on('sdlblog_languages');
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
        Schema::dropIfExists('sdlblog_catagories');
    }
}
