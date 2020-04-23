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
            <div class="col-md-12">
                <h3>Add or Edit Employee - <?php echo ($company_name) ? $company_name : ""; ?></h3>
            </div>
        </div>
        <form enctype="multipart/form-data" action="<?php echo ($employee_id) ? "/edit-employee/".$company_id."/".$employee_id : "/edit-employee/".$company_id."/add"; ?>" method="post">
        <input type="hidden" name="company-id" id="company-id" value="<?php echo ($company_id) ? $company_id : ""; ?>">
        <div class="form-group row mt-2">
            <label for="staticEmail" class="col-md-2 col-form-label">Employee Name:</label>
            <div class="col-md-10">
            <input required type="text" class="form-control" name="employee-name" id="employee-name" value="<?php echo ($employee_name) ? $employee_name : ""; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-md-2 col-form-label">Gender:</label>
            <div class="col-md-10">
            <input required type="radio" class="form-control-input" name="employee-gender" id="employee-gender" value="1" <?php echo ($employee_gender == "1") ? "checked" : ""; ?>> Male
            <input required type="radio" class="form-control-input" name="employee-gender" id="employee-gender" value="0" <?php echo ($employee_gender == "0") ? "checked" : ""; ?>> Female
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-md-2 col-form-label">Birthday:</label>
            <div class="col-md-10">
            <input required type="date" class="form-control" name="employee-birthday" id="employee-birthday" value="<?php echo ($employee_birthday) ? $employee_birthday : ""; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-md-2 col-form-label">Picture:</label>
            <div class="col-md-10">
            <input type="file" class="form-control-input" name="employee-picture" id="employee-picture">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-md-2 col-form-label">Employee Phone:</label>
            <div class="col-md-10">
            <input required type="number" class="form-control" name="employee-phone" id="employee-phone" value="<?php echo ($employee_phone) ? $employee_phone : ""; ?>">
            </div>
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

<script>
$(document).ready(function(){
    var today = new Date();
    var dd = today.getDate()-1;
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    $('#employee-birthday').attr("max", today);
});
</script>
</html>