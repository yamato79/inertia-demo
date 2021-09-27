<?php

namespace App\Http\Requests\Resource;

use App\Models\ResourceType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateResourceRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if ($this->get('resource_type_id') == ResourceType::LINK) {
            $this->merge([
                'target' => $this->boolean('open_new_tab') ? '_blank' : '_self',
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'resource_type_id' => ['required', 'integer', 'exists:resource_types,resource_type_id'],
        ];

        if ($this->get('resource_type_id') == ResourceType::DOCUMENT) {
            $rules['file'] = ['nullable'];
        }

        if ($this->get('resource_type_id') == ResourceType::LINK) {            
            $rules['link'] = ['required', 'string', 'max:255'];
            $rules['target'] = ['required', 'string', 'max:255', Rule::in(['_blank', '_self', '_parent', '_top'])];
        }

        if ($this->get('resource_type_id') == ResourceType::SNIPPET) {
            $rules['description'] = ['required', 'string', 'max:255'];
            $rules['content'] = ['required', 'string'];
        }

        return $rules;
    }
}
