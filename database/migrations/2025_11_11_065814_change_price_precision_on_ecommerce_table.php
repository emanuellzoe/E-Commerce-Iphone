<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePricePrecisionOnEcommerceTable extends Migration
{
    public function up()
    {
        Schema::table('ecommerce', function (Blueprint $table) {
            // ubah precision menjadi 15,2 (nilai besar dan 2 desimal)
            $table->decimal('price', 15, 2)->change();
        });
    }

    public function down()
    {
        Schema::table('ecommerce', function (Blueprint $table) {
            // kembalikan bila perlu (sesuaikan dengan nilai awal, misal 8,2)
            $table->decimal('price', 8, 2)->change();
        });
    }
}
