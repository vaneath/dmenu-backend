<?php

namespace App\JsonApi\V1\Owners;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class OwnerRequest extends ResourceRequest
{

  /**
   * Get the validation rules for the resource.
   *
   * @return array
   */
  public function rules(): array
  {
    $owner = $this->model();
    $uniqueEmail = Rule::unique('owners', 'email');
    $uniquePhone = Rule::unique('owners', 'phone_number');

    if ($owner) {
      $uniqueEmail->ignoreModel($owner);
      $uniquePhone->ignoreModel($owner);
    }

    return [
      'firstName' => ['required', 'string', 'max:50'],
      'lastName' => ['required', 'string', 'max:50'],
      'profileImgPath' => ['required', 'string'],
      'email' => ['required', 'string', 'email', 'max:255', $uniqueEmail],
      'password' => ['required', 'string', 'min:8'],
      'passwordConfirmation' => ['required', 'string', 'min:8'],
      'phoneNumber' => ['required', 'string', 'max:20', $uniquePhone],
    ];
  }

}
