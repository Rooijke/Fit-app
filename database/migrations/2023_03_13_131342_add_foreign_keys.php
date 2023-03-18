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
        Schema::table('fits', function(Blueprint $table){
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::table('piece_fit', function(Blueprint $table){
            $table->foreignId('piece_id')
                ->references('id')
                ->on('pieces');

                $table->foreignId('fit_id')
                    ->references('id')
                    ->on('fits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
