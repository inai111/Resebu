<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = 'komunitas';
    
    public function user(){
        return $this->belongsTo(UserModel::class);
    }
}
