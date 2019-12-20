<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

final class CreateBranchesTable extends Migration
{
    public function up() : void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('location');
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('branches');
    }
}
