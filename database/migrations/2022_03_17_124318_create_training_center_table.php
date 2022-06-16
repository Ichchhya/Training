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
        Schema::create('training_center', function (Blueprint $table) {
            $table->id();
            $table->string('en_name');
            $table->string('np_name');
            $table->string('slug');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('website_url')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('contact_number');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('training_center');
    }
};
