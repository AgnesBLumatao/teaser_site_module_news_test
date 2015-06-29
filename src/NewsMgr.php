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
    protected $con;

    /**
     * @param $con
     */
    public function __construct(\SimpleDBI $con)
    {
        $this->con = $con;
    }

    /*
     * function to add news
     */
    public function addNews($news_data)
    {
        $time = Time::now();
        $this->con->insert(
            'news',
            array(
                'publishing_date' => $news_data['publishing_date'],
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
    public static function editNews($news_data)
    {
    }

    /*
     * function to delete news
     */
    public function deleteNews($news_id)
    {
        $this->con->query('DELETE FROM news WHERE id = ?', array($news_id));
    }
}
