<?php
namespace UTI\Core;

class View
{
    /**
     * @param string $contentView  виды отображающие контент страниц;
     * @param string $templateView общий для всех страниц шаблон
     * @param null   $data         массив, содержащий элементы контента страницы. Обычно заполняется в модели.
     */
    public function render($contentView, $templateView, $data = null)
    {
        /*
        динамически подключаем общий шаблон (вид),
        внутри которого будет встраиваться вид
        для отображения контента конкретной страницы.
        */

        $contentView = APP_TPL . $contentView;
        $templateView = APP_TPL . $templateView;

        include "$templateView";
    }
}
