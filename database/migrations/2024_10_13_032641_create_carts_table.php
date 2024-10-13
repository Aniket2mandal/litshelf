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
        Schema::create('carts', function (Blueprint $table) {
            $table->id('CartID'); // This will create an auto-incrementing primary key column named CartID
            $table->foreignId('UserID')->constrained('users')->onDelete('cascade'); // This will create a foreign key referencing the Users table
            $table->foreignId('BookID')->constrained('books')->onDelete('cascade'); // This will create a foreign key referencing the Books table
            $table->integer('Quantity')->unsigned(); // This will create a Quantity column that cannot be null
            $table->timestamp('AddedAt')->default(DB::raw('CURRENT_TIMESTAMP')); // This will create an AddedAt column with a default value of the current timestamp
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
        Schema::dropIfExists('carts');
    }
};
