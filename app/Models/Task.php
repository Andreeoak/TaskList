<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    //Do not allow mass assignment for all fields, only the ones specified in $fillable
    //Do not allow passwords or sensitive data to be mass assigned
    protected $fillable = [
        'title',
        'description',
        'long_description',
    ];

    public function toggleCompletion()
    {
        $this->completed = !$this->completed;
        $this->save();
    }

}
