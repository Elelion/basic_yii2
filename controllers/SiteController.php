<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
     * {@inheritdoc}
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
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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

    /**/

    /*
     * NOTE: для вывода, нужно перейти на .../web/?r=site/hello
     * где /hello - это имя нашего действия.
     * т.е. actionHello - действие/Hello
     * а ?r=site - это имя нашего контроллера SiteController
     * */
    public function actionHello()
    {
        return 'Hello world';
    }

    /**/

    /*
     * NOTE: /web/?r=site/hello2
     * НО будет ошибка, т.к. у нас нету файла view для вывода
     * идем в папку /views/site и создаем наше представление hello2.php
     * Имя действия должно совпадать с именем представления.
     */
    public function actionHello2()
    {
        return $this->render('hello2');
    }
}

/*
NOTE: Controller
Контроллер - именно контроллер обрабатывает все наши страници сайта, т.е. все
действия которые происходят на сайте, обрабатываются контроллерм.
Пример: Допустим на сайте есть какая то кнопка, при клике по которой, должно
произойти какое либо действие, после которого будет результат. Именно контроллер
отвечает за обработку событий при нажатии на эту кнопку


 * */