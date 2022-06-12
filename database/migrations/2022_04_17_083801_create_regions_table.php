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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->foreignId('location_id')->constrained('locations')->nullOnDelete;

            $table->index('location_id');
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
        Schema::table('regions', function (Blueprint $table) {
            $table->dropIndex(['location_id']);
            $table->dropForeign(['location_id']);
        });
        Schema::dropIfExists('regions');
    }
};
