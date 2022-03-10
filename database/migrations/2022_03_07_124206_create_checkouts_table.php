<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();

            //2nd method (syarat harus sesuai dengan nama tabelnya (contoh user_id berarti relasi ke tabel users kolom id))
            $table->foreignId('user_id')->constrained();
            $table->foreignId('camp_id')->constrained();
            $table->string('card_number', 20);
            $table->date('expired');
            $table->string('cvc', 3);
            $table->boolean('is_paid')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
