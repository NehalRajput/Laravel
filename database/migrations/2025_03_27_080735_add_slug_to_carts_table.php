<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToCartsTable extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('product_title');
        });
    }

    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}