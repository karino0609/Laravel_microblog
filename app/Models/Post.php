<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    
    // //public function scopeRecommend($query) {
    //     // ランダムに３つの投稿を取得
    //     return $query->inRandomOrder()->limit(3);
    // }
    
    
    protected $fillable = ['user_id', 'comment'];
}


