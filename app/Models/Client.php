<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Client extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function avatar(): MorphOne
    {
        return $this->morphOne(Avatar::class, 'avatarable');
    }
}
