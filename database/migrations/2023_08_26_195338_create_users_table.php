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


        Schema::table('users', function (Blueprint $table) {

            $table->string('name')->after('existing_column');


            // $table->id();
            // $table->string('nom');
            // $table->string('prenom');
            // $table->string('login');
            // $table->string('mdp');
            // $table->string('email')->unique();
            // $table->string('tel');
            // $table->string('fonction');
            // $table->string('ip');
            // $table->rememberToken();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
