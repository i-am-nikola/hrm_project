<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'email' => 'required|email',
      'password' => 'required',
    ];
  }

  public function attributes()
  {
    return [
      'email' => t('auth.email'),
      'password' => t('auth.password')
    ];
  }

  public function messages()
  {
    return [
      '*.required' => ':attribute ' . t('validate.required'),
      'email.email' => ':attribute ' . t('validate.invalid'),
    ];
  }
}
