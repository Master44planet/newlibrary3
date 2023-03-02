<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'genre'=>'required',
            'avtor'=>'required',
            'data'=>'required',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Поле "Название книги" обязательно для заполнения',
            'genre.required'=>'Поле "Жанр книги" обязательно для заполнения',
            'avtor.required'=>'Поле "Автор книги" обязательно для заполнения',
            'data.required'=>'Поле "Дата выпуска книги" обязательно для заполнения'
        ];
    }
}
