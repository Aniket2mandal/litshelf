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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing primary key column named BookID
            $table->string('Title', 255);
            $table->string('Author', 255);
            $table->string('Publisher', 255)->nullable();
            $table->date('PublishDate')->nullable();
            $table->decimal('Price', 10, 2);
            $table->text('Description')->nullable();
            $table->foreignId('CategoryID')->constrained('categories')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
};
