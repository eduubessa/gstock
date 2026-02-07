<?php

declare(strict_types=1);

namespace App\Http\Requests\Box;

use App\Enums\Box\StatusBoxEnum;
use App\Enums\Box\TypeBoxEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class StoreBoxRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => [
                'required',
                'string',
                'min:3',
                'max:20',
            ],
            'description' => [
                'nullable',
                'string',
                'max:100',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:1',
                'max:100',
            ],
            'capacity' => [
                'required',
                'integer',
                'min:1',
                'max:100',
            ],
            'type' => [
                'required',
                Rule::in(array_column(TypeBoxEnum::cases(), 'value')),
            ],
            'status' => [
                'required',
                Rule::in(array_column(StatusBoxEnum::cases(), 'value')),
            ],
        ];
    }
}
