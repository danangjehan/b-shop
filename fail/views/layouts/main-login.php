<?php
use app\assets\LoginAssets;
use yii\helpers\Html;
use dmstr\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

LoginAssets::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
        <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>
    <script>
    
 
    </script>
    <?php $this->head() ?>
</head>

<body>
  <div class="form">
      
      <?php $this->beginBody() ?>
      <?= Alert::widget() ?>
    <?= $content ?>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<!-- <body class="login-page">


 -->