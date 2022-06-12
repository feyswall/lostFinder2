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
        Schema::create('lost_info_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lost_id')->constrained('losts')->cascadeOnDelete;
            $table->string('lost_info_type');
            $table->string('lost_info_item');
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
        Schema::dropIfExists('lost_info_details');
    }
};
