<?php

namespace App\Http\Controllers\API;

use App\Events\MessagePushed;
use App\Http\Resources\MessageResource;
use App\Rules\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * @param Request $request
     * @return MessageResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'channel_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    $uuidCheck = new Uuid();
                    if (!in_array($value, config('channels.reserved')) && !$uuidCheck->passes($attribute, $value)) {
                        $fail($uuidCheck->message());
                    }
                }
            ],
            'user_id' => [
                'required',
                new Uuid
            ],
            'name' => 'required|string|max:64',
            'text' => 'required|string',
        ]);

        broadcast(new MessagePushed(
            $validated
        ));

        return new MessageResource($validated);
    }
}
