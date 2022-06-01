<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{

  protected $fillable = [
      'id', 'nom', 'prenom','cin','description','telephone','adresse','email','role','salaire','image','login','mot_passe'
  ];

}
