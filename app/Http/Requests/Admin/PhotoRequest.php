<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (int) $this->user_id === auth()->id();
    }

    public function rules(): array
    {
        return [
            'album_id' => 'required|exists:albums,id',
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'sometimes|required|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'album_id.required' => trans('admin.field.required.album_id'),
            'name.required' => trans('admin.field.required.name'),
            'content.required' => trans('admin.field.required.content'),
            'image.required' => trans('admin.field.required.image'),
        ];
    }
}
