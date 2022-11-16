<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'projects';
    protected $fillable = [
        'client_id',
        'name',
        'amount',
        'status',
        'details',
    ];
    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
