<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model

{
    protected $guarded= [];

    public function path()
    {
//        return '/threads/' . $this->id;
        return "/threads/{$this->channel->slug}/{$this->id}";
    }

    public function channel()
    {
       return  $this->belongsTo(Channel::class);
    }
//



    public function replies()
    {
        return $this->hasMany(Reply::class);
    }


    public function creator()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }


    public function scopeFilter($query, $filters)
    {
        if (isset($filters['month'])) {

            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }

        if (isset($filters['year'])) {

            $query->whereYear('created_at', $filters['year']);
        }

    }



}
