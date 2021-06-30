<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory, Notifiable;

    public $table = "categories";

    protected $fillable = [
        'name', 'org_id'
    ];

    public function org(){
        return $this->belongsTo(User::class, 'org_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
