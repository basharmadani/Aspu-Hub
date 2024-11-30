<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleToPermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('role_to_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roleID');
            $table->unsignedBigInteger('permissionID');
            $table->timestamps();

            $table->foreign('roleID')->references('roleID')->on('roles')->onDelete('cascade');

            $table->foreign('permissionID')->references('permissionID')->on('permissions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_to_permissions');
    }
}
