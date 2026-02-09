<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\RecordActivity;

class TempatMakan extends Model
{
    use HasFactory, SoftDeletes, RecordActivity;

    protected $table = 'tempat_makan';

    protected $fillable = [
        'name', 'description', 'address', 'latitude', 'longitude',
        'rating_google', 'google_place_id', 'price_min', 'price_max',
        'phone', 'image_url', 'created_by', 'updated_by', 'deleted_by'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
