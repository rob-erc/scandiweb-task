<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="app/Views/script.js"></script>
    <link rel="stylesheet" type="text/css" href="app/Views/app.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">

    <title>Product List</title>

</head>

<body>
<div class="border-space">

    <form method="post" action="/new" style="background-color: transparent; border-color: transparent">

        <h2 id="page-title">
            New Product
        </h2>
        <hr>

        <?php if (isset($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif; ?>

        <label>SKU</label>
        <span class="tooltip top" aria-label="SKU code for the new product">
                <input name="sku" type="text" required>
            </span>
        <br>
        <br>

        <label>Name</label>

        <input name="name" type="text" required>

        <br>
        <br>

        <label>Price</label>

        <input name="price" type="text" required>

        <br>
        <br>

        <label>Type Switcher</label>
        <select name="select" onchange="changeOptions(this)" required>
            <option selected="selected">Please select type</option>
            <option value="disc">Disc</option>
            <option value="book">Book</option>
            <option value="furniture">Furniture</option>
        </select>

        <div class="type" id="disc" style="display: none">
            <br>
            <label>Size</label>
            <input type="number" name="size">
            <br><br>
            <p>Please input the capacity of the disk in MB.</p>
        </div>

        <div class="type" id="book" style="display: none">
            <br>
            <label>Weight</label>
            <input type="number" step="0.1" name="weight">
            <br><br>
            <p>Please input the weight of the book in Kg.</p>
        </div>

        <div class="type" id="furniture" style="display: none">
            <br>
            <label>Height</label>
            <input type="number" name="height">
            <br><br>
            <label>Width</label>
            <input type="number" name="width">
            <br><br>
            <label>Length</label>
            <input type="number" name="length">
            <br><br>
            <p>Please input dimensions of the furniture.<br>Your input will be saved in HxWxL format.</p>
        </div>

        <br>
        <input type="submit" value="Save">
    </form>

    <footer>
        <a href="/products">All products</a>
        <br>
        <a href="/new">New Product</a>
    </footer>

</div>

</body>

</html>