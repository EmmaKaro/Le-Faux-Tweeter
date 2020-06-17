<?php


namespace Model\Finder;


use App\Src\App;
use Model\Gateway\RetweetGateway;

class RetweetFinder
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
     * @return mixed : si d�j� retweet�
     * @return null : si jamais retweet�
     */
    //v�rifie si le tweet est d�j� aim� ou non
    public function findRetweetById($id)
    {
        $query = $this->conn->prepare('SELECT r.retweet_tweet_id FROM retweet r WHERE r.retweet_tweet_id = :retweet_tweet_id');
        $query->execute([':retweet_tweet_id' => $id] ); // Ex�cution de la requ�te
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if($element == 0) return null;

        return $element;
    }

}