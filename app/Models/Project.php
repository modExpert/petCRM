<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_at_unix',
        'user_id',
        'client_id',
    ];

    // Связь с пользователем (владелец проекта)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Связь с клиентом (опционально)
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
