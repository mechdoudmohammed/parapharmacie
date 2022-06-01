<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
  protected $table='fournisseurs';
  protected $fillable = [
      'id', 'nom','telephone','adresse','email'
  ];

}
