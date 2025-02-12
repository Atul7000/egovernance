<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'mobile_no', 'pan_card_no', 'id_card_path', 'role'];

    protected $hidden = ['password'];

    public function percentages()
    {
        return $this->hasMany(Percentage::class);
    }
}
