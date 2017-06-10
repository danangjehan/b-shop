<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Regist';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Book</b>Shop</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <?php $form = ActiveForm::begin(['id' => 'regist-form']); ?>

        <?= $form->field($model, 'nama_user')->textInput(['maxlength' => true])?>
        <?= $form->field($model, 'password')->textInput(['maxlength' => true,'type'=>'password', 'name'=>'password', 'id'=>'password'])?>
        <div class="form-group field-user-password required">
            <label class="control-label" for="user-password">Retype Password</label>
            <input type="password" id="cfmPassword" class="form-control" name="cfmPassword" equalto="#password" maxlength="200" aria-required="true"><p id="coba"></p>
        </div>
        <?= $form->field($model, 'alamat_user')->textInput(['maxlength' => true])?>
        <?= $form->field($model, 'telpon_user')->textInput(['maxlength' => true])?>
        <div class="row">
            <div class="col-xs-8">
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::a('Regist',  null, ['class'=>'btn btn-primary', 'id'=>'btnSubmit']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

<!-- <?=Yii::$app->homeUrl?>site/index -->
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#btnSubmit').click(function(){
        var userName = 
    });
});
</script>