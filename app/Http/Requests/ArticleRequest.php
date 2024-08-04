<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      // return false;
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
          'input_code' => 'required | max:255',
          'input_title' => 'required | max:255',
        ];
    }

    public function attributes()
    {
      return [
        'input_code' => 'コード',
        'input_title' => 'タイトル',
      ];
    }
}
