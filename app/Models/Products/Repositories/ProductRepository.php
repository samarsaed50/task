<?php

namespace App\Models\Products\Repositories;

use App\Models\Categories\Repositories\CategoryRepository;
use App\Models\Languages\Repositories\LanguageRepository;
use App\Models\Products\Product;
use App\Models\Services\Repositories\ServiceRepository;
use App\Models\Stores\Repositories\StoreRepository;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Container\Container as App;
use Yajra\DataTables\DataTables;

class ProductRepository extends BaseRepository
{

    protected $with = ['store', 'translations', 'category', 'store.translations', 'category.translations'];


    public function model()
    {
        return Product::class;
    }

//    public function dataTableModel()
//    {
//        return parent::dataTableModel()->orderBy('store_id', 'DESC');
//    }


    public function dataTableModel()
    {
        return $this->model->orderBy('category_id', 'desc')->orderBy('store_id', 'desc')->orderBy('id', 'desc')->with($this->with);
    }


    public function createData()
    {
        $data ['store'] = app(StoreRepository::class)->all();
        $data['subcategory'] = app(CategoryRepository::class)->all();
       // $data['services'] = app(ServiceRepository::class)->where(['type' => 1])->get();

//        $storeCategory = $data['store']->first() ? $data ['store']->first()->load('categories') : collect([]);
//
//        $data['subcategory'] = $storeCategory->count() > 0
//            ? app(CategoryRepository::class)->whereIn('parent_id', $storeCategory->categories->pluck('id'))->get()
//            : [];

        return $data;
    }

    public function editData($id)
    {
        $data = parent::editData($id); // TODO: Change the autogenerated stub

//        $data['language'] = app(LanguageRepository::class)->all();
        $data['subcategory'] = app(CategoryRepository::class)->all();
//        $storeCategory = $data['store']->first() ? $data ['store']->first()->load('categories') : collect([]);
//
//        $data['subcategory'] = $storeCategory->count() > 0
//            ? app(CategoryRepository::class)->whereIn('parent_id', $storeCategory->categories->pluck('id'))->get()
//            : [];
            $data['store'] = app(StoreRepository::class)->all();
      

        return $data;
    }

}