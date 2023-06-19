<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peluang extends Model
{
    use HasFactory;

    protected $table = 'peluang';
    protected $guarded = ['id'];

     public function sektor()
    {
        return $this->hasOne(Sektor::class, 'id', 'sektor_id');
    }

    public function wilayah()
    {
        return $this->hasOne(Wilayah::class, 'kd_wilayah', 'wilayah_id');
    }


}
