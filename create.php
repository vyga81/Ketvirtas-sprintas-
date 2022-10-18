
<?php
require_once 'conn.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Content management system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
  </head>
<body>
    <form action="create.php" method="post">
      <div class="mb-3 container form-group" >
         <a href="index.php" class="d-inline-flex p-2"> Back</a>
         <label  class="form-label ">Content title</label>
         <input type="text" class="form-control text-center  "  placeholder="Content title">
      </div>
      <div class="mb-3 form-group container">
         <label  class="form-label">Content textarea</label>
         <input type="text"  class="form-control"  rows="3"></input>
         <button type="button" class="btn btn-info">Create</button>
      </div>
    </form>

</body>
</html>