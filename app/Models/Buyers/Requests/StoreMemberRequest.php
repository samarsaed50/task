<?php

namespace App\Models\Members\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $validation['name'] = 'required|max:190';
        $validation['email'] = 'required|email|string|max:190|unique:users';
        $validation['password'] = 'required|string|min:6|max:20';
        $validation['phone'] = 'required|regex:/(01)[0-9]{9}/|numeric|unique:users,phone';
        $validation['status'] = 'required|in:1,2';
        $validation['address'] = 'required';


//        $language = app(LanguageRepository::class)->all();
//
//        foreach ($language as $value) {
//            $validation ['translate.' . $value->code . '.name'] = 'required|max:190';
//        }

        return $validation;
    }

    public function attributes()
    {
        return [
            'name' => __('admin.name'),
            'email' => __('admin.email'),
            'password' => __('admin.password'),
            'phone' => __('admin.phone_number'),
            'status' => __('admin.status'),
            'address' => __('admin.address'),
        ];
    }
}
