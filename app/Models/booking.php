<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
