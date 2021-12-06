<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdlblogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdlblog_posts', function (Blueprint $table) {
            $table->id();
            $table->string("slug")->unique();
            $table->string("title")->nullable()->default("New blog post");
            $table->text("short_description")->nullable();
            $table->mediumText("post_body")->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_published')->default(0);
            $table->boolean('comment_status')->default(1);
            $table->boolean('view_status')->default(1);
            $table->unsignedBigInteger("language_id");
            $table->unsignedBigInteger("catagory_id");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->dateTime("posted_at")->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('language_id')->references('id')->on('sdlblog_languages');
            $table->foreign('catagory_id')->references('id')->on('sdlblog_catagories')->onDelete("cascade");
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
        Schema::dropIfExists('sdlblog_posts');
    }
}
