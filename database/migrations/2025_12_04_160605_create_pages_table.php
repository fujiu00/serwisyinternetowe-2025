<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Ważne: to pozwala dodawać dane

return new class extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });

        // TO JEST CZĘŚĆ, KTÓREJ CI BRAKUJE:
        DB::table('pages')->insert([
            ['slug' => 'home', 'title' => 'Strona Główna', 'content' => 'Witamy w Twoim CMS! To jest treść pobrana z bazy danych.'],
            ['slug' => 'o-nas', 'title' => 'O Nas', 'content' => 'Tutaj możesz napisać coś o firmie.'],
            ['slug' => 'kontakt', 'title' => 'Kontakt', 'content' => 'Skontaktuj się z nami: kontakt@przyklad.pl']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
};