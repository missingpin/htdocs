<?php
include 'connect.php';

if (isset($_POST['displaySend'])) {
    $table = '
    <style>
        .table tbody {
            background-color: white;
        }
        .table td img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            cursor: pointer;
        }
        .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <input type="text" id="searchInput" placeholder="Search..." onkeyup="filterTable()">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col" style="text-align: center;">ID</th>
                <th scope="col" style="text-align: center;">Product Image</th>
                <th scope="col" style="text-align: center;">Product Name</th>
                <th scope="col" style="text-align: center;">Quantity</th>
                <th scope="col" style="text-align: center;">Expiration</th>
                <th scope="col" style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>';

    $sql = "SELECT * FROM product";
    $result = mysqli_query($con, $sql);
    $number = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $image = $row['image'] ? 'uploads/' . $row['image'] : 'no-image.jpg';
        $productname = htmlspecialchars($row['productname']);
        $quantity = htmlspecialchars($row['quantity']);
        $exp = htmlspecialchars($row['exp']);

        $table .= '<tr>
            <td scope="row">' . $number . '</td>
            <td><img src="' . $image . '" width="100" alt="' . $productname . '" data-toggle="modal" data-target="#imageModal" data-img="' . $image . '"></td>
            <td>' . $productname . '</td>
            <td>' . $quantity . '</td>
            <td>' . $exp . '</td>
            <td style="width: 150px;">
                <button class="btn btn-primary btn-sm" onclick="editline(' . $id . ')">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="deleteline(' . $id . ')">Delete</button>
            </td>
        </tr>';
        $number++;
    }

    $table .= '</tbody></table>';
    echo $table;
}
?>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Product Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <img id="modalImage" src="" alt="" style="max-width: 100%; max-height: 90vh; object-fit: contain;">
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).on('click', 'img[data-toggle="modal"]', function() {
        var imgSrc = $(this).data('img');
        $('#modalImage').attr('src', imgSrc);
    });
</script>
