<?php
// connect to db
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=blog', 'root', '');
// we are telling PDO what to do if connection is not successeful
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//making a query in to db to select from db
$statement = $pdo->prepare('SELECT * FROM cms ORDER BY title ASC');
$statement->execute();

$content = $statement->fetchAll(PDO::FETCH_ASSOC);



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
    <h1>C-M-S</h1>
    <?php
    include_once 'nav.php';
    ?>
    <p>
      <a href="create.php" type="button" class="btn btn-success">Add new article</a>
    </p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Action</th>
      <!-- <button type="button" class="btn btn-info">Edit</button> -->
    </tr>
    
  </thead>
  <tbody class="table-group-divider">
    <?php foreach ($title as $i => $title):  ?>
<tr>
  <th scope="row"><?php echo $i +1 ?></th>
  <td><a href=""><?php echo $title['content'] ?></a></td>
  <td><button type="button" class="btn btn-info">Edit</button></td>
  
</tr>
    
    
    <?php endforeach; ?>    
  </tbody>
  </table>

</body>
</html>