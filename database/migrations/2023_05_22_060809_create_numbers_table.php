<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phonenumber', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->bigInteger('cont_id')->unsigned()->index();
            $table->foreign('cont_id')->references('id')->on('contacts')->onDelete('restrict');
            $table->bigInteger('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phonenumber', function (Blueprint $table) {
            $table->dropColumn('cont_id');
            $table->dropForeign('cont_id');
            $table->dropColumn('type_id');
            $table->dropForeign('type_id');
        });
        Schema::dropIfExists('phonenumber');
    }
};
