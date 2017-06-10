<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'My Yii Application';

$model = $dataProvider->getModels();
// print_r($model);
?>
<div class="row  categoryProduct xsResponse clearfix">
    <?php foreach ($model as $key) { ?>
    
        <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
            <div class="product">
                <a class="add-fav tooltipHere" data-toggle="tooltip"
                   data-original-title="Add to Wishlist" data-placement="left">
                    <i class="glyphicon glyphicon-heart"></i>
                </a>

                <div class="image">
                    <div class="quickview">
                        <button dtype="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" id="quickview" value="<?=$key['id_barang']?>">Quick
                            View </button>
                    </div>
                    <a href="<?=Yii::$app->homeUrl?>site/product-details"><img src="<?= Yii::$app->db->createCommand('SELECT DISTINCT tabel_gambar_barang.path_gambar FROM tabel_gambar_barang WHERE id_barang = '.$key['id_barang'].' LIMIT 1')->queryScalar();?>" alt="img" class="img-responsive"></a>

                    <!-- <div class="promotion"><span class="new-product"> NEW</span> <span
                            class="discount">15% OFF</span></div> -->
                </div>
                <div class="description">
                    <h4><a href="<?=Yii::$app->homeUrl?>site/product-details"><?= strtoupper($key['nama_barang'])?></a></h4>

                    <div class="grid-description">
                        <p><?= strtoupper($key['nama_penulis'])?></p>
                        <p><?= strtoupper($key['penerbit_buku'])?></p>
                    </div>
                    <div class="list-description">
                        <p><?= strtoupper($key['sinopsis'])?></p>
                    </div>
                    <span class="size">Stok yang Tersidia <?= strtoupper($key['quantity'])?></span></div>
                <div class="price"><span>Rp <?= number_format($key['harga'],0,".",".")?></span></div>
                <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                        class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a>
                </div>
            </div>
        </div>
        <?php }?>
        <!--/.item-->
        
        <!--/.item-->
</div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var id_barang ;
    $('#quickview').click(function(){
        id_barang = $('#quickview').val();
        alert(id_barang);
        // $.ajax({
        //     url : "<?= Yii::$app->homeUrl ?>site/quick-view",
        //     data : {
        //         id_barang : id_barang
        //         // tp : $("#tipe").val()
        //     },
        //     dataType : "html",
        //     type : "post"
        // }).done(function(data){
        //     $("#hasil").html(data);
        //     // $("#cetakpdf").removeClass("sdisabled");
        // });
    });
</script>