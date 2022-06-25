<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_id')->constrained('levels')->onDelete('cascade');
            $table->string('value')->comment('list of answers');
            $table->string('answer')->comment('original answers');
            $table->integer('selected')->comment('Select the answer id');
            $table->boolean('status')->default(1)->comment('1 - Active, 0 - InActive');
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
        Schema::dropIfExists('answers');
    }
}
