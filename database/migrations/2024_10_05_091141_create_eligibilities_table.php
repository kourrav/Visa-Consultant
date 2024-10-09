<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eligibilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('interested_country');
            $table->string('purpose_of_travel');
            $table->boolean('currently_employed');
            $table->boolean('lungs_infection');
            $table->boolean('physical_mental_disorder');
            $table->boolean('criminal_offence');
            $table->string('visa_type');
            $table->boolean('live_different_country');
            $table->boolean('have_spouse');
            $table->string('earn_monthly');
            $table->boolean('traveled_before');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eligibilities');
    }
};
