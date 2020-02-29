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

        /*
         * NOTE:
         * создаем объект ActiveRecord нашей модели
         * но если мы создаем объект модели через new, то данный объект будет
         * производить операцию запроса insert
         * А если мы получаем объект с помощью запроса, то тогда будет
         * производится операция update
         * */
        $model = new TestForm();

        /*
         * NOTE:
         * записываем данные в нашу БД в 'ручном' режиме
         * Данные которые мы записываем в таблицу, по умолчанию будут так же
         * подставленны в виде значений в наши поля
         *
         * если закомментировать нижние две строки, то в БД не чего не
         * добавиться, т.к. не пройдет валидация полей
         * */
        //$model->name = 'Автор';
        //$model->email = 'mail@mail.com';
        //$model->text = 'текст';

        /*
         * NOTE:
         * По умолчанию запускает метод validate, т.е. нашу валидацию из
         * class TestForm extends ActiveRecord -> public function rules().
         * Если нужно отключить валидацию, то достаточно просто передать false
         * $model->save(false);
         * */
        //$model->save();

        /*
         * NOTE:
         * записываем данные в нашу БД в 'автоматическом' режиме
         * т.е. данные записываются из формы, в которую пользователь что то ввел
         * */
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

            // NOTE: убераем уведомление валидации, что бы не затирало верхнюю
            //if ($model->validate()) {
            //    Yii::$app->session->setFlash(
            //        'success',
            //        'Flash данные приняты'
            //    );
            //} else {
            //    Yii::$app->session->setFlash(
            //        'error',
            //        'Flash ошибка'
            //    );
            //}
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
