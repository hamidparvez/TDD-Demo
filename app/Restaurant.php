<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * For getting sorting columns by value
     * @var array
     */
    private $sortColumnList = [
        'best-match' => 'bestMatch',
        'newest' => 'newestScore',
        'rating-average' => 'ratingAverage',
        'popularity' => 'popularity',
        'average-product-price' => 'averageProductPrice',
        'delivery-costs' => 'deliveryCosts',
        'minimum-order-amount-costs' => 'minimumOrderAmount',
    ];

    /**
     * Sorting Local Scope
     * @param $query
     * @param $request
     * @return mixed
     */
    public function scopeSorting($query,$request)
    {
        if(isset($request->sort) && $request->sort != '' && array_key_exists($request->sort,$this->sortColumnList)) {
            return $query->orderByDesc($this->sortColumnList[$request->sort]);
        }
    }

    /**
     * Search Local Scope
     * @param $query
     * @param $request
     * @return mixed
     */
    public function scopeSearch($query,$request)
    {
        if(isset($request->search) && $request->search != '') {
            return $query->where('name', 'LIKE', "%{$request->search}%");
        }
    }
}
