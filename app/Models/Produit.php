<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;


use App\Models\Stock;
use App\Models\Bon;


class Produit extends Model
{
    use HasFactory;

    protected $primaryKey  = 'ref_Produit';

    protected $keyType = 'string';

    protected $fillable=[
        'ref_Produit'
        ];

        public function stock()
        {
            return $this->belongsTo(Stock::class);
        }
        public function bon()
        {
            return $this->belongsTo(Bon::class);

        }

}
