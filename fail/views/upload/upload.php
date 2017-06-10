<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker; 
use kartik\file\FileInput; 
use kartik\select2\Select2;    
use yii\helpers\ArrayHelper;
use app\models\TabelCategori;

$this->title = 'Create Barang';
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;  

$barang = ArrayHelper::map(TabelCategori::find()->all(), 'id_categori', 'categori_barang');
?>
<div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Upload Gambar</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
       <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="box-body">
                <?= $form->field($modelBarang, 'nama_barang')->textInput() ?>
                <?= $form->field($modelBarang, 'nama_penulis')->textInput() ?>
                <?= $form->field($modelBarang, 'penerbit_buku')->textInput() ?>
                <?= $form->field($modelBarang, 'harga')->textInput() ?>
                <?= $form->field($modelBarang, 'quantity')->textInput(['type'=>'number']) ?>
                <dic class="row">
                    <div class="col-md-7">
                        <?= $form->field($modelBukuDetail, 'id_categori',['options'=>['id'=>'form1']])->widget(Select2::classname(), [
                            'data' => $barang,
                            'language' => 'de',
                            'options' => ['placeholder' => 'Pilih Barang'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'multiple' => true
                            ],
                            // 'id'=>'item'
                        ]);?>
                    </div>
                        <label>Tamabah Category</label>
                    <div class="col-md-5" >
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" id="createCategory">Tambah</button>
                    </div>
                </dic>
                <?= $form->field($modelBarang, 'tanggal_upload')->widget(
                        DatePicker::className(), [
                        'name' => 'check_issue_date', 
                        'options' => ['placeholder' => '...'],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-d',
                            'todayHighlight' => true
                        ]
                        ])->label('Tanggal Pengiriman');?>
                <?= $form->field($modelBarang, 'sinopsis')->textArea() ?>
                <div id="form">
                           
                </div> 
                 <a href="#form" id="addImage"> Tambah Gambar</a>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
            <button>Submit</button>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Category</h4>
        </div>
        <div class="modal-body" id="hasil">
        </div>
        
      </div>
      
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
     $('#addImage').click(function(){
        var form = '<div class="form-group field-uploadform-imagefiles"><label class="control-label" for="uploadform-imagefiles">Image Files</label><input type="hidden" name="UploadForm[imageFiles][]" value=""><input type="file" id="uploadform-imagefiles" name="UploadForm[imageFiles][]" multiple="" accept="image/*"><div class="help-block"></div></div>';
        $('#form').append(form);
    });

    $('#createCategory').click(function(){
        $.ajax({
            url : "<?= Yii::$app->homeUrl ?>upload/modal-category",
            data : {
            },
            dataType : "html",
            type : "post"
        }).done(function(data){
            $("#hasil").html(data);

            // $("#cetakpdf").removeClass("sdisabled");
        });
    });

    $(document).on('click', '#submitCategory', function(){
        var categori_barang = $('#category_barang').val();
        if(categori_barang == ''){
            alert('Isi Form !!!');
        }else{
            $.ajax({
                url : "<?= Yii::$app->homeUrl ?>upload/simpan-category",
                data : {
                    categori_barang : categori_barang,
                },
                dataType : "html",
                type : "post"
            }).done(function(data){
                location.reload();
                // $("#tabelbukudetail-id_categori").html(data);
                // $('#myModal').addClass('hide');
                // $('.modal-backdrop').addClass('hide');
                // console.log(data);
                // $("#cetakpdf").removeClass("sdisabled");
            });
        }
    });
</script>