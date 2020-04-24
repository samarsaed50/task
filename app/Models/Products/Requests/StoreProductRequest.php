<?php

namespace App\Models\Products\Requests;

use App\Models\Languages\Repositories\LanguageRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $validation['translate.ar.name'] = 'required|max:190';
        $validation['translate.ar.description'] = '';
        $validation['image'] = 'required|image';
        //$validation['price_type'] = 'required|in:1,2';
       // $validation['service_type'] = 'required|in:1,2';
//        $validation['store_id'] = 'required';
        $validation['store_id'] = 'required'; // Validation Mahmoud

        //        $validation['price']='required|numeric'; // Validation Mahmoud
       // $validation['price'] = 'required_if:price_type,1|numeric';
//        $validation['category_id'] = "required|exists:category_store,category_id,store_id,".request('store_id')."'";


        $validation['start_discount_date'] = 'nullable|date';
        $validation['end_discount_date'] = 'nullable|date';
        $validation['discount'] = 'nullable|numeric';


        return $validation;
    }



    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (request('category_id')!=null && is_array(request('category_id'))) {
                foreach (request('category_id') as $value) {
                    if (!in_array($value,\DB::table('category_store')
                        ->where('store_id',request('store_id'))
                        ->get()->pluck('category_id')->toArray())) {
                        $validator->errors()->add('category_id', 'لقد إخترت قسم ليس مسجل فى هذا المتجر');
                        break;
                    }

                }
            }elseif(request('category_id')==null) {
                $validator->errors()->add('category_id', 'القسم الفرعى مطلوب');
            }
        });
    }



    public function attributes()
    {
        return [
            'translate.ar.name' => __('admin.ar_name'),
            'translate.ar.description' => __('admin.ar_description'),
            'price_type' => __('admin.price_type'),
            'image' => __('admin.image'),
            'price' => __('admin.price'),
            'store_id' => __('admin.store'),
            'category_id' => __('admin.category'),
            'service_type' => __('admin.service_type'),
        ];
    }
}
