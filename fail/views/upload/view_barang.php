<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker; 
use kartik\file\FileInput; 
use yii\widgets\DetailView;


$this->title = 'View Barang';
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'List Barang', 'url' => ['list-upload']];
$this->params['breadcrumbs'][] = $this->title;  
$dataCategory = Yii::$app->db->createCommand('SELECT tabel_categori.categori_barang FROM tabel_categori JOIN tabel_buku_detail ON tabel_buku_detail.id_categori = tabel_categori.id_categori WHERE tabel_buku_detail.id_buku='.$model['id_barang'])->queryAll();
// print_r($category);
$category = '';
foreach ($dataCategory as $key) {
  $category .= $key['categori_barang'];
  $category .= ' ,';
}
echo "$category";
?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: auto;">
              <?= DetailView::widget([
                  'model' => $model,
                      'attributes' => [
                      //'id_so',
                      'nama_barang',
                      'nama_penulis',
                      'penerbit_buku',
                      'tanggal_upload',
                      'quantity',
                      'sinopsis',
                      [
                        'attribute'=>'id_barang',
                        'value'=>$category,
                        'label'=> 'Category'
                      ],
                      [
                        'attribute'=>'harga',
                        'value'=>function($model){
                                  return 'Rp '.number_format($model['harga'],0,".",".");
                              },
                      ]

                  ],
              ]) ?>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" id="updateBarang" value="<?=$model['id_barang']?>">Update</button>
              <table id="example1" class="table" style="overflow: auto;">
                <tr>
                  <?php
                    $models = $dataProvider->getModels();
                    foreach ($models as $key) {
                      $path = Yii::$app->homeUrl.''.$key['path_gambar'];
                      ?>
                      <td align="center"><img src="<?=$path?>" width="120px"><br>
                   </td>
                   <?php }?>
                </tr>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box 
          -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>


      <!-- /.row -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update</h4>
        </div>
        <div class="modal-body" id="hasil">
        </div>
        
      </div>
      
    </div>
  </div>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
  var idBarang ;
  var idGambar;
  $('#updateBarang').click(function(){
    idBarang = $('#updateBarang').val();
    $.ajax({
            url : "<?= Yii::$app->homeUrl ?>upload/modal-barang",
            data : {
                idBarang : idBarang
                // tp : $("#tipe").val()
            },
            dataType : "html",
            type : "post"
        }).done(function(data){
            $("#hasil").html(data);
            // $("#cetakpdf").removeClass("sdisabled");
        });
    // alert($('#updateBarang').val());
  });

  $(document).on('click', '#submitBarang', function(){
    var nama_barang = $('#tabelbarang-nama_barang').val();
    var nama_penulis = $('#tabelbarang-nama_penulis').val();
    var penerbit_buku = $('#tabelbarang-penerbit_buku').val();
    var harga = $('#tabelbarang-harga').val();
    var quantity = $('#tabelbarang-quantity').val();
    var tanggal_upload = $('#tabelbarang-tanggal_upload').val();
    var sinopsis = $('#tabelbarang-sinopsis').val();

    $.ajax({
        url : "<?= Yii::$app->homeUrl ?>upload/update-barang",
        data : {
            nama_barang : nama_barang,
            nama_penulis : nama_penulis,
            penerbit_buku : penerbit_buku,
            harga : harga,
            quantity : quantity,
            tanggal_upload : tanggal_upload,
            sinopsis : sinopsis,
            idBarang : idBarang,
            // tp : $("#tipe").val()
        },
        dataType : "html",
        type : "post"
    }).done(function(data){
        console.log(data);
        location.reload();
    });
  });

  $('#updateGambar').click(function(){
    idGambar = $('#updateGambar').val();
    // console.log(idGambar);
    $.ajax({
            url : "<?= Yii::$app->homeUrl ?>upload/modal-gambar",
            data : {
                idGambar : idGambar
                // tp : $("#tipe").val()
            },
            dataType : "html",
            type : "post"
        }).done(function(data){
            $("#hasil").html(data);
            // $("#cetakpdf").removeClass("sdisabled");
        });
  });


</script>