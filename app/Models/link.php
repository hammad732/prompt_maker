<?php

namespace App\Models;

use App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class link extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function link()
    {
        return $this->hasOne(PromptMaker::class);
    }
}
