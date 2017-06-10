<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker; 
use kartik\file\FileInput; 
use yii\widgets\DetailView;


$this->title = 'View Barang';
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
            <div class="box-body" style="overflow: auto;">
              <?= DetailView::widget([
                  'model' => $model,
                      'attributes' => [
                      'email_user',
                      'nama_user',
                      'telpon_user',
                      'alamat_user',
                      [
                        'attribute'=>'charge_users',
                        'value'=>function($model){
                                  return 'Rp '.number_format($model['charge_user'],0,".",".");
                              },
                      ]

                  ],
              ]) ?>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" id="updateAkun" value="<?=$model['user_id']?>">Update</button>
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
  var id_akun;
  $('#updateAkun').click(function(){
    id_akun = $('#updateAkun').val();
    $.ajax({
        url : "<?= Yii::$app->homeUrl ?>upload/modal-akun",
        data : {
            id_akun : id_akun
            // tp : $("#tipe").val()
        },
        dataType : "html",
        type : "post"
    }).done(function(data){
        $("#hasil").html(data);
        // $("#cetakpdf").removeClass("sdisabled");
    });
  });
  $(document).on('click', 'input[type="checkbox"]', function() {      
        $('input[type="checkbox"]').not(this).prop('checked', false);
        if($('input[name="withPassword"]:checked').val()=='yes'){
          $('#x').removeClass('hidden');
          $('#y').removeClass('hidden');
          // alert($('input[name="withPassword"]:checked').val());
        }else{
          // alert($('input[name="withPassword"]:checked').val());

          $('#x').addClass('hidden');
          $('#y').addClass('hidden');
        }   
        // var withPasswor = $('input[type="checkbox"]').val();
        // alert(this.val());
    });
  $(document).on('click', '#submitGambar', function(){
    var withPasswor = $('input[name="withPassword"]:checked').val();
    // alert(withPasswor);
    var newPasword = $('#confirmPassword').val(); 
    // newPasword = md5(newPasword);
    // alert(newPasword);
    if(withPasswor == 'no'){
      var password = $('#password').val();
    //   // alert(password);
      update(password);
    }else{
      $.ajax({
        url : "<?= Yii::$app->homeUrl ?>upload/encrypt",
        data : {
            newPasword : newPasword,
              // tp : $("#tipe").val()
          },
          dataType : "html",
          type : "post"
      }).done(function(data){
          // $("#hasil").html(data);
          // console.log(data);
          checkPassword(data, password);
          // $("#cetakpdf").removeClass("sdisabled");
      });
    //   if( newPasword == $('#password').val()){
    //       var password = $('#newPasword').val();
    //       // var email_user = $()
    //       // password = 
    //       update(password);
    //   }else{
    //     alert('sorry');
    //   }
    }
  });

  function checkPassword(newPasword, password){
    if( newPasword == $('#password').val()){
          var password = $('#newPasword').val();
          $.ajax({
            url : "<?= Yii::$app->homeUrl ?>upload/encrypt",
            data : {
                newPasword : password,
                  // tp : $("#tipe").val()
              },
              dataType : "html",
              type : "post"
          }).done(function(data){
              // checkPassword(data, password);
              update(data);
          });
          // var email_user = $()
          // password = 
          // alert('masuk sini');
          // update(password);
      }else{
        alert('sorry');
      }
  }

  function update(password){
      var email_user = $('#email_user').val();
      var nama_user = $('#nama_user').val();
      var telpon_user = $('#telpon_user').val();
      var alamat_user = $('#alamat_user').val();

      $.ajax({
        url : "<?= Yii::$app->homeUrl ?>upload/update-akun",
        data : {
            password : password,
            email_user : email_user,
            nama_user : nama_user,
            telpon_user : telpon_user,
            alamat_user : alamat_user,
            id_akun : id_akun,
        },
        dataType : "html",
        type : "post"
    }).done(function(data){
        console.log(data);
        location.reload();
    });
      // aslert(password);
  }
</script>