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
    public static function getNewsList(SimpleDBI $con)
    {
        $rows = $con->rows('SELECT * from news');

        foreach($rows as $key => $value) {
            $withing_seven_days = strtotime("+7 day", $value['publishing_date']);
            $rows[$key]['publishing_date'] = date("Y/m/d", strtotime($value['publishing_date']));
            $rows[$key]['new'] = time() <= $withing_seven_days ? true : false;
        }
        return $rows;
    }


}
