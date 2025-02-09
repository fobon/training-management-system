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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('username', 255);
            $table->string('phone', 255);
            $table->string('company', 255);
            $table->string('role', 255);
            $table->date('DOB');
            $table->rememberToken();
            $table->string('image');
            $table->timestamps();
        });
    }

    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    public function isNormalUser()
    {
        return $this->role ==='Normal user';
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
