<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHamaHamaGejalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hama_hama_gejala', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hama_id');
            $table->foreignId('hama_gejala_id');
            $table->float('nilai_cf');
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
        Schema::dropIfExists('hama_hama_gejala');
    }
}
