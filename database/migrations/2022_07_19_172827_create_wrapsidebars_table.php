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
        Schema::create('wrapsidebars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::table('sidebars', function (Blueprint $table) {
            $table->foreignId('wrapsidebar_id')->constrained('wrapsidebars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wrapsidebars');
        Schema::dropColumns('sidebars', ['wrapsidebar_id']);
    }
};
