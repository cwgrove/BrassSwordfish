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
          $table->string('fmedia')->nullable();
          $table->string('posttitle')->nullable();
          $table->string('postcontent')->nullable();
          $table->string('posttype')->nullable();
          $table->string('poststatus');
          // this needt=s to be an in and relate to a user.
          $table->string('postauthor')->nullable();
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
         Schema::drop('posts');
    }
}
