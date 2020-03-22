<?php

class Product
{
    protected $sku;

    protected $name;

    protected $price;

    protected $specialAttribute;

    public function __construct(string $sku, string $name, float $price, string $specialAttribute)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->specialAttribute = $specialAttribute;
    }

    public function sku(): string
    {
        return $this->sku;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function specialAtt(): string
    {
        return $this->specialAttribute;
    }
}