<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Follow;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'password',
        'profile',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //リレーションを設定
    public function posts($with_follows = false) {
        if($with_follows) {
            $follow_user_ids = $this->follow_users->pluck('id');
            return $this->hasMany(Post::class)->orWhereIn('user_id', $follow_user_ids)->latest();
        }else {
            return $this->hasMany(Post::class)->latest();
        }
    }
    
    public function scopeRecommend($query, $self_id) {
        $follow_ids = User::find($self_id)->follow_users->pluck('id');
        return $query->where('id', '!=', $self_id)->whereNotIn('id', $follow_ids)->latest()->limit(3);
    }
    
    
    public function follows() {
        return $this->hasMany(Follow::class);
    }
    
    public function follow_users() {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'follow_id');
    }
    
    // public function followers() {
    //     return $this->belongsToMany(User::class, 'follows', 'follow_id', 'user_id');
    // }
    
    public function isFollowing($user) {
        $result = $this->follow_users->pluck('id')->contains($user->id);
        return $result;
    }
}
