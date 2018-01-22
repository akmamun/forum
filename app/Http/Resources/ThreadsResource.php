<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ThreadsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'channel_id' => $this->channel_id,
            'title' => $this->title,
            'description' => $this->body,



        ];
    }
}
