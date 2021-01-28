<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_sorties', function (Blueprint $table) {
            $table->id();
            $table->string('ref_Bon');
            $table->string('ref_Produit');
            $table->string('quantité');
            $table->string('categorie');
            $table->string('prixUnitaire');
            $table->foreign('ref_Bon')->references('ref_Bon')->on('bons')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ref_Produit')->references('ref_Produit')->on('produits')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('produit_sorties');
    }
}
