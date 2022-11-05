<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const AUTHORIZED = 1;
    const DECLINE = 2;
    const REFUNDED = 3;


    protected $fillable = [
        'currency',
        'parentEmail',
        'statusCode',
        'paymentDate',
        'parentIdentification',
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(Employee::class);
    }
}
