<?php

namespace App\Models;

use App\Models\Doctorant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'prenom'
    ];
    public function doctorants()
    {
        return $this->hasMany(Doctorant::class, 'prof_id', 'id');
    }
}
