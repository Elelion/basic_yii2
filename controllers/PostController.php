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
        // if (Yii::$app->request->isAjax) {

        //NOTE: если данные были переданы методом $_POST
        if (Yii::$app->request->post()) {
            // return 'test';
        }

        // NOTE: создаем объект нашей модели
        $model = new TestForm();

        // NOTE: если в модель удалось загрузить данные
        if ($model->load(Yii::$app->request->post())) {
            // debug(Yii::$app->request->post());
            // debug($model);

            // NOTE: если все правила валидации успешно пройдены
            if ($model->validate()) {
                //NOTE: устанавливаем флеш (ключ, значение)
                Yii::$app->session->setFlash('success', 'Flash данные приняты');
            } else {
                Yii::$app->session->setFlash('error', 'Flash ошибка');
            }
        }

        // $this->debug(Yii::$app);

        // NOTE: передаем объект нашей модели compact('model')
        return $this->render('test', compact('model', 'temp'));
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

/*
NOTE:
Флеш сообщения - это сообщения которые записываются в сессию, но не остаются
там, а являются как бы одноразывыми. Т.е. сразу же после того как мы их
запросили они, будут удалены из сессии
*/