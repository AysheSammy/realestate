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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id")->index();
            $table-> foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->unsignedBigInteger("location_id")->index();
            $table-> foreign('location_id')->references('id')->on('locations')->cascadeOnDelete();
            $table->unsignedBigInteger("owner_type_id")->index();
            $table-> foreign('owner_type_id')->references('id')->on('owner_types')->cascadeOnDelete();
            $table->unsignedBigInteger("property_type_id")->index();
            $table-> foreign('property_type_id')->references('id')->on('property_types')->cascadeOnDelete();
            $table->tinyInteger("rent")->default(0);
            $table->unsignedDouble("area")->default(0);
            $table->boolean("repair")->default(0);
            $table->text('description')->nullable();
            $table->unsignedDouble('price')->default(0);
            $table->boolean('credit')->default(0);
            $table->boolean('documents')->default(0);
            $table->unsignedBigInteger('viewed')->default(0);
            $table->timestamp("created_at");
            $table->timestamp("updated_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
