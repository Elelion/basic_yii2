<?php

// TODO: создаем MyController и обращаемся к нему .../web/?r=my/index

// NOTE: обязательно должно быть пространство имен
namespace app\controllers;

// NOTE: обязательно нужно для наследования из базового Controller
use yii\web\Controller;

// NOTE: обязательно должны наследовать от базового Controller
class MyController extends Controller
{
    /*
     * NOTE:
     * что бы получить данные из URL($_GET), например некий
     * .../web/?r=my/index&id=test нам нужно задать параметр в actionIndex($id)
     * в нашем контроллере, т.к. именно контроллер должен обрабатывать
     * полученные или передаваемые данные. Значение по умполчанию нужно для того
     * что бы при отстуствующем параметре в url не вылетала ошибка параметра.
     * Т.е. если значения нет, у нас присваивается null и все ок'ей
     */
    public function actionIndex($id = null)
    {
        // NOTE: вид тут -> views/my/index.php , и рендерим его: render('index');

        $hi = 'hello world';
        $hello = 'HeLlO wOrLd';
        $names = [
            'Ivanov',
            'Petrov',
            'Sidorov'
        ];

        // NOTE: присваиваем проверку для нашего $id из url
        if (empty($id)) {
            $id = 'default test';
        }

        /*
         NOTE:
         передаем в качестве параметра нашу переменную
         первый параметр - ключ, по которой будет доступна наша переменная
         второй параметр - значение переменной, т.е. наша переменная
         тем самым переменная hello будет доступна в нашем шаблоне
         */

        // NOTE: классический вариант передачи во view
        /*
        return $this->render('index', [
            'hello' => $hi,
            'names' =>  $names
        ]);
        */

        /*
         * NOTE:
         * compact - равносильно предыдущему варианту, т.е. 'hello' будет
         * передано как 'hello' => $hello и.т.д.
         * */

        // NOTE: передаем наш $id ($_GET) в нашу вьюху
        return $this->render('index', compact(
            'hello',
            'names',
            'id'));
    }
}