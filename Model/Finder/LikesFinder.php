<?php


namespace Model\Finder;
use App\Src\App;
use Model\Gateway\LikesGateway;


class LikesFinder
{
    /**
     * @var \PDO
     */
    private $conn;

    /**
     * @var App
     */
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->conn = $this->app->getService('Database')->getConnection();
    }

    /**
     * @param $id
     * @return mixed : si le tweet a d�j� �t� lik�
     * @return null : si pas lik�
     */
    public function findLikeById($id)
    {
        $query = $this->conn->prepare('SELECT l.likes_tweet_id FROM likes l WHERE l.likes_tweet_id = :likes_tweet_id');
        $query->execute([':likes_tweet_id' => $id] ); // Ex�cution de la requ�te
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if($element == 0) return null;

        return $element;
    }

}