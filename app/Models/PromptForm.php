<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromptForm extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function prompt(){
        return $this->hasMany(PromptMaker::class);
    }
}
