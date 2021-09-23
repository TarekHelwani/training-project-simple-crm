<?php

namespace App\Models;

use App\Traits\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes, Filter;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'client_id',
        'deadline',
        'status'
    ];

    public const STATUS = ['open', 'in progress', 'blocked', 'cancelled', 'completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
