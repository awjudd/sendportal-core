<?php

declare(strict_types=1);

namespace Sendportal\Base\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Sendportal\Base\Models\EmailService;
use Sendportal\Base\Models\Template;

class CampaignStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return $this->getRules();
    }

    /**
     * @return array
     */
    protected function getRules(): array
    {
        return [
            'name' => [
                'required',
                'max:255'
            ],
            'subject' => [
                'required',
                'max:255'
            ],
            'from_name' => [
                'required',
                'max:255',
            ],
            'from_email' => [
                'required',
                'max:255',
                'email',
            ],
            'email_service_id' => [
                'required',
                'integer',
                Rule::exists(EmailService::class, 'id')
            ],
            'template_id' => [
                'nullable',
                Rule::exists(Template::class, 'id')
            ],
            'content' => [
                Rule::requiredIf($this->template_id === null),
            ],
            'is_open_tracking' => [
                'boolean',
                'nullable'
            ],
            'is_click_tracking' => [
                'boolean',
                'nullable'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email_service_id.required' => __('Please select an email service.'),
        ];
    }
}
