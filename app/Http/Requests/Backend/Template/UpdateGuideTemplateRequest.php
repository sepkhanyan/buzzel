<?php

namespace App\Http\Requests\Backend\Template;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateGuideTemplateRequest.
 */
class UpdateGuideTemplateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'active' => ['required'],
        ];
    }
}
