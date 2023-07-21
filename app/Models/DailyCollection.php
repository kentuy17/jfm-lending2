<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class DailyCollection extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = [
        'loan_id',
        'client_id',
        'interest_amount',
        'daily_principal',
        'daily_interest',
        'daily_paid',
        'status',
        'remaining_balance',
        'daily_collections',
    ];

    protected $casts = [
        'created_at' => 'datetime:M-d-y',
        'updated_at' => 'datetime:M-d-y H:i:s',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->timezone('Asia/Singapore')->format('M-d H:i:s');
    }
}
