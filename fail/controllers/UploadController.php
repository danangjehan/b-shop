<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TabelBarang;
use app\models\TabelBukuDetail;
use app\models\TabelGambarBarang;
use app\models\TabelCategori;
use yii\data\ActiveDataProvider;
use app\models\UploadForm;
use app\models\User;

use yii\web\UploadedFile;

class UploadController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout='upload-layout';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'main-login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionProductDetails()
    {
        // echo "string";
        return $this->render('jancok');
    }
    
    public function actionUpload()
    {
        $session = Yii::$app->session;
        $session->open();

        $modelBarang = new TabelBarang();
        $userName = $session['session.user']['nama_user'];
        $basePath =  'upload_image/'.$userName;
        $model = new UploadForm();
        $modelBukuDetail = new TabelBukuDetail();
        if (Yii::$app->request->isPost && $modelBarang->load(Yii::$app->request->post()) && $modelBukuDetail->load(Yii::$app->request->post())) {
            // print_r($modelBukuDetail);

            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            $modelBarang['id_user_upload']= $session['session.user']['user_id'];
            echo $modelBarang->save();
            // // echo $modelBarang['tanggal_upload'];
            if(!file_exists($basePath)){
                mkdir($basePath,  0777, true);
            }
            foreach ($modelBukuDetail['id_categori'] as $key) {
                // echo "$key['id_categori'][0]";
                // print_r($key);
                $modelBukuDetail2 = new TabelBukuDetail();
                $modelBukuDetail2['id_buku']=$modelBarang['id_barang'];
                $modelBukuDetail2['id_categori']=$key;
                print_r($modelBukuDetail2);
                echo "<br>";
                $modelBukuDetail2->save();
            }
            if ($model->validate()) { 
                foreach ($model->imageFiles as $file) {
                    $modelGambar = new TabelGambarBarang();
                    $modelGambar['path_gambar'] = $basePath.'/'. $file->baseName . '.' . $file->extension;
                    $modelGambar['id_barang'] = $modelBarang['id_barang'];
                    echo $modelGambar->save();
                    $file->saveAs('upload_image/'.$userName .'/'. $file->baseName . '.' . $file->extension);
                }
            }
            // echo "string";
            return $this->redirect(['view-barang','id'=>$modelBarang['id_barang']]);
        }else{
            return $this->render('upload',['model' => $model, 'modelBarang'=>$modelBarang, 'modelBukuDetail'=>$modelBukuDetail]);

        }
    }

    public function actionListUpload()
    {
        $session = Yii::$app->session;
        $session->open();

        $connection = Yii::$app->db;
        $query = TabelBarang::find();
        $limit = $query->count();
        // $query = TabelBarang::find();
        $limit = $query->count();
        $queryBulan = $connection->createCommand('SELECT DISTINCT extract(month from tabel_barang.tanggal_upload) as bulan
            FROM tabel_barang');
        $queryTahun = $connection->createCommand('SELECT DISTINCT extract(year from tabel_barang.tanggal_upload) as tahun
            FROM tabel_barang');

        $dataBulan = $queryBulan->queryAll();
        $dataTahun = $queryTahun->queryAll();

        $dataProvider = new ActiveDataProvider([
            'query' => TabelBarang::find()->where(['id_user_upload'=>$session['session.user']['user_id']]),
            'pagination' => ['PageSize' => $limit],
        ]);

        return $this->render('list_upload', [
            'dataBulan' => $dataBulan,
            'dataTahun' => $dataTahun,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewBarang($id)
    {
        $query = TabelGambarBarang::find()->where(['id_barang' => $id]);
        $limit = $query->count();

        $dataProvider = new ActiveDataProvider([
            'query' => TabelGambarBarang::find()->where(['id_barang' => $id]),
            'pagination' => ['PageSize' => $limit],
        ]);
        // $dataProvider = $dataProvider->getModels();
        // print_r($dataProvider);
        return $this->render('view_barang',[
            'model' => TabelBarang::findOne($id),
            'dataProvider'=>$dataProvider,
        ]);
    }

    public function actionModalBarang()
    {
        extract($_POST);
        $model = TabelBarang::findOne($idBarang);
       // print_r($model);
        echo '<form id="w0" method="post" enctype="multipart/form-data">
<input type="hidden" name="_csrf" value="N2x2bzhMYUNyKEIrDBsscwAKHyt6AisiYCYuKnR8ES5OGzM8WxNVcQ==">           
<div class="box-body">

<div class="form-group field-tabelbarang-nama_barang required">
<label class="control-label" for="tabelbarang-nama_barang">Nama Barang</label>
<input type="text" id="tabelbarang-nama_barang" class="form-control" name="TabelBarang[nama_barang]" aria-required="true" value='.$model['nama_barang'].'>
</div>

<div class="form-group field-tabelbarang-nama_penulis required">
<label class="control-label" for="tabelbarang-nama_penulis">Nama Penulis</label>
<input type="text" id="tabelbarang-nama_penulis" class="form-control" name="TabelBarang[nama_penulis]" aria-required="true" value='.$model['nama_penulis'].'>
</div>

<div class="form-group field-tabelbarang-penerbit_buku required">
<label class="control-label" for="tabelbarang-penerbit_buku">Penerbit Buku</label>
<input type="text" id="tabelbarang-penerbit_buku" class="form-control" name="TabelBarang[penerbit_buku]" aria-required="true" value='.$model['penerbit_buku'].'>
</div>                

<div class="form-group field-tabelbarang-harga required">
<label class="control-label" for="tabelbarang-harga">Harga</label>
<input type="number" id="tabelbarang-harga" class="form-control" name="TabelBarang[harga]" aria-required="true" value='.$model['harga'].'>
</div>

<div class="form-group field-tabelbarang-quantity required">
<label class="control-label" for="tabelbarang-quantity">Quantity</label>
<input type="number" id="tabelbarang-quantity" class="form-control" name="TabelBarang[quantity]" aria-required="true" value='.$model['quantity'].'>
</div>

<div class="form-group field-tabelbarang-tanggal_upload required">
<label class="control-label" for="tabelbarang-tanggal_upload">Tanggal Pengiriman</label>
<input type="date" id="tabelbarang-tanggal_upload" class="form-control" name="TabelBarang[quantity]" aria-required="true" value='.$model['tanggal_upload'].'>
</div>';

echo '<div class="form-group field-tabelbarang-sinopsis">
<label class="control-label" for="tabelbarang-sinopsis">Sinopsis</label>
<textarea id="tabelbarang-sinopsis" class="form-control" name="TabelBarang[sinopsis]" value='.$model['sinopsis'].'></textarea>
</div>
<a href="#" id="submitBarang">Simpan</a>
</div>
</form>';
       
    }

    public function actionUpdateBarang()
    {
        extract($_POST);
        // echo "string";
       
    // echo ;
       echo Yii::$app->db->createCommand('UPDATE tabel_barang SET nama_barang = \''.$nama_barang.'\', nama_penulis=\''.$nama_penulis.'\', penerbit_buku=\''.$penerbit_buku.'\', harga = \''.$harga.'\', quantity='.$quantity.' , tanggal_upload= \''.$tanggal_upload.'\', sinopsis=\''.$sinopsis.'\' WHERE id_barang='.$idBarang)->execute();
    }

    public function actionDetailAkun()
    {
        $session = Yii::$app->session;
        $session->open();

        $model = User::findOne($session['session.user']['user_id']);
        // print_r($model);
        return $this->render('view_akun',['model'=>$model]);
    }

    public function actionModalAkun()
    {
        extract($_POST);
        // echo "$id_akun";
        $model = User::findOne($id_akun);
        // print_r($model);

       echo '<form id="w0" method="post" enctype="multipart/form-data">        
<div class="box-body">

<div class="form-group ">
<label class="control-label" >Email User</label>
<input type="text" id="email_user" class="form-control" name="TabelBarang[nama_barang]" aria-required="true" value='.$model['email_user'].'>
</div>

<div class="form-group ">
<label class="control-label" >Nama User</label>
<input type="text" id="nama_user" disabled="disabled" class="form-control" name="TabelBarang[nama_penulis]" aria-required="true" value='.$model['nama_user'].'>
</div>

<div class="form-group ">
<label class="control-label" >Telepon User</label>
<input type="text" id="telpon_user" class="form-control" name="TabelBarang[penerbit_buku]" aria-required="true" value='.$model['telpon_user'].'>
</div>                

<div class="form-group ">
<label class="control-label" >Alamat User</label>
<input type="text" id="alamat_user" class="form-control" name="TabelBarang[harga]" aria-required="true" value='.$model['alamat_user'].'>
</div>

<div class="form-group ">
<input type="hidden" id="password" class="form-control" name="TabelBarang[harga]" aria-required="true" value='.$model['password'].'>
</div>

<div class="form-group ">
<label class="control-label" >Ubah Password</label><br/>
<input type="checkbox" name="withPassword" value="no" checked> Tidak<br>
<input type="checkbox" name="withPassword" value="yes"> Ya<br>
</div>

<div id="x" class="form-group hidden">
<label class="control-label" >Masukan Password Lama</label>
<input type="password" id="confirmPassword" class="form-control " name="TabelBarang[harga]" aria-required="true" value='.$model['alamat_user'].'>
</div>

<div id="y" class="form-group hidden">
<label class="control-label" >Password Baru</label>
<input type="password" id="newPasword" class="form-control " name="TabelBarang[harga]" aria-required="true" value='.$model['alamat_user'].'>
</div>

<a href="#" class="btn btn-info" id="submitGambar">Simpan</a></div>
</form>';
    }

    public function actionUpdateAkun()
    {
        extract($_POST);
        // echo "string";
        // echo ; 
        echo Yii::$app->db->createCommand('UPDATE tabel_user SET email_user=\''.$email_user.'\', nama_user=\''.$nama_user.'\', telpon_user=\''.$telpon_user.'\', alamat_user=\''.$alamat_user.'\', password=\''.$password.'\' WHERE user_id='.$id_akun)->execute();
    }


    public function actionEncrypt()
    {
        extract($_POST);
        echo md5($newPasword);
    }

    public function actionModalCategory()
    {
        // extract($_POST);
        echo '<form id="w0" method="post" ">        
            <div class="box-body">

            <div class="form-group ">
            <label class="control-label" >Nama Category</label>
            <input type="text" id="category_barang" class="form-control" name="TabelBarang[nama_barang]" aria-required="true" value="">
            </div>
            <a href="#" class="btn btn-info" id="submitCategory">Simpan</a></div>
            </div>
            </form>';
    }

    public function actionSimpanCategory()
    {
        extract($_POST);
        // echo "$categori_barang";    
        $model = new TabelCategori();
        $model['categori_barang']=$categori_barang;
        $model->save(); 

        $modelCategori = TabelCategori::find()->all();
        print_r($modelCategori);
        foreach ($modelCategori as $key) {
            echo '<option value='.$key['id_categori'].'>'.$key['categori_barang'].'</option>';
        }
    }

    public function actionUploadFile()
    {
        
        $fileName = 'file';
        $uploadPath = 'upload_image';

        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data
            //print_r($file);

            if ($file->saveAs($uploadPath . '/' . $file->name)) {
                //Now save file data to database

                echo \yii\helpers\Json::encode($file);
            }
        }

        return false;
    }

    public function actionTest()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            print_r($model);
            // if ($model->validate()) { 
            //     foreach ($model->imageFiles as $file) {
            //         echo "string";
            //         // $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            //     }
            // }
        }
        else
        return $this->render('test', ['model' => $model]);
    }
}
// product-details