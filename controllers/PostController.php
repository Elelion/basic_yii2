<?php
/*
NOTE:
Создадим контроллер, который будет наследоваться от нашего нового контроллера
AppController
 * */

namespace app\controllers;

// NOTE: use yii\web\Controller; - не нужно т.к. контроллеры находятся рядом
use app\models\Category;
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

        // NOTE: ленивая загрузка
        // SELECT * FROM Category
        //$cats = Category::find()->all();

        // SELECT * FROM Category ORDER BY - обратная сортировка
        //$cats = Category::find()->orderBy(['id' => SORT_DESC])->all();

        // Вытаскивает данные из модели(таблици) в виде массива
        //$cats = Category::find()->asArray()->all();
        //debug($cats);
        //die();

        //$cats = Category::find()->asArray()->where('parent = 691')->all();
        //debug($cats);
        //die();

        // SELECT * FROM Category WHERE parent = 691
        //$cats = Category::find()->where(['parent' => 691])->all();

        // SELECT * FROM `categories` WHERE `title` LIKE '%pp%'
        //$cats = Category::find()->where(['like', 'title', 'pp'])->all();

        // SELECT * FROM `categories` WHERE `id` <= 3
        //$cats = Category::find()->where(['<=', 'id', 3])->all();

        // SELECT * FROM `categories` WHERE parent = 691 LIMIT 1
        //$cats = Category::find()->where('parent = 691')->limit(1)->all();

        /*
         * NOTE:
         * SELECT * FROM `categories` WHERE parent = 691
         * но данный метод вернет лишь 1ну запись, из за ->one();
         * */
        //$cats = Category::find()->where('parent = 691')->one();
        //echo $cats->title;
        //die();

        // SELECT COUNT(*) FROM `categories` WHERE parent = 691
        //$cats = Category::find()->where('parent = 691')->count();
        //echo $cats;
        //die();

        /*
         * NOTE:
         * Возвращает объект, из которого НЕльзя сделать обхект т.е. если мы
         * допишем ->AsArray(), то получим ошибку, так же как и если мы
         * допишем ->Limit(1).
         * */
        //$cats = Category::findOne(['parent' => 691]);
        //debug($cats); die();

        /*
         * NOTE:
         * SHOW FULL COLUMNS FROM `categories`
         * SELECT * FROM `categories` WHERE `parent`=691
         * */
        //$cats = Category::findAll(['parent' => 691]);

        /*
         * NOTE:
         * Если возникнет надобность использовать более сложный SQL запрос,
         * то мы можем написать его на ванильном SQL и передать
         * его в ActiveRecord
         * */
        //$query = "SELECT * FROM categories WHERE title LIKE '%pp%'";
        //$cats = Category::findBySql($query)->all();

        /*
         * NOTE:
         * делаем парамитизированный запрос, как правило такие запросы нужны
         * для того, что бы предотвратить различные SQL инхекции и.т.п.
         * как правило подобные инхекции вводятся в поля, которые заполняет
         * пользователь
         * */
        //$query = "SELECT * FROM categories WHERE title LIKE :search";
        //$cats = Category::findBySql($query, [':search' => '%pp%'])->all();

        // NOTE: делаем обычный запрос, для демонстрации ленивой загрузки
        //$cats = Category::findOne(3);

        // NOTE: запрос для отложенной загрузки, которая жадно все забираем из БД
        //$cats = Category::find()->where('id = 3')->all();

        // NOTE: а вот жадная загрузка, т.е. мы объеденяем запрос с products
        //$cats = Category::find()->with('products')->where('id = 3')->all();

        /*
         * NOTE:
         * Для того что бы наш запрос ленивой загрузки
         * $cats = Category::find()->all();
         * стал "жадной загрузкой" нам нужно всего лишь добавить искомый запрос
         * ->with('products') , тем самым мы уменьшим кол-во запросов к БД
         * с 17 до 4
         * */
        $cats = Category::find()->with('products')->all();

        return $this->render('show', compact('cats'));
    }
}

/*
NOTE:
Флеш сообщения - это сообщения которые записываются в сессию, но не остаются
там, а являются как бы одноразывыми. Т.е. сразу же после того как мы их
запросили они, будут удалены из сессии
*/

/*
NOTE:
Когда использовать ленивую загрузку, а когда жадную?
Если у нас НЕ много объектов (2 - 3) то тогда мы должны использовать отложенную
загрузку (ленивую).
Если объектов много и много связей, то нужно использовать жадную загрузку.
*/