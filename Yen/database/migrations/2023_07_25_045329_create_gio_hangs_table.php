<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGioHangsTable extends Migration
{
    public function up()
    {
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('san_pham_id')->unsigned();
            $table->integer('so_luong')->unsigned();
            $table->decimal('tong_tien', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('san_pham_id')->references('id')->on('san_phams')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('gio_hangs');
        
    }
}
