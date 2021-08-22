<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Domains\User\User;
use App\Http\Domains\Rank\Rank;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 30);
            $table->string('email', 128)->unique();
            $table->string('icon_path', 45)->default('');
            $table->string('password', 128);
            $table->text('comment');

            $table->tinyInteger('permission')->default(User::PERMISSION_USER);
            $table->tinyInteger('status')->default(User::STATUS_EXIST);
            $table->integer('stamina')->default(10);
            $table->date('last_login');
            $table->unsignedTinyInteger('rank')->default(Rank::BRONZE);
            $table->rememberToken();
            $table->timestamps();
        });
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
}
