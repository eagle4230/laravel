<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>News</title>

  <link rel="stylesheet" type="text/css" href="/css/maine.css" />
</head>

<body>
  <header>
    <h1><?= $titleCategory ?></h1>
  </header>
  <hr /><br>
  <?php foreach ($newsList as $news) : ?>
    <div style="border: 1px solid green; 
                text-align: center;
                color: blue;
                margin: 0 auto;
                width: 50%;">
      <h2><a href="<?= $news['category'] ?>/<?= $news['id'] ?>">
          <?= $news['title'] ?>
        </a>
      </h2>
      <p style="font-style: italic; 
                color: grey;
                font-size: 20px;
                ">
        <?= $news['description'] ?>
      </p>
      <p style="text-align: right;
                font-size: 15px;">
        <?= $news['author'] ?> (<?= $news['created_at']->format('d-m-Y H:i') ?>)
      </p>
    </div><br>
  <?php endforeach; ?>
  <hr />
  <footer>С уважением, первоисточники.</footer>
</body>

</html>