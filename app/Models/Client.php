<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'status'
    ];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
