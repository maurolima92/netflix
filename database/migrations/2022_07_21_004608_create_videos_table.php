<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();            
            $table->string('title');
            $table->text('description');
            $table->text('url');
            $table->string('imagecp');
            $table->string('imagebg');
            $table->boolean('visible')->default(true);
            $table->timestamps();

            $table->foreignId('categorie_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};
