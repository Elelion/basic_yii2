<?php
/*
NOTE:
Создадим контроллер, который будет наследоваться от нашего нового контроллера
AppController
 * */

namespace app\controllers;

use app\models\Category;
use phpDocumentor\Reflection\Types\Parent_;
use Yii;

use app\models\TestForm;
use yii\db\ActiveRecord;

class PostController extends AppController
{
    // FIXME: задаем шаблон ТОЛЬКО для текущего контроллера и для всех его методов
     public $layout = 'basic';

     public function beforeAction($action)
     {
         if ($action->id == 'show') {
             $this->enableCsrfValidation = false;
         }

         return parent::beforeAction($action);
     }

    // NOTE: обращаемся по такому адресу: .../web/?r=post/test
    public function actionIndex()
    {
        if (Yii::$app->request->post()) {
            // return 'test';
        }

        //$post = TestForm::findOne(3);
        //$post->email = '2@2.com';
        //$post->save();

        //$post = TestForm::findOne(3);
        //$post->delete();

        //TestForm::deleteAll(['>', 'id', '3']);

        //TestForm::deleteAll();


        $model = new TestForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash(
                    'success',
                    'Flash данные сохранены'
                );
            } else {
                Yii::$app->session->setFlash(
                    'error',
                    'Flash ошибка сохранения данных'
                );
            }
        }

        return $this->render('test', compact('model', 'temp'));
    }

    // NOTE: обращаемся по такому адресу: .../web/?r=my/blog-post
    public function actionBlogPost()
    {
        return 'Blog Post';
    }

    public function actionShow()
    {
        $this->view->title = 'Одна статья';

        $this->view->registerMetaTag([
            'name' => 'keywords', 'content' => 'ключевики...'
        ]);
        $this->view->registerMetaTag([
            'name' => 'description', 'content' => 'описание страници...',
        ]);

        $cats = Category::find()->with('products')->all();

        return $this->render('show', compact('cats'));
    }
}
