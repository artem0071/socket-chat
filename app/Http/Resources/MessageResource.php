<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'channel' => $this->resource['channel_id'],
            'user' => [
                'id' => $this->resource['user_id'],
                'name' => $this->resource['name']
            ],
            'text' => $this->resource['text'],
            'dates' => [
                'created' => now()->toDateTimeString()
            ]
        ];
    }
}
