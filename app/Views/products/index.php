<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="app/Views/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Product List</title>

</head>

<body>
<div class="border-space">
    <header>
        <h2 id="page-title">
            Product List
        </h2>

        <form id="delete-select" method="post" action="/products">
            <input type="hidden" name="_method" value="DELETE">
            <select style="">
                <option>Mass Delete Action</option>
            </select>
            <input type="submit" value="Apply">



    </header>

    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card text-center">
                        <div class="card-body">
                            <input class="card text-left" type="checkbox" name="checkList[]" value="<?php echo $product['id'] ?>">
                            <p class="card-text"><?php echo $product['sku'] ?></p>
                            <p class="card-text"><?php echo $product['name'] ?></p>
                            <p class="card-text"><?php echo $product['price'] ?> $</p>
                            <?php if ($product['attribute_type'] == 'disc'): ?>
                                <p class="card-text">Size: <?php echo $product['special_attribute'] ?> MB</p>
                            <?php elseif ($product['attribute_type'] == 'book'): ?>
                                <p class="card-text">Weight: <?php echo $product['special_attribute'] ?> Kg</p>
                            <?php elseif ($product['attribute_type'] == 'furniture'): ?>
                                <p class="card-text">Dimensions: <?php echo $product['special_attribute'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </form>
</div>

</body>

</html>