<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jenis_tiket', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('acara_id')->unsigned();
            $table->boolean('is_free');
            $table->text('keuntungan')->nullable();

            $table->foreign('acara_id')
                    ->references('id')
                    ->on('acara');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_tiket');
    }
};
