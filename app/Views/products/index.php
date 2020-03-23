<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="app/Views/app.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">

    <title>Product List</title>

</head>

<body>

<div class="border-space">

    <form method="post" action="/products" style="background-color: transparent; border-color: transparent">
        <input type="hidden" name="_method" value="DELETE">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="box"><h2 id="page-title">Product List</h2></div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <input class="option-select" type="submit" value="Apply">
                    <select class="option-select" style="margin-top: 10px">
                        <option>Mass Delete Action</option>
                    </select>
                </div>


            </div>
            <hr>

            <div class="row">
                <?php foreach ($products as $product): ?>

                    <div class="card">
                        <div class="section">
                            <input type="checkbox" name="checkList[]"
                                   value="<?php echo $product['id'] ?>">
                            <p class="doc"><?php echo $product['sku'] ?></p>
                            <p class="doc"><?php echo $product['name'] ?></p>
                            <p class="doc"><?php echo $product['price'] ?> $</p>
                            <?php if ($product['attribute_type'] == 'disc'): ?>
                                <p class="doc">Size: <?php echo $product['special_attribute'] ?> MB</p>
                            <?php elseif ($product['attribute_type'] == 'book'): ?>
                                <p class="doc">Weight: <?php echo $product['special_attribute'] ?> Kg</p>
                            <?php elseif ($product['attribute_type'] == 'furniture'): ?>
                                <p class="doc">Dimensions: <?php echo $product['special_attribute'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </form>

    <footer>
        <a href="/products">All products</a>
        <br>
        <a href="/new">New Product</a>
    </footer>

</div>

</body>

</html>