<?php
/**
 * Created by PhpStorm.
 * User: takasuka-y
 * Date: 5/29/15
 * Time: 5:34 PM
 */

namespace KLab\TeaserModule\News;

class NewsWeb
{
    protected $con;

    /**
     * @param $con
     */
    public function __construct(\SimpleDBI $con)
    {
            $this->con = $con;
    }

    /*
     * function to get all news
     * @return array
     */
    public function getNewsList()
    {
        $rows = $this->con->rows('SELECT * from news');

        foreach($rows as $key => $value) {
            $rows[$key]['release_date'] = date("Y/m/d", strtotime($value['release_date']));
            $rows[$key]['new'] = self::getNewFlag($value['release_date']);
        }
        return $rows;
    }

    /*
     * function to get new flag
     * @return bool
     */
    public static function getNewFlag($release_date) {
        $withing_seven_days = strtotime("+7 day", strtotime($release_date));
        return time() <= $withing_seven_days ? true : false;
    }
}