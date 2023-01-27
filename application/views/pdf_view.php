<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Your Invoice</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1 class="text-center bg-info">Invoice #0001</h1>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Tax</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($names as $key => $name) {
        ?>
        <tr>
            <td><?php echo $key +1 ?></td>
            <td><?php echo $name ?></td>
            <td><?php echo $quantity[$key] ?></td>
            <td><?php echo '$'.$price[$key] ?></td>
            <td><?php echo $tax[$key] ?></td>
            <td><?php echo '$'.$itemTotal[$key] ?></td>
        </tr>
    <?php
    }
    ?>
    <tbody>
</table>
</body>
</html>