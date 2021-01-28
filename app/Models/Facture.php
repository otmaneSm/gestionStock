<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Stock;

class Facture extends Model
{
    use HasFactory;

    protected $primaryKey  = 'ref_Facture';

    protected $keyType = 'string';

    protected $fillable=[
        'ref_Facture'
        ];


        public function stocks()
        {
            return $this->hasMany(Stock::class);
        }
}
