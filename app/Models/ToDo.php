<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'due_date',
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    protected $hidden = [
        'deleted_at',
    ];


    // Acessors
    public function getFormatedStatusAttribute(): string
    {
        return $this->completed ? 'Completed' : 'Not Completed';
    }
}
