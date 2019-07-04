<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_post')->unique;
            $table->string('slug');
            $table->text('intro')->nullable();
            $table->text('content')->nullable();
            $table->string('img')->nullable();
            $table->string('author')->nullable();
            $table->string('source')->nullable();
            $table->string('backlink')->nullable();
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('cat_posts')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
