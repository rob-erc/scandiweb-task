<?php

namespace App;

interface StoreProductInterface
{
    public function store(string $sku, string $name, float $price, string $specialAttribute, string $attributeType);
}