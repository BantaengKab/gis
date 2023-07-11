<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasSektor extends Model
{
    use HasFactory;

    protected $table = 'user_has_sektor';
    protected $guarded = ['id'];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sektor()
    {
        return $this->hasMany(Sektor::class,'id','sektor_id');
    }


}
