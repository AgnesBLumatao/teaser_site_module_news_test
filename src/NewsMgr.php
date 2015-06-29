<?php
/**
 * Created by PhpStorm.
 * User: takasuka-y
 * Date: 5/29/15
 * Time: 5:34 PM
 */

namespace KLab\TeaserModule\News;

class NewsMgr
{
    /*
     * function to add news
     */
    public static function addNews(\SimpleDBI $con, $news_data)
    {
        $time = Time::now();
        $con->insert(
            'news',
            array(
                'release_date' => $news_data['release_date'],
                'category' => $news_data['category'],
                'headline' => $news_data['headline'],
                'thumbnail' => $news_data['thumbnail'],
                'link' => $news_data['link'],
                'created' => $time,
            )
        );
    }

    /*
     * function to update news
     */
    public static function editNews(\SimpleDBI $con, $news_data)
    {
    }

    /*
     * function to delete news
     */
    public static function deleteNews(\SimpleDBI $con, $news_id)
    {
        $con = DB::conn();
        $con->query('DELETE FROM news WHERE id = ?', array($news_id));
    }
}
