<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;
use App\Models\Collector;
use App\Models\Loan;
use DateTimeInterface;

class DailyCollection extends Model
{
    use HasFactory;

    protected $table = 'daily_collections';
    protected $fillable = [
        'loan_id',
        'client_id',
        'interest_amount',
        'daily_principal',
        'daily_interest',
        'daily_paid',
        'status',
        'remaining_balance',
        'collection_date',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime:M-d-y',
        'updated_at' => 'datetime:M-d-y H:i:s',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->timezone('Asia/Singapore')->format('M-d H:i:s');
    }

    public function clients()
    {
        return $this->belongsTo(Clients::class, 'client_id', 'id');
    }

    public function loans()
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }

}
