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
        $product = $this->query()->findOrFail($id);
        $this->fillImageHost($product);
        return $product;
    }

    function fillImageHost($product)
    {
        foreach ($product->pictures as $picture) {
            $picture->url = Request::root() . "/images/d/" . $picture->url;
        }
    }

    function query()
    {
        $query = Product::with(
            array('pictures' => function($query) {
                $query->where('type', '=', 1)
                    ->orderBy('order', 'desc');
            })
        );
        return $query;
    }
}