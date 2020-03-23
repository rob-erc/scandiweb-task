<?php

namespace App\Controllers;

use App\StoreBook;
use App\StoreDisk;
use App\StoreFurniture;
use mysqli;
use GUMP;

class ProductController
{
    //gathers product data to show on the products page
    public function index()
    {
        $mysqli = new mysqli(
            config('database.host'),
            config('database.username'),
            config('database.password'),
            config('database.database'));

        $products = $mysqli->query('SELECT * FROM products');

        $mysqli -> close();

        return view('products/index', ['products' => $products]);
    }

    //shows form to create new product
    public function create()
    {
        return view('products/create');
    }

    //validates user input from create form and chooses which store method to use according to product type
    public function store()
    {
        $is_valid = GUMP::is_valid($_POST, [
            'sku' => ['required', 'alpha_numeric'],
            'name' => ['required', 'alpha_numeric_space'],
            'price' => ['required', 'numeric', 'min_numeric' => 1],
            'select' => ['required']
        ], [
            'sku' => [
                'required' => 'Fill the SKU field please.',
                'alpha_numeric' => 'SKU field must contain only alpha numeric characters.'
            ],
            'name' => [
                'required' => 'Fill the name field please.',
                'alpha_numeric_space' => 'Name field must contain only alpha numeric characters.'
            ],
            'price' => [
                'required' => 'Fill the Price field please.',
                'numeric' => 'Price field must contain only numbers.',
                'min_numeric' => 'Price value has to be more than zero.'
            ],
            'select' => [
                'required' => 'You must select type of product.'
            ]
        ]);

        if ($is_valid === true) {
            $sku = $_POST['sku'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $attributeType = $_POST['select'];

            switch ($attributeType) {
                case ($attributeType == 'disc') :
                    $specialAttribute = $_POST['size'];

                    $specAtt_isValid = GUMP::is_valid($_POST, [
                        'size' => ['required', 'numeric', 'min_numeric' => 1]
                    ], [
                        'size' => [
                            'required' => 'Fill the disk size field please.',
                            'numeric' => 'Disk size must be a numeric value.',
                            'min_numeric' => 'Disk size must be greater than zero.',
                        ]
                    ]);

                    if ($specAtt_isValid === true) {
                        $disk = new StoreDisk();
                        $disk->store($sku, $name, $price, $specialAttribute, $attributeType);
                    } else {
                        return view('products/create', ['errors' => $specAtt_isValid]);
                    }

                    break;

                case ($attributeType == 'book') :
                    $specialAttribute = $_POST['weight'];

                    $specAtt_isValid = GUMP::is_valid($_POST, [
                        'weight' => ['required', 'numeric', 'min_numeric' => 1]
                    ], [
                        'weight' => [
                            'required' => 'Fill the book weight field please.',
                            'numeric' => 'Book weight must be a numeric value.',
                            'min_numeric' => 'Book weight must be greater than zero.'
                        ]
                    ]);
                        
                    if ($specAtt_isValid === true) {
                        $book = new StoreBook();
                        $book->store($sku, $name, $price, $specialAttribute, $attributeType);
                    } else {
                        return view('products/create', ['errors' => $specAtt_isValid]);
                    }

                    break;

                case ($attributeType == 'furniture') :
                    $specialAttribute = $_POST['height'] . 'x' . $_POST['width'] . 'x' . $_POST['length'];

                    $specAtt_isValid = GUMP::is_valid($_POST, [
                        'height' => ['required', 'numeric', 'min_numeric' => 1],
                        'width' => ['required', 'numeric', 'min_numeric' => 1],
                        'length' => ['required', 'numeric', 'min_numeric' => 1],
                    ], [
                        'height' => [
                            'required' => 'Fill the furniture height field please.',
                            'numeric' => 'Furniture height must be a numeric value.',
                            'min_numeric' => 'Furniture height must be greater than zero.'
                        ],
                        'width' => [
                            'required' => 'Fill the furniture width field please.',
                            'numeric' => 'Furniture width must be a numeric value.',
                            'min_numeric' => 'Furniture width must be greater than zero.'
                        ],
                        'length' => [
                            'required' => 'Fill the furniture length field please.',
                            'numeric' => 'Furniture length must be a numeric value.',
                            'min_numeric' => 'Furniture length must be greater than zero.'
                        ]
                    ]);

                    if ($specAtt_isValid === true) {
                        $furniture = new StoreFurniture();
                        $furniture->store($sku, $name, $price, $specialAttribute, $attributeType);
                    } else {
                        return view('products/create', ['errors' => $specAtt_isValid]);
                    }

                    break;
            }
        } else {
            return view('products/create', ['errors' => $is_valid]);
        }
    }

    //deletes all checked products from products page
    public function delete()
    {
        $products = implode(',', $_POST['checkList']);

        $mysqli = new mysqli(
            config('database.host'),
            config('database.username'),
            config('database.password'),
            config('database.database'));

        $mysqli->query("DELETE FROM products WHERE id IN ($products)");

        $mysqli -> close();

        return redirect('/products');
    }
}