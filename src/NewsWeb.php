<?php
/**
 * Created by PhpStorm.
 * User: takasuka-y
 * Date: 5/29/15
 * Time: 5:34 PM
 */

namespace KLab\TeaserModule\News;
use \SimpleDBI;

class NewsWeb
{
    /*
     * function to get all news
     */
    public static function getNewsList()
    {
        $con = DB::conn();
        $rows = $con->rows('SELECT * from news');

        foreach($rows as $key => $value) {
            $rows[$key]['release_date'] = date("Y/m/d", strtotime($value['release_date']));
            $rows[$key]['new'] = self::getNewFlag($value['release_date']);
        }
        return $rows;
    }

    /*
     * function to get new flag
     */
    public static function getNewFlag($release_date) {
        $withing_seven_days = strtotime("+7 day", strtotime($release_date));
        return time() <= $withing_seven_days ? true : false;
    }
}