<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('owners', function (Blueprint $table) {
      $table->id();
      $table->string('first_name', 50);
      $table->string('last_name', 50);
      $table->string('profile_img_path')->nullable();
      $table->string('email', 50)->unique();
      $table->string('password');
      $table->string('password_confirmation');
      $table->string('phone_number', 20)->unique();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('owners');
  }
};
