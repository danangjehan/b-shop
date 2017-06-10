<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

	<div id="form">
                    
	</div> 
     <a href="#" id="addImage"> Tambah Gambar</a>
    <button>Submit</button>

<?php ActiveForm::end() ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    // $('.input').on('change',function(){
    //     // alert('asu');
    // });
    $('#addImage').click(function(){
        var form = '<div class="form-group field-uploadform-imagefiles"><label class="control-label" for="uploadform-imagefiles">Image Files</label><input type="hidden" name="UploadForm[imageFiles][]" value=""><input type="file" id="uploadform-imagefiles" name="UploadForm[imageFiles][]" multiple="" accept="image/*"><div class="help-block"></div></div>';
        $('#form').append(form);
    });
</script>