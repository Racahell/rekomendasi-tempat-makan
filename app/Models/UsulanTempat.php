<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\RecordActivity;

class UsulanTempat extends Model
{
    use HasFactory, SoftDeletes, RecordActivity;

    protected $table = 'usulan_tempat';

    protected $fillable = [
        'name', 'description', 'address', 'latitude', 'longitude',
        'rating_google', 'google_place_id', 'price_min', 'price_max',
        'phone', 'image_url', 'status', 'rejection_reason',
        'proposed_by', 'approved_by'
    ];

    public function proposer()
    {
        return $this->belongsTo(User::class, 'proposed_by');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
