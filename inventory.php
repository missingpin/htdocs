<?php
    include("connect.php");
    include ('header.php');
    $query = "SELECT * FROM student";
    $query_run = mysqli_query($con, 'table-product');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inventory.css">
    <link rel="stylesheet" href="header.css">
    <script src="https://cdn.js.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


    <title>Inventory</title>
</head>
<body>
    <div class = "modal fade" id ="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="examplemodallabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h5 class="modal-title" id="examplemodallabel"> Add Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="insert.php" method="POST">
                <div class="modal-body">
                    <label> Product</label>
                    <input type="text" name="product" class="form-control" placeholder="Enter Product Name">
                </div>
                <div class="form-group">
                    <label> Quantity </label>
                    <input type="number" name="quantity" class="form-control" placeholder="Quantity Count">
                </div>
                <div class="form-group">
                    <label> Expiration </label>
                    <input type="date" name="expiration" class="form-control" placeholder="Enter Expiration date">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="insertdata" class="btn btn-primary" >Save</button>
                </div>
            </form>
    <h2 class ="Table-List"> Table List</h2>
        <table class="contents">
            <thead>
                <tr class="table-body">
                    <th scope="col"> ID </th>
                    <th scope="col"> Image </th>
                    <th scope="col"> Product </th>
                    <th scope="col"> Quantity </th>
                    <th scope="col"> Expiration </th>
                    <th scope="col"> Edit </th>
                </tr>
                </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
                    }
                }
                ?>
                <tbody>
                <tr class="table-info">
                    <td> <?php echo $row ['id']; ?> </td>
                    <td> <?php echo $row ['photo']; ?> </td>
                    <td> <?php echo $row ['product']; ?> </t>
                    <td> <?php echo $row ['quantity']; ?> </td>
                    <td> <?php echo $row ['exp']; ?> </td>
                    </tr>
                    </tbody>
                </table>
</body>
</html>