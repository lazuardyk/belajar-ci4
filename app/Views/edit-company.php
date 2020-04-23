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
                <h3>Add or Edit Company</h3>
            </div>
        </div>
        <form action="<?php echo ($company) ? "/edit-company/".$company->company_id : "/edit-company/add"; ?>" method="post">
        <div class="form-group row mt-2">
            <label for="staticEmail" class="col-md-2 col-form-label">Company Name:</label>
            <div class="col-md-10">
            <input required type="text" class="form-control" name="company-name" id="company-name" value="<?php echo ($company) ? $company->company_name : ""; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-md-2 col-form-label">Company Phone:</label>
            <div class="col-md-10">
            <input required type="number" class="form-control" name="company-phone" id="company-phone" value="<?php echo ($company) ? $company->company_phone : ""; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-md-2 col-form-label">Company Address:</label>
            <div class="col-md-10">
            <textarea required class="form-control" id="company-address" name="company-address" rows="3"><?php echo ($company) ? $company->company_address : ""; ?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>