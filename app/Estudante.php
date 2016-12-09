<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estudante extends Model
{
    protected $fillabel=[
        'nome',
        'apelido',
        'datanascimento',
        'altura',
        'sexo',
        'email',
        'telefone',
        'curso_id',
        'user_id'
    ];
}
