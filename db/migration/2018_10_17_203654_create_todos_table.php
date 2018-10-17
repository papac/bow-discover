<?php

use Bow\Database\Migration\Schema;
use Bow\Database\Migration\Migration;
use Bow\Database\Migration\TablePrinter as Printer;

class CreateTodosTable extends Migration
{
    /**
     * create Table
     */
    public function up()
    {
        Schema::create("todos", function(Printer $table) {
            $table->increment('id');
            $table->string('text');
            $table->boolean('done');
            $table->timestamps();
        });
    }

    /**
     * Drop Table
     */
    public function down()
    {
        Schema::dropIfExists("todos");
    }
}
