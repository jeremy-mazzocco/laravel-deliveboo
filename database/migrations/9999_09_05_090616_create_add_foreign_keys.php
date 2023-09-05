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
        Schema::table('type_user', function (Blueprint $table) {
            $table->foreignId('type_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });

        Schema::table('dish_order', function (Blueprint $table) {
            $table->foreignId('dish_id')->constrained();
            $table->foreignId('order_id')->constrained();
        });

        Schema::table('dishes', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_user', function (Blueprint $table) {

            $table->dropForeign('type_user_type_id_foreign');
            $table->dropForeign('type_user_user_id_foreign');

            $table->dropColumn('type_id');
            $table->dropColumn('user_id');
        });

        Schema::table('dish_order', function (Blueprint $table) {

            $table->dropForeign('dish_order_dish_id_foreign');
            $table->dropForeign('dish_order_order_id_foreign');

            $table->dropColumn('dish_id');
            $table->dropColumn('order_id');
        });

        Schema::table('dishes', function (Blueprint $table) {

            $table->dropForeign('dishes_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
