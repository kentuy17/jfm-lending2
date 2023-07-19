<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;
use DateTimeInterface;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';
    protected $fillable = [
        'id',
        'client_id',
        'amount',
        'type',
        'status',
        'remaining_balance',
        'total_payable',
        'total_interest',
        'date_release',
        'daily_payable',
        'daily_interest',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:M-d H:i:s',
        'updated_at' => 'datetime:M-d H:i:s',
        'date_release' => 'datetime:M-d-y',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->timezone('Asia/Singapore')->format('M-d H:i:s');
    }

    public function getValueAttribute($value) {
        return round($value, 2);
    }

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
