<?php

namespace App\Models\Orders\Repositories;

use App\Models\Orders\Order;
use App\Repositories\BaseRepository;
use App\Models\Orders\Repositories\Interfaces\OrderRepositoryInterface;
use Yajra\DataTables\DataTables;
use App\Models\Stores\Store;
class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    protected $with=['user','store'];

    public function model()
    {
        return Order::class;
    }

    public function getWithDataTable()
    {
        return DataTables::of($this->dataTableModel())
            ->addIndexColumn()->make(true);
    }

    public function review($id)
    {
        if (Order::where('id', $id)->count() > 0) {
            $record = Order::where('id', $id)->first();

            $record->update(request()->all());

        $avg_rate =Order::where('store_id',$record->store_id)->avg('rate');

        Store::where('id', '=', $record->store_id)->update(['avg_rate' => $avg_rate]);

            return 'Your Review Has Been Submitted Successfully.';
        }
        return 'This Order Does Not Exist';
    }



}
