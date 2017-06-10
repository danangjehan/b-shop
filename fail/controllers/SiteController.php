<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\User2;
use app\models\TabelBarang;
use yii\data\ActiveDataProvider;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout='main';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index'],
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
        // echo "string";
        $query = TabelBarang::find();
        $limit = $query->count();

        $dataProvider = new ActiveDataProvider([
            'query' => TabelBarang::find(),
            'pagination' => ['PageSize' => $limit],
        ]);
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }

    // public function actionListFilter($cat)
    // {
    //     $countEntry = Buku::find()->count();
    //     $dataProvider = new ActiveDataProvider([
    //         'query'=>Buku::find()->where(['category'=>$cat]),
    //         'pagination'=>['pageSize'=>$countEntry],
    //     ]);
    //     return $this->render('index',['dataProvider'=>$dataProvider]);   
    // }
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
        $session = Yii::$app->session;
        $session->open();

        if(!$session['session.user']['login']){
            $model = new LoginForm();
            $postData = Yii::$app->request->post();
            if ($model->load($postData) && $model->login()) {
                echo "string";
                $userData = User::find()->where(["user_id"=>Yii::$app->user->getId()])->asArray()->all();

                print_r($userData);
                $session['session.user'] = array(
                        "login"=>true,
                        "user_id"=>$userData[0]['user_id'],
                        "nama_user"=>$userData[0]['nama_user'],
                        "email_user"=>$userData[0]['email_user'],
                        "telpon_user"=>$userData[0]['telpon_user'],
                        "alamat_user"=>$userData[0]['alamat_user'],
                    );
                return $this->redirect(Yii::$app->request->referrer);
            } else {
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        }else{
            return $this->goBack();
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('../upload/index');
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

    public function actionSignup()
    {
        extract($_POST);
        // echo "$username, $password, $alamat, $noTlp, $email";
        $model = new User();
        // $model['nama_user']=$username;
        $model['nama_user'] = $username;
        $model['password'] = md5($password);
        $model['alamat_user'] = $alamat;
        $model['telpon_user'] = $noTlp;
        $model['email_user'] = $email;
        // print_r($model);
        if($model->save()){
            return $this->redirect(['login']);
        }else{
            Yii::$app->session->setFlash('warning', 'Quantiti Melebihi yang di pesan');
            return $this->redirect(['login']);
        }
    }    
}
// product-details