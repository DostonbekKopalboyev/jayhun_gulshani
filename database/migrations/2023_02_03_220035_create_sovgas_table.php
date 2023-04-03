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
        Schema::create('sovgas', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->text('description');
            $table->string('narx');
            $table->integer('soni')->nullable();
            $table->integer('savat_id')->nullable();

            $table->unsignedBigInteger('category_id')->unsigned();
//            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
//            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
        Schema::dropIfExists('sovgas');
    }
};
