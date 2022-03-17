<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_author_id')->nullable()->constrained('users')->nullOnDelete();

            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('content');

            $table->text('image');

            $table->string('seo_title', 60)->nullable();
            $table->string('seo_description', 160)->nullable();

            $table->unsignedTinyInteger('time_to_read')->default(0);

            $table->boolean('comments_enabled')->default(true);
            $table->boolean('display_author')->default(true);

            $table->timestamp('published_at')->nullable();
            $table->timestamp('featured_at')->nullable();
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
        Schema::dropIfExists('content_articles');
    }
}
