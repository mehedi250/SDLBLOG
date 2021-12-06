<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdlblogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdlblog_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("post_id");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->string("author_name")->nullable();
            $table->string("author_email")->nullable();
            $table->text("comment")->nullable();
            $table->boolean('approval_status')->default(0);
            $table->foreign('post_id')->references('id')->on('sdlblog_posts')->onDelete("cascade");
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
        Schema::dropIfExists('sdlblog_comments');
    }
}
