<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Допускаем, что каждый имеет доступ к этому запросу.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'string|min:3|max:40',
            'last_name' => 'string|min:3|max:40',
            'phone_number' => 'string|regex:/^\+7\d{10}$/|unique:users,phone_number,',
            'avatar' => 'image|mimes:jpg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.string' => 'Поле "Имя" должно быть строкой.',
            'first_name.min' => 'Поле "Имя" должно содержать минимум :min символов.',
            'first_name.max' => 'Поле "Имя" должно содержать максимум :max символов.',
    
            'last_name.string' => 'Поле "Фамилия" должно быть строкой.',
            'last_name.min' => 'Поле "Фамилия" должно содержать минимум :min символов.',
            'last_name.max' => 'Поле "Фамилия" должно содержать максимум :max символов.',
    
            'phone_number.string' => 'Поле "Номер телефона" должно быть строкой.',
            'phone_number.regex' => 'Неверный формат номера телефона. Пожалуйста, используйте формат +7XXXXXXXXXX.',
            'phone_number.unique' => 'Номер телефона уже используется.',
    
            'avatar.image' => 'Файл должен быть изображением.',
            'avatar.mimes' => 'Формат изображения должен быть JPG или PNG.',
            'avatar.max' => 'Размер изображения не должен превышать 2MB.',
        ];
    }
}
