<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/post-individual.css" />
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401&display=swap" rel="stylesheet">
    <title>Post-individual</title>
</head>

<body>

<?php include 'navbar.view.php'; ?>

    <div class="container">
                <div class="image-container">
                <img src="<?= $post[0]->image_capa ?>" alt="" class="image1">
            </div>       
            <div class="main">
                <div class="section-description">
                    <div class="avaliation-line">
                        <div class="dados">
                            <img src="<?= $post[0]->image ?>" alt="" class="icon1">
                            <div>
                                <h2><?= $post[0]->name ?></h2>
                                <h3><?= $post[0]->create_at ?></h3>
                            </div>
                        </div>
                        <div class="classificacao">
                            <h3 class="star"><?= $post[0]->avaliation ?></h3>
                        </div>
                    </div>
                    <h1><?= $post[0]->title ?></h1>
                    <p><?= $post[0]->content ?></p>
                </div>
            </div>
    </div>

    <?php include 'footer.view.php'; ?>

</body>

</html>