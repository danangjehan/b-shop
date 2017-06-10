<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker; 
use kartik\file\FileInput; 

$this->title = 'List Barang';
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;  
?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <div class="col-md-5 col-md-offset-0" >
                      <div class="col-md-3">
                        <label>Pilih Bulan</label>
                        <select name=month value='' style="width: 100%" id="bulan">
                            <option value=null> Pilih Bulan</option>
                            <?php 
                            foreach ($dataBulan as $key => $value) {
                             echo "<option value='".$value['bulan']."'>".$value['bulan']."</option>" ;
                      
                            }?>
                        </select>
                      </div>
                      <div class="col-md-3">
                        <label>Pilih Tahun</label>
                        <select name=year value='' style="width: 100%" id="tahun">
                            <option value=null> Pilih Tahun</option>
                            <?php 
                            foreach ($dataTahun as $key => $value) {
                             echo "<option value='".$value['tahun']."'>".$value['tahun']."</option>" ;
                            }?>
                        </select>
                      </div>
                      <a href="#" id="selectTgl" class="btn btn-xs btn-success" style="margin-top: 5%; margin-bottom: 2%">SELECT</a>
                  </div>
                </div>
                <hr>
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Buku</th>
                  <th>Tanggal Upload</th>
                  <th>Quantity</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php $model = $dataProvider->getModels();
                $i=0;
                foreach ($model as $key) { 
                  $i++;?>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$key['nama_barang']?></td>
                  <td><?=$key['tanggal_upload']?></td>
                  <td><?=$key['quantity']?></td>
                  <td>
                    <a href="<?= Yii::$app->urlManager->createUrl(['upload/view-barang',"id"=>$key['id_barang']])?>" class="btn btn-primary btn-sm glyphicon glyphicon-eye-open"></a>
                  </td>

                </tr>
                <?php }?>
                </tbody>
                
              </table>
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
