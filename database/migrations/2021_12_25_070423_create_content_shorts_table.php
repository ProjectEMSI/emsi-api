<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentShortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_shorts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_article_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('content_author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name');
            $table->string('body', 280);
            $table->string('url')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('content_shorts');
    }
}
