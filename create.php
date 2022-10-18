
<?php
// connect to db
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=blog2', 'root', '');
// we are telling PDO what to do if connection is not successeful
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];

$title = '';
$content = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');



if (!$title) {
  $errors[] = 'Title is required';
}
if (!$content) {
  $errors[] = 'Content is required';
}

if (empty($errors)){
        $statement = $pdo->prepare("INSERT INTO cms (title, content, create_date) VALUES (:title, :content, :date)");

     $statement->bindValue(':title', $title);
     $statement->bindValue(':content', $content);
     $statement->bindValue(':date', $date);
     $statement->execute();
}
}
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
<?php if  (!empty($errors)): ?>
     <div class="alert alert-danger">
           <?php foreach ($errors as $error): ?>
           <div><?php echo $error?></div>
           <?php endforeach; ?>
      </div>
<?php endif; ?>


    <form action="create.php" method="post">

      <div class="mb-3 container form-group" >
         <a href="index.php" class="d-inline-flex p-2"> Back</a>
         <label  class="form-label ">Content title</label>
         <input name="title" type="text" class="form-control text-center" value="<?php echo $title?>"  placeholder="Content title">
      </div>

      <div class="mb-3 form-group container">
         <label  class="form-label">Content textarea</label>
         <input  name="content" type="text"  class="form-control" valu="<?php echo $content?>" placeholder="Your content is here"  ></input>
         <button type="submit" class="btn btn-info ">Create</button>
      </div>

    </form>

</body>
</html>