<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('ref_Facture');
            $table->string('ref_Produit');
            $table->string('quantité');
            $table->string('prixTotal');
            $table->string('prixUnitaire');
            $table->foreign('ref_Facture')->references('ref_Facture')->on('factures')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('stocks');
    }
}
