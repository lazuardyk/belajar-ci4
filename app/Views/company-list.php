<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Company</title>
  </head>
  <body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-10">
                <h3>Company List</h3>
            </div>
            <div class="col-md-2">
                <h3><a href="/edit-company">+</a></h3>
            </div>
        </div>
        <div class="row mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Company Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($company as $row) { ?>
                        <tr>
                            <td><?php echo $row['company_name']; ?></td>
                            <td><?php echo $row['company_phone']; ?></td>
                            <td><?php echo $row['company_address']; ?></td>
                            <td><a href="/detail-company/<?php echo $row['company_id'] ?>">Detail</a> | <a href="/employee-list/<?php echo $row['company_id'] ?>">Employee List</a> | <a href="/edit-company/<?php echo $row['company_id'] ?>">Edit</a> | <a href="/delete-company/<?php echo $row['company_id'] ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>