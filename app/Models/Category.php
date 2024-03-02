<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notice;
use App\Models\Link;
use App\Models\Note;
use App\Models\Resource;
use App\Models\Template;
use App\Models\Task;
use App\Models\User;

class Category extends Model
{
    use HasFactory;


    public function scopeOnlyCurrentUserAndGloabal($query)
    {
        return $query->where('user_id', auth()->id())->orWhere('is_global', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
