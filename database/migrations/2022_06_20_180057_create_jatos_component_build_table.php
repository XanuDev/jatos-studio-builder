<?php

use App\Models\Build;
use App\Models\JatosComponent;
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
        Schema::create('build_jatos_component', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(JatosComponent::class);
            $table->foreignIdFor(Build::class);

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
        Schema::dropIfExists('build_jatos_component');
    }
};
