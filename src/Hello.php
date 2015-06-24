<?php
/**
 * Created by PhpStorm.
 * User: takasuka-y
 * Date: 5/29/15
 * Time: 5:34 PM
 */

namespace KLab\TeaserModule\News;

class Hello
{
    public function say()
    {
        return 'hello';
    }

    public static function getNewsList($con)
    {
        $rows = $con->rows('SELECT * from news');
        return $rows;
    }


}
