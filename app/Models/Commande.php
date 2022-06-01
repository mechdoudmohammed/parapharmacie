<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{

protected $fillable = [
        'date','client','employe','totale','id','credit','paye'
];



}
