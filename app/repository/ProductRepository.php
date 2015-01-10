<?php
/**
 * Created by PhpStorm.
 * User: goku
 * Date: 1/10/15
 * Time: 2:04 PM
 */

class ProductRepository
{
    public function all()
    {
        return $this->query()->get();
    }

    public function find($id)
    {
        return $this->query()->findOrFail($id);
    }

    function query()
    {
        return Product::with(
            array('pictures' => function($query) {
                $query->where('type', '=', 1)
                    ->orderBy('order', 'desc');
            })
        );
    }
}