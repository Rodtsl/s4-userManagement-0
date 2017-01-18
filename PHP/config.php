<?php

  /*
   * CONFIGURATION SAISIE DES NOTES / VALIDATION DES SEMESTRES
   *
   * Contient la configuration de l'application :
   * - la configuration de la base de données
   * - diverses options de configuration
   */

  // Configuration de la base de données MySQL
  define('BDD_USERNAME', 'leopold_rodts');                 //nom d'utilisateur
  define('BDD_PASSWORD', 'ijeengie');                     //mot de passe
  define('BDD_HOSTNAME', 'leopold_rodts');            //nom d'hôte du serveur MySQL
  define('BDD_DATABASE', 'leopold_rodts');     //nom de la base de données

  // Affiche chaque requête SQL sur la page.
  define('DEBUG_PDO', false);

  // Active l'affichage des erreurs/warnings PHP.
  define('DEBUG_PHP', true);

  //Durée minimale d'une session en minutes.
  define('SESSION_TIMEOUT', 2 * 60 * 60);

  // Préfixe des tables de la base de données
  define('BDD_PREFIX_G', 'g_');


?>
