<?php

namespace Toyota\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitleFooterRequest extends FormRequest
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
      'title_footer' => 'required|string'
    ];
  }
}
