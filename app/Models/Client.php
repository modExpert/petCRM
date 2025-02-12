<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Указываем, какие поля можно массово заполнять
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'user_id',
    ];

    // Связь с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
