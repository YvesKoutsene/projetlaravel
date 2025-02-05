<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{

    protected $table = 'criteria';

    use HasFactory;
    protected $fillable = [
        'criteria_name',
        'weight',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

}
