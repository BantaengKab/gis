<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investasi extends Model
{
    use HasFactory;

    protected $table = 'investasi';
    protected $guarded = ['id'];

    public function sektor()
    {
        return $this->hasOne(Sektor::class, 'id', 'sektor_id');
    }
    public function investor()
    {
        return $this->hasOne(Investor::class, 'id', 'investor_id');
    }
     public function wilayah()
    {
        return $this->hasOne(Wilayah::class, 'kd_wilayah', 'wilayah_id');
    }


}
