<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('logins', function (Blueprint $table) {
        $table->id();
        $table->string('email')->nullable();
        $table->string('mobile_number')->nullable(); // store mobile number
        $table->string('password'); // store hashed password
        $table->timestamp('login_at')->useCurrent(); // store login date/time
        $table->timestamps();
    });
}



    public function down(): void
    {
        Schema::dropIfExists('logins');
    }
};

