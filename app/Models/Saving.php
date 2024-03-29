<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $fillable = ["amount","date", "user_id"];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
}
}