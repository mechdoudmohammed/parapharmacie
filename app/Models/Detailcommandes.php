<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detailcommandes extends Model
{
        
protected $fillable = [
        'quantite','prix','produit','commande','id','remise'
];

}
