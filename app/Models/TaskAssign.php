<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssign extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'task_assigns';
    protected $fillable = [
        'project_id',
        'user_id',
        'notes',
        'deadline_date',
        'deadline_time',
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }
}
