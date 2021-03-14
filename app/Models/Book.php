<?php

namespace App\Models;

use GrahamCampbell\ResultType\Result;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable=
    [
        "title",
        "autor",
        "numero_serie",
        "user_id",
    ];

    public function search($filter = null){

        $results = $this->where('title', 'LIKE', "%{$filter}%")
                        ->orWhere('autor', 'LIKE',"%{$filter}%")
                        ->paginate(1);
        return $results;
    }
}
