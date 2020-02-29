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
         * Для того что бы нам обновить какую либо запись в БД, нужно
         * сначала найти ее в БД, присвоив переменной, затем указать новое
         * свойство, а затем просто сохранить.
         *
         * ниже приведенная запись, изменит значение строки в таблице под 3 id
         * в столбце email на 2@2.com
         * */
        //$post = TestForm::findOne(3);
        //$post->email = '2@2.com';
        //$post->save();

        /*
         * NOTE:
         * А для того что бы удалить какую либо запись в БД, нам нужно
         * сначала найти ее в БД, присвоить переменной, а затем вызвать метод
         * удаления у этой переменной, которая соответствует нашей таблице.
         * */
        //$post = TestForm::findOne(3);
        //$post->delete();

        /*
         * NOTE:
         * Если нужно удалить ВСЕ записи из таблици, пишем условие,
         * больше, меньше равно и.т.п.
         * по какому полю будет поиск
         * параметр к которому будет применять условие
         *
         * т.е. что бы написать SQL запрос, типа
         * DELETE FROM `posts` WHERE `id` > '3'
         * мы делаем так...
         * */
        //TestForm::deleteAll(['>', 'id', '3']);

        /*
         * NOTE:
         * А для того что бы удалить все данные из таблици, то нужно просто
         * прописать этот метод, без каких либо параметров.
         *
         * Так что данный метод нужно использовать очень аккуратно, что бы
         * случаенно НЕ лишиться данных
         * */
        TestForm::deleteAll();


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
