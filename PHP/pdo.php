<?php
namespace Leopold;
  /**
   * Modèle
   * Database.class.php
   *
   * Méthodes liées à l'accès à la base de donnée.
   */



  use PDO;
  use PDOException;

  require_once 'config.php';

  /**
   * Class BaseDB
   *
   * Classe de base de données de base.
   *
   * @package SDN
   */
  class BaseDB
  {

    private $db;

    private $username;
    private $password;
    private $database;
    private $host;

    /**
     * Créé une nouvelle instance du gestionnaire de base de données.
     *
     * @param bool $autoconnect spécifie si on doit se connecter automatiquement ou pas
     *             (true par défaut; utilisé pour installer la base de données)
     */
    public function __construct($username, $password, $database, $host)
    {
      $this->username = $username;
      $this->password = $password;
      $this->database = $database;
      $this->host     = $host;

      $this->connexionBDD();
    }

    /**
     * Établit la connexion à la base de données.
     */
    private function connexionBDD()
    {
      try {
        //connexion à la base de données
        $this->db = new PDO('mysql:dbname=' . $this->host . ';dbname=' . $this->database.';charset=UTF8',
          $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

        if (DEBUG_PDO) {
          $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

      } catch (PDOException $e) {
        die('Erreur lors de la connexion à la base : ' . $e->getMessage() .
          "\n<br>Si la base n'existe pas encore, créez-la puis exécutez installation_bdd.php.");
      }
    }

    public function __destruct()
    {
      $this->close();
    }

    /**
     * Fermeture de la base de données.
     */
    public function close()
    {
      if ($this->db !== null) {
        $this->db = null;
      }
    }

    /**
     * Commence une transaction.
     */
    public function beginTransaction()
    {
      $this->db->beginTransaction();
    }

    /**
     * Commit les changements effectués durant la transaction.
     */
    public function commit()
    {
      $this->db->commit();
    }

    /**
     * Exécute une requête retournant des lignes sur la base de données Oracle.
     *
     * @param string $sql la requête à exécuter, avec des placeholders
     * @param array $bindings les valeurs des placeholders
     * @return array une liste des résultats retournés
     */
    protected function executerRequeteAvecResultat($sql, $bindings = null)
    {
      return $this->executerRequete($sql, $bindings)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Exécute une requête qui ne retourne pas de lignes (ex: INSERT INTO) sur la base de données Oracle.
     *
     * @param string $sql la requête à exécuter, avec des placeholders
     * @param array $bindings les valeurs des placeholders
     * @throws PDOException si la requête a échoué
     * @return PDOStatement le statement correspondant à la requête exécutée
     */
    protected function executerRequete($sql, $bindings = null)
    {
      $stmt = $this->db->prepare($sql);

      if ($bindings !== null && is_array($bindings)) {
        foreach ($bindings as $key => $value) {
          $stmt->bindValue($key, $value);
        }
      }

      $succes = $stmt->execute();

      if (!$succes) {
        $error = $stmt->errorInfo();
        throw new PDOException($error[0] . ': ' . $error[2]);
      }

      return $stmt;
    }

  }

  /**
   * Class Database
   *
   * Gère toutes les méthodes d'accès à la base de données.
   * Si vous avez besoin d'accéder à la base de données, créez une méthode adéquate ici.
   * Pareil pour l'écriture.
   *
   * @package SDN
   */
  class Database extends BaseDB
  {

    function __construct()
    {
      parent::__construct(BDD_USERNAME, BDD_PASSWORD, BDD_DATABASE, BDD_HOSTNAME);
    }
    function test(){
      $sql = "select * from role";
      return $this->executerRequeteAvecResultat($sql);
    }
    function affiche_role($ordre){
      $sql = "select role.id,name,count(*) as nb_role from role join user on user.idrole = role.id group by (name) order by $ordre";
      return $this->executerRequeteAvecResultat($sql);
    }
    function nb_role(){
      $sql = "select count(*) as nb_role from role";
      return $this->executerRequeteAvecResultat($sql);
    }

}
?>
