<?php

namespace App;

use Carbon\Carbon;
use mysqli;

class StoreBook implements StoreProductInterface
{
    //stores product of type book
    public function store(string $sku, string $name, float $price, string $specialAttribute, string $attributeType)
    {
        $createdAt = Carbon::now();

        $mysqli = new mysqli(
            config('database.host'),
            config('database.username'),
            config('database.password'),
            config('database.database'));

        $mysqli->query(
            "INSERT INTO products (sku, name, price, special_attribute, attribute_type, created_at)
            VALUES ('".$sku."', '".$name."', '".$price."', '".$specialAttribute."', '".$attributeType."', '".$createdAt."')"
        );

        $mysqli -> close();

        return redirect('/products');
    }
}