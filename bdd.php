<?php
    $servername = 'localhost';
    $dbname = 'restaurant';
    $username = 'root';
    $password = 'Simplon01';

    try{ //creation of the database

        $dbco = new PDO("mysql:host=$servername", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "CREATE DATABASE IF NOT EXISTS restaurant";
    }

    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }

    try{ //creation of all my tables

        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $table_table = "CREATE TABLE IF NOT EXISTS table_restaurant(
            id_table INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            numero_table INT(4) NOT NULL,
            luminosite VARCHAR(30) NOT NULL,
            nbre_de_chaises INT(10) NOT NULL,
            emplacement VARCHAR(30) NOT NULL)";

        $table_QRCode = "CREATE TABLE IF NOT EXISTS QRCode(
            id_QRCode INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nom_QRCode VARCHAR(30) NOT NULL,
            url VARCHAR(100) NOT NULL)";
       
        $table_client = "CREATE TABLE IF NOT EXISTS client(
            id_client INT UNSIGNED AUTO_INCREMENT PRIMARY KEY)";

        $table_smartphone = "CREATE TABLE IF NOT EXISTS smartphone(
            id_smartphone INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            marque VARCHAR(20) NOT NULL,
            langue VARCHAR(20) NOT NULL)";

        $table_plat = "CREATE TABLE IF NOT EXISTS plat(
            id_plat INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nom_plat VARCHAR(20) NOT NULL)";

        $table_flasher = "CREATE TABLE IF NOT EXISTS flasher(
            id_flash INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            date_flash DATETIME NOT NULL)";
        
        // $dbco->exec($table_table);
        // echo 'Table "restaurant" bien créée !<br/>';
    }
    
    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }

    // récupérer le nombre de flash en février
    $nbre_flash_fevrier = "
        SELECT COUNT(id_flash) 
        AS nbre_flash_fevrier
        FROM flasher
        WHERE date_flash 
        BETWEEN '2021-02-18 12:00:00' 
        AND '2021-02-25 12:00:00'";

    //calcul de la table la plus utilisée pendant un trimestre
    $table_max_utilisee_trimestre_Fev_Mars_Avril = "
        SELECT id_table, COUNT(id_QRCode) AS nbre_flash
        FROM flasher
        INNER JOIN table_restaurant ON id_table = id_QRCode
        WHERE date_flash BETWEEN '2021-02-18 12:00:00' AND '2021-04-16 12:30:00'
        GROUP BY id_QRCode
        ORDER BY nbre_flash DESC
        LIMIT 1
    ";

    $DataGlobal = "
        SELECT id_client, numero_table, luminosite, nbre_de_chaises, emplacement, nom_plat, marque, langue, nom_QRCode, date_flash FROM client
        INNER JOIN smartphone ON id_client = id_smartphone
        INNER JOIN flasher ON id_flash = id_client
        NATURAL JOIN plat
        INNER JOIN QRCode ON flasher.id_QRCode = QRCode.id_QRCode
        INNER JOIN table_restaurant ON table_restaurant.id_table = QRCode.id_QRCode
        ORDER BY id_client ASC
        LIMIT 0, 30
    ";
       
    try{
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbco->query($nbre_flash_fevrier);
        $stmt2 = $dbco->query($table_max_utilisee_trimestre_Fev_Mars_Avril);
        $stmt3 = $dbco->query($DataGlobal);
     
        if($stmt3 === false){
        die("Erreur");
        }
      }

      catch (PDOException $e){
        echo $e->getMessage();
      }

?>