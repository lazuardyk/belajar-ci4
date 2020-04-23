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
            <div class="col-md-6">
                <!-- <?php var_dump($employee); ?> -->
                <h3>Employee List - <?php echo ($company_name) ? $company_name : ""; ?></h3>
            </div>
            <div class="col-md-6">
                <h3><a href="/edit-employee/<?php echo ($company_id) ? $company_id : ""; ?>">+</a></h3>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($employee as $index => $row) { ?>
                            <tr>
                                <td><?php echo $row['employee_name']; ?></td>
                                <td><?php echo ($row['employee_gender'] == "1") ? "Male":"Female"; ?></td>
                                <td><?php echo $row['employee_birthday']; ?></td>
                                <td><a href="#" onclick="view(<?php echo $index; ?>);" data-id="<?php echo $row['employee_id']; ?>">View</a> | <a href="/edit-employee/<?php echo $row['company_id'] ?>/<?php echo $row['employee_id'] ?>">Edit</a> | <a href="/delete-employee/<?php echo $row['company_id'] ?>/<?php echo $row['employee_id'] ?>">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <div id="view-name"></div>
                <div id="view-image"></div>
                <div id="view-gender"></div>
                <div id="view-birthday"></div>
                <div id="view-phone"></div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

<script>
let data = <?php echo json_encode($employee); ?>;
function view(index){
    let gender = data[index]['employee_gender'] == "1" ? 'Male' : 'Female';
    $('#view-name').html(
        '<h4>'+data[index]['employee_name']+'</h4>'
    );
    if (data[index]['employee_picture'] != null){
        $('#view-image').html(
        '<img src="<?php echo base_url()?>'+data[index]['employee_picture']+'" width="200px" height="200px">'
        );
    };
    $('#view-gender').html(
        '<p class="mb-0">Gender: '+gender+'</p>'
    );
    $('#view-birthday').html(
        '<p class="mb-0">Birthday: '+data[index]['employee_birthday']+'</p>'
    );
    $('#view-phone').html(
        '<p class="mb-0">Phone: '+data[index]['employee_phone']+'</p>'
    );
    
};
</script>
</html>