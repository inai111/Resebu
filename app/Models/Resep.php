<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class Resep extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=['id'];
    protected $table = 'reseps';

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
    public function kategori(){
        return $this->belongsTo(KategoriModel::class,'id_kategori');
    }
}
