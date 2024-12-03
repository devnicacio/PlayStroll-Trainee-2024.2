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
    <div class="container">
                <div class="linha-preta"></div> 
                <div class="image-container">
                <img src="<?= $post->image_capa ?>" alt="" class="image1">
            </div>       
            <div class="main">
                <div class="section-description">
                    <div class="avaliation-line">
                        <div class="dados">
                            <img src="<?= $post->image_author ?>" alt="" class="icon1">
                            <div>
                                <h2><?= $post->author_name ?></h2>
                                <h3><?= $post->create_at ?></h3>
                            </div>
                        </div>
                        <div class="classificacao">
                            <h3 class="star"><?= $post->avaliation ?></h3>
                        </div>
                    </div>
                    <h1><?= $post->title ?></h1>
                    <p><?= $post->content ?></p>
                </div>
            </div>
    </div>
</body>

</html>