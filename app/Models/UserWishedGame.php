<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserWishedGame extends Model
{
    use HasFactory;

    protected $table = 'users_wished_games';

    protected $fillable = ['user_id', 'game_id'];
}