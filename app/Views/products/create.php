<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="app/Views/script.js"></script>
    <link rel="stylesheet" type="text/css" href="app/Views/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Product List</title>

</head>

<body>
<div class="border-space">
    <header>
        <h2 id="page-title">
            Product Add
        </h2>
        <hr>
    </header>

    <?php if (isset($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif; ?>

    <div id="create-form">
        <form method="post" action="/new">
            <label>SKU</label>
            <input name="sku" type="text" required>

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
                <label>Size</label>
                <input type="number" name="size">
                <br><br>
                <p>Please provide the capacity of the disk in MB.</p>
            </div>

            <div class="type" id="book" style="display: none">
                <label>Weight</label>
                <input type="number" name="weight">
                <br><br>
                <p>Please provide the weight of the book in Kg.</p>
            </div>

            <div class="type" id="furniture" style="display: none">
                <label>Height</label>
                <input type="number" name="height">
                <br><br>
                <label>Width</label>
                <input type="number" name="width">
                <br><br>
                <label>Length</label>
                <input type="number" name="length">
                <br><br>
                <p>Your input will be saved in HxWxL format.</p>
            </div>

            <br>
            <input type="submit" value="Save">
        </form>

    </div>

</div>

</body>

</html>