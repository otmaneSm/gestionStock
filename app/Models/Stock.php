<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\Facture;
use App\Models\Produit;

class Stock extends Model
{
    use HasFactory;
    protected $fillable=[
        'ref_Produit','ref_Produit'
        ];
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
}
