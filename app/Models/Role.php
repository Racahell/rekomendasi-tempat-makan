<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\RecordActivity;

class Role extends Model
{
    use HasFactory, SoftDeletes, RecordActivity;

    protected $table = 'peran';

    protected $fillable = ['name', 'slug', 'description'];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_peran', 'peran_id', 'menu_id');
    }
}
