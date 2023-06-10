<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Categories</title>

  <link rel="stylesheet" type="text/css" href="/css/maine.css" />
</head>

<body>
  <header>
    <h1>Агрегатор новостей</h1>
  </header>
  <hr /><br>
  <?php foreach ($categoriesList as $key => $categories) : ?>
    <div style="border: 1px solid green; 
                text-align: center;
                color: green;
                margin: 0 auto;
                width: 50%;">
      <h2><a href=categories/<?= $key ?>><?= $categories ?></a></h2>
    </div>
    <br>
  <?php endforeach; ?>
  <hr />
  <footer>С уважением, первоисточники.</footer>
</body>

</html>