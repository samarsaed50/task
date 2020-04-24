<?php

namespace App\Models\Products\Requests;
use App\Models\Languages\Repositories\LanguageRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $validation['translate.ar.name'] = "required|max:190";
        $validation['translate.ar.description'] = '';
        $validation['image'] = 'image';
    //    $validation['price_type'] = 'required|in:1,2';
     //   $validation['service_type'] = 'required|in:1,2';
        $validation['store_id'] = 'required';
     
      //  $validation['price'] = 'required_if:price_type,1|numeric';


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
