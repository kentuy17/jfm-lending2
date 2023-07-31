<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;

class Collector extends Model
{
    use HasFactory;
    protected $table = 'collectors';

    protected $fillable = [
        'name',
        'route',
    ];

    public function clients()
    {
        return $this->hasMany(Clients::class, 'collector_id', 'id');
    }

}
