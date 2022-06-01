<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{

protected $fillable = [
        'titre','montant','date','doccument','mode_paiement','employe'
];

}
