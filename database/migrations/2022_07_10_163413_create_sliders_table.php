<?php

use App\Classes\Status;
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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default(Status::DA_CONG_BO);
            $table->timestamps();
        });
        Schema::table('carousels', function (Blueprint $table) {
            $table->foreignId('slider_id')->constrained('sliders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
        Schema::dropColumns('carousels', ['slider_id']);
    }
};
