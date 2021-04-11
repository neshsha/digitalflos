<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'caption', 'image', 'article', 'isapproved'
    ];

   public function user() {
   	return $this->belongsTo(User::class);
   }
}
