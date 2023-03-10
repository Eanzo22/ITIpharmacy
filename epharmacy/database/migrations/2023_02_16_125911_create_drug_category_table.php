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
        Schema::create('drug_category', function (Blueprint $table) {
            $table->integer("drug_id")->unsigned();
            $table->integer("category_id")->unsigned(); 
            $table->foreign("drug_id")->references("id")->on("drugs");
            $table->foreign("category_id")->references("id")->on("categories");
            $table->primary(["drug_id" , "category_id"]) ; 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_category');
    }
};
