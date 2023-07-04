<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imoveis extends Model
{
    use HasFactory;

    protected $connection = 'dm_portal';
    protected $table = 'imoveis';
    protected $primaryKey = 'imovel';
}
