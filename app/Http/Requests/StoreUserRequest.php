<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    protected $personal_rules = [
        'name' => 'required|max:60',
        'email' => 'required|max:60'
    ];
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if (!empty($this->password)) {
            $this->personal_rules = [
                'name' => 'required|max:60',
                'email' => 'required|max:60',
                'password' => 'required|min:6',
                'password_confirm' => 'required|min:6|same:password'
            ];
        }
    }
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return $this->personal_rules;
    }
}
