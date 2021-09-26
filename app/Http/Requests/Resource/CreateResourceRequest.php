<?php

namespace App\Http\Requests\Resource;

use App\Models\ResourceType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateResourceRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'resource_type_id' => ['required', 'integer', 'exists:resource_types,resource_type_id'],
            'description' => [Rule::requiredIf($this->get('resource_type_id') === ResourceType::DOCUMENT), 'string', 'max:255'],
            'content' => [Rule::requiredIf($this->get('resource_type_id') === ResourceType::DOCUMENT), 'string'],
            'link' => [Rule::requiredIf($this->get('resource_type_id') === ResourceType::LINK), 'string', 'max:255'],
            'target' => [Rule::requiredIf($this->get('resource_type_id') === ResourceType::LINK), 'string', 'max:255', Rule::in(['_blank', '_self', '_parent', '_top'])],
        ];
    }
}
