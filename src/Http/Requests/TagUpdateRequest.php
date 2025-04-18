<?php

declare(strict_types=1);

namespace Sendportal\Base\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Sendportal\Base\Facades\Sendportal;
use Sendportal\Base\Models\Tag;

class TagUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique(Tag::class)
                    ->where('workspace_id', Sendportal::currentWorkspaceId())
                    ->ignore($this->tag),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => __('The tag name must be unique.'),
        ];
    }
}
