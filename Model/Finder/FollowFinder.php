<?php


namespace Model\Finder;

use App\Src\App;
use Model\Gateway\FollowGateway;

class FollowFinder
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
     * @return mixed : si utilisateur existe dans les abonnements
     * @return null : si utilisateur innexistant dans les abonnements
     */
    //V�rifie si l'utilisateur fait partie des abonnements
    public function findFollowedById($id)
    {
        $query = $this->conn->prepare('SELECT f.user_followed_id FROM follow f WHERE f.user_followed_id = :user_followed_id');
        $query->execute([':user_followed_id' => $id] ); // Ex�cution de la requ�te
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if($element == 0) return null;

        return $element;
    }

    //R�cup�re le nombre d'abonnement
    public function findNbAbonnement($id)
    {
        $query = $this->conn->prepare('SELECT COUNT(*) FROM follow f INNER JOIN user u ON u.id = f.user_follower_id WHERE u.id = :id');
        $query->execute([':id' => $id]);
        $element = $query->fetch(\PDO::FETCH_ASSOC);
        return $element;
    }

    //R�cup�re le nombre d'abonn�s
    public function findNbAbonne($id)
    {
        $query = $this->conn->prepare('SELECT COUNT(*) FROM follow f INNER JOIN user u ON u.id = f.user_followed_id WHERE u.id = :id');
        $query->execute([':id' => $id]);
        $element = $query->fetch(\PDO::FETCH_ASSOC);
        return $element;
    }

}