<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $guard = [
        'id'
    ];
    protected $table = 'users';
    public function komunitas(){
        return $this->hasOne(Komunitas::class,'user_id');
    }
}
