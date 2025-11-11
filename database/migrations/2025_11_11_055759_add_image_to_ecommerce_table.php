<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToEcommerceTable extends Migration
{
    public function up()
    {
        Schema::table('ecommerce', function (Blueprint $table) {
            $table->string('image')->nullable()->after('stock');
        });
    }

    public function down()
    {
        Schema::table('ecommerce', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
