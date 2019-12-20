<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

final class CreateUsersTable extends Migration
{
    public function up() : void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('api_token')->unique();
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('users');
    }
}
