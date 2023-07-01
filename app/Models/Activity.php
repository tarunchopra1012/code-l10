<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'guide_id',
        'name',
        'description',
        'start_time',
        'price',
        'photo'
    ];
 
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
 
    // many-to-many relationship between the current model and the User model
    public function participants()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
