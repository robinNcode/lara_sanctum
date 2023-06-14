<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'priority' => $this->priority,
                'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            ],
            'relationships' => [
                'id' => (string)$this->user->id,
                'user_name' => $this->user->name,
                'user_email' => $this->user->email,
            ],
        ];
    }
}
