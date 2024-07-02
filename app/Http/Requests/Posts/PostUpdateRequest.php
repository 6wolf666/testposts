<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => 'in:0,1',
        ];
    }

    public function getAllUpdateData(): array
    {
        return array_filter([
            'status' => $this->input('status'),
            'title' => $this->input('title'),
        ], static fn ($val) => ! is_null($val));
    }
}
