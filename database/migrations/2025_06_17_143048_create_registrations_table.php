<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
   public function up()
{
    Schema::create('registrations', function (Blueprint $table) {
        $table->id();
        $table->string('country');
        $table->string('college');
        $table->string('name');
        $table->string('contact_number', 15);
        $table->string('gender');
        $table->string('email')->unique();
        $table->integer('year');
        $table->string('domain');
        $table->timestamps();
    });
}

   
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
