<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('idusuarios');
            $table->string('nombre', 20);
            $table->string('email', 50);
            $table->string('password', 60);
            $table->integer('edad');
            $table->decimal('sueldo', 20,2);
            $table->timestamps();
        });

        // DB::statement("CREATE TABLE usuarios(
        //     idusuarios int auto_increment not null,
        //     nombre varchar(20) not null,
        //     email varchar(50) not null,
        //     password varchar(60) not null,
        //     PRIMARY KEY(idusuarios)
        // );");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            Schema::drop('usuarios');
        });
    }
}
