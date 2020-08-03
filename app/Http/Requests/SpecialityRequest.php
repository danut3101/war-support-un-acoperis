<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SpecialityRequest
 * @package App\Http\Requests
 */
class SpecialityRequest extends FormRequest
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
        $uniqueName = 'unique:specialities,name';

        if (!empty($this->id)) {
            $uniqueName .= ',' . $this->id;
        }

        return [
            'name' => ['required', $uniqueName, 'string', 'max:128'],
            'parent' => ['nullable', 'exists:specialities,id'],
            'description' => ['nullable', 'string', 'max:8192']
        ];
    }
}
