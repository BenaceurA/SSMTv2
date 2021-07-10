<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//  AO_E : ajouter offre emplois 
//  MO_E : modifier offre emplois
//  SO_E : supprimer offre emplois 

//  AO_S : ajouter offre stage
//  MO_S : modifier offre stage
//  SO_S : supprimer offre stage

//  TC_E : telecharger cv emploi
//  TL_E : telecharger lettre emploi
//  SC_E : supprimer candidature emploi

//  TC_S : telecharger cv stage
//  TL_S : telecharger lettre stage
//  SC_S : supprimer candidature stage

//  TC-CS : telecharger cv (candidature spontanée)
//  TL-CS : telecharger lettre (candidature spontanée)
//  SC-E-CS : supprimer candidature emploi (candidature spontanée)
//  SC-S-CS : supprimer candidature stage (candidature spontanée)

class User_Permissions extends Model
{
    use HasFactory;

    protected $table = "user_permissions";

    protected $attributes = [
        'AO_E' => 0,
        'MO_E' => 0,
        'SO_E' => 0,
        'AO_S' => 0,
        'MO_S' => 0,
        'SO_S' => 0,
        'TC_E' => 0,
        'TL_E' => 0,
        'SC_E' => 0,
        'TC_S' => 0,
        'TL_S' => 0,
        'SC_S' => 0,
        'TC_CS' => 0,
        'TL_CS' => 0,
        'SC_E_CS' => 0,
        'SC_S_CS' => 0,
        'AU' => 0
    ];
}
