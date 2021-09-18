<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Domains\Prize\Prize;

class CreatePrizesTable extends Migration
{
    const TABLE = 'prizes';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45);
            $table->string('image_path', 45);
            $table->integer('exchange_point');
            $table->tinyInteger('stock');
            $table->tinyInteger('status')->default(Prize::STATUS_EXIST);
            $table->unsignedTinyInteger('rank');
            $table->string('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE);
    }
}
