<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Item extends Model
{
    use HasFactory, Notifiable;

    public $table  = "items";

    protected $fillable = [
        'name', 'price', 'quantity', 'org_id',  'category_id'
    ];

    public function org(){
        return $this->belongsTo(User::class, 'org_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
