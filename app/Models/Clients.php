<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loan;
use App\Models\Collector;
use DateTimeInterface;

class Clients extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = [
        'id',
        'account_no',
        'account_name',
        'collector_id',
        'balance',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:M-d-Y',
        'updated_at' => 'datetime:M-d H:i:s',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->timezone('Asia/Singapore')->format('M-d H:i:s');
    }

    public function loan()
    {
        return $this->hasMany(Loan::class, 'client_id', 'id');
    }

    public function latest_loan()
    {
        return $this->loan()->orderBy('id', 'desc');
    }

    public function collectors()
    {
        return $this->belongsTo(Collector::class, 'collector_id', 'id');
    }
}
