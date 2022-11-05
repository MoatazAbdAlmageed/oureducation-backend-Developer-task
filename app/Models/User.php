<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'currency',
        'email',
        'id',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'parentEmail', 'email');
    }
}
