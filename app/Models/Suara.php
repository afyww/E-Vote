<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'calon_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calon()
    {
        return $this->belongsTo(Calon::class);
    }
}
