<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncaissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encaissements', function (Blueprint $table) {
            $table->id();
            $table->decimal('montantEncaisse', 8, 2)->default(0);
            $table->foreignId('cient_id')->constrained('clients')->nullable();
            $table->timestamp('dateEncaissement');
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
        Schema::dropIfExists('encaissements');
    }
}
