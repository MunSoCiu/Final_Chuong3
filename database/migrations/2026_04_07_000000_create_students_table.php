<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
             $table->string('msv')->unique();
    $table->date('dob')->nullable();
    $table->string('address')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};