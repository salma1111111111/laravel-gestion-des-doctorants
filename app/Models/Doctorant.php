<?php

namespace App\Models;
use App\Models\Prof;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorant extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'prenom','prof_id'
    ];
    public function prof()
    {
        return $this->belongsTo(Prof::class, 'prof_id', 'id');
    }
}
