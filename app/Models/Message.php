<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
      'nom','message','telephone','sujet','lire_le'
  ];

}
