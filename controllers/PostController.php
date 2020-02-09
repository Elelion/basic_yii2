<?php
/*
NOTE:
Создадим контроллер, который будет наследоваться от нашего нового контроллера
AppController
 * */

namespace app\controllers;

// NOTE: use yii\web\Controller; - не нужно т.к. контроллеры находятся рядом
use phpDocumentor\Reflection\Types\Parent_;
use Yii;

// NOTE: подключаем нашу модель
use app\models\TestForm;

class PostController extends AppController
{
    // FIXME: задаем шаблон ТОЛЬКО для текущего контроллера и для всех его методов
     public $layout = 'basic';

     /*
      * NOTE:
      * beforeAction - относиться к методам фильтрам, которые выполняются до или
      * после того, как интерплитатор дойдет до действия (action),
      */
     public function beforeAction($action)
     {
         // debug($action);

         // NOTE: если action контроллера == index, то...
         if ($action->id == 'show') {
             $this->enableCsrfValidation = false;
         }

         return parent::beforeAction($action);
     }

    // NOTE: обращаемся по такому адресу: .../web/?r=post/test
    public function actionIndex()
    {
        // NOTE: если, был передан ajax запрос, то...
        if (Yii::$app->request->isAjax) {
            return 'test';
        }

        // NOTE: создаем объект нашей модели
        $model = new TestForm();

        $names = [
            'Ivanov',
            'Petrov',
            'Sidorov'
        ];

//        $this->debug(Yii::$app);

        // NOTE: передаем объект нашей модели compact('model')
        return $this->render('test', compact('model'));
    }

    // NOTE: создаем action где более 1го слова в названии
    // NOTE: обращаемся по такому адресу: .../web/?r=my/blog-post
    public function actionBlogPost()
    {
        return 'Blog Post';
    }

    // NOTE: будет выводить одну выбранную статью
    public function actionShow()
    {
        // NOTE: задать шаблон ТОЛЬО для текущего метода
        // $this->layout = 'basic';

        // NOTE: задаем метатеги для view
        $this->view->title = 'Одна статья';

        /*
         * NOTE:
         * для того что бы сформировать метатеги используется (keyword, desc,
         * title и.т.п.) используется специальный метод registerMetaTag()
         * объекта view. В самом же view для вывода метатегов не чего
         * прописывать не нужно
         * */
        $this->view->registerMetaTag([
            'name' => 'keywords', 'content' => 'ключевики...'
        ]);
        $this->view->registerMetaTag([
            'name' => 'description', 'content' => 'описание страници...',
        ]);

        return $this->render('show');
    }
}