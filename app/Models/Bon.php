<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
class Bon extends Model
{
    use HasFactory;

    protected $primaryKey  = 'ref_Bon';

    protected $keyType = 'string';
    protected $fillable=[
        'ref_Bon'
        ];

        public function produits()
        {
            return $this->hasMany(Produit::class);
        }
}
