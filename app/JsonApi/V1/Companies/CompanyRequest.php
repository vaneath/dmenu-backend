<?php

namespace App\JsonApi\V1\Companies;

use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class CompanyRequest extends ResourceRequest
{
    /**
     * Get the validation rules for the resource.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['string', 'email'],
            'logoImgPath' => ['string'],
        ];
    }
}
