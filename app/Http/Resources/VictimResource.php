<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VictimResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nickname' => $this->nick_name,
            'gender' => $this->gender,
            'x_handle_full' => $this->twitter,
            'x_handle' => $this->x_handle,
            'photo_url' => $this->photo_url,
            'status' => $this->status,
            'holding_location' => $this->holding_location?->name,
            'security_organ' => $this->security_organ?->name,
            'time_taken' => $this->status_date?->format('H:i d-m-Y'),
            'time_taken_formatted' => $this->status_date?->toDayDateTimeString(),
            'notes' => $this->notes,
        ];
    }
}
