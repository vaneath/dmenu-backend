<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "data" => [
                "type" => "owners",
                "owner_id" => $this->id,
                "attributes" => [
                    "first_name" => $this->first_name,
                    "last_name" => $this->last_name,
                    "profile_img_path" => $this->profile_img_path,
                    "email" => $this->email,
                    "phone_number" => $this->phone_number,
                ],
                'timestamp' => [
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                ],
            ],
        ];
    }
}
