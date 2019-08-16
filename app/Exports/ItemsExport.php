<?php

namespace App\Exports;

use App\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;



class ItemsExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Item::select('id','name','category_id','place_id','bought_at','cost','description');
    }
    public function headings(): array
    {
        return [
            'id','Name','Category Id', 'Place_id', 'Bought_at', 'Cost', 'Description'
        ];
    }

}
