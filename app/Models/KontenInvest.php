<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenInvest extends Model
{
    use HasFactory;

     protected $table = 'konten_invest';
    protected $guarded = ['id'];
}
