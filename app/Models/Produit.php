<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
  protected $fillable = [
      'nom','marque','description','prix_achat','prix_vente','quantite','code_barre','image','fournisseur','categorie','employe','statut'
  ];

}
