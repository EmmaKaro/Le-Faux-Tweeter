<?php


namespace Model\Finder;

use App\Src\App;
use Model\Gateway\UserGateway;

class UserFinder
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

    //v�rifie que l'utilisateur existe dans la table
    public function findNameByName($name)
    {
        $query = $this->conn->prepare('SELECT u.user_name FROM user u WHERE u.user_name = :user_name');
        $query->execute([':user_name' => $name]); // Ex�cution de la requ�te
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if($element == 0) return null;

        return $element;
    }

    //v�rifie le mot de passe en fonction du nom d'utilisateur renseign�
    public function findPasswordByName($name)
    {
        $query = $this->conn->prepare('SELECT u.password FROM user u WHERE u.user_name = :user_name');
        $query->execute([':user_name' => $name] ); // Ex�cution de la requ�te
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if($element == 0) return null;

        return $element;
    }

    //R�cup�re les info de la personne qui se connecte
    public function findUserByLogin($name)
    {
        $query = $this->conn->prepare('SELECT u.id, u.user_name, u.pseudo, u.birth, u.info_perso FROM user u WHERE u.user_name = :user_name');
        $query->execute([':user_name' => $name] ); // Ex�cution de la requ�te
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if($element == 0) return null;

        return $element;
    }

    public function findUserById($id)
    {
        $query = $this->conn->prepare('SELECT u.id, u.user_name, u.pseudo, u.birth, u.info_perso FROM user u WHERE u.id = :id');
        $query->execute([':id' => $id] ); // Ex�cution de la requ�te
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if($element == 0) return null;

        return $element;
    }

    //recherche d'un utilisateur
    public function FindUserByName($searchString)
    {
        $query = $this->conn->prepare('SELECT u.id, u.user_name, u.pseudo, u.info_perso, u.birth FROM user u WHERE u.user_name like :search ORDER BY u.user_name'); // Cr�ation de la requ�te + utilisation order by pour ne pas utiliser sort
        $query->execute([':search' => '%' . $searchString .  '%']); // Ex�cution de la requ�te
        $elements = $query->fetchAll(\PDO::FETCH_ASSOC);

        if($elements == 0) return null;

        $users = [];
        $user = null;

        foreach ($elements as $element)
        {
            $user = new UserGateway($this->app);
            $user->hydrate($element);

            $users[] = $user;
        }

        return $users;
    }

    //r�cup�re les abonnements
    public function findUserFollowed()
    {
        $query = $this->conn->prepare('SELECT u.birth, u.id, u.info_perso, u.user_name, u.pseudo FROM user u RIGHT OUTER JOIN follow f ON f.user_followed_id = u.id WHERE f.user_follower_id = :id ORDER BY u.user_name');
        $query->execute([':id'=> $_SESSION['id']]); // Ex�cution de la requ�te
        $elements = $query->fetchAll(\PDO::FETCH_ASSOC);

        if($elements == 0) return null;

        $users = [];
        $user = null;

        foreach ($elements as $element)
        {
            $user = new UserGateway($this->app);
            $user->hydrate($element);

            $users[] = $user;
        }

        return $users;
    }


    //R�cup�re les abonn�s
    public function findUserFollower()
    {
        $query = $this->conn->prepare('SELECT u.birth, u.id, u.info_perso, u.user_name, u.pseudo FROM user u INNER JOIN follow f ON f.user_follower_id = u.id WHERE f.user_followed_id = :id ORDER BY u.user_name');
        $query->execute([':id'=> $_SESSION['id']]); // Ex�cution de la requ�te
        $elements = $query->fetchAll(\PDO::FETCH_ASSOC);

        if($elements == 0) return null;

        $users = [];
        $user = null;

        foreach ($elements as $element)
        {
            $user = new UserGateway($this->app);
            $user->hydrate($element);

            $users[] = $user;
        }

        return $users;
    }



}