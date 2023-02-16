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
        Schema::create('drugs', function (Blueprint $table) {
            $table->integer("id")->primary()->unsigned();
            $table->string("name",50);
            $table->integer("quantity");
            $table->integer("price");
            $table->tinyInteger("company_id")->unsigned();
            $table->foreign("company_id")->references("id")->on("companies") ; 
            $table->timestamps() ;  
            $table->softDeletes() ; 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drugs');
    }
};
