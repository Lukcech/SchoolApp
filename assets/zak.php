<?php


/**
 * 
 * Získá jednoho žáka z databáze podle ID
 * 
 * @param object $connection - napojení na db
 * @param integer $id - id konkrétního žáka
 * 
 * @return mixed associativní pole obsahující informace o jednom konkrétním žákovi nebo vrátí null, pokud nenalezen
 */

// napojení na db a konkrétní id
function getStudent($connection, $id, $columns = "*") {
    $sql = "SELECT $columns 
            FROM student
            WHERE id=?";
// připrav propojení
    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt === false) {
        echo mysqli_error($connection);
        // doplň otazník konrkrétní hodnotou int
    } else {
        mysqli_stmt_bind_param($stmt,"i", $id);

        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            // převedení $result na asociativní pole
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }

}

/**
 * 
 * Update informací o žákovi v db
 * 
 * @param object $connection - napojení na db
 * @param string $first_name
 * @param string $second_name
 * @param integer $age
 * @param string $life
 * @param string $college
 * @param integer $id
 * 
 * @return boolean true - if the update was succesfull
 */


function updateStudent($connection, $first_name,$second_name, $age, $life, $college, $id) {

    $sql = "UPDATE student
                SET first_name = ?,
                    second_name = ?,
                    age = ?,
                    life = ?,
                    college = ?
                WHERE id = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if(!$stmt) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "ssissi", $first_name,$second_name, $age, $life, $college, $id);

        if(mysqli_stmt_execute($stmt)) {

            return true;

    
        }

       
    }

}

/**
 * 
 * Vymaže studenta databáze dle jeho id
 * 
 * @param object $connection - prpojení s db
 * @param integer $id - id žáka
 * 
 * @return boolean true - if successfully deleted
 */

function deleteStudent ($connection, $id) {
    $sql = "DELETE
            FROM student
            WHERE id =?";

    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt === false) {
        echo mysqli_error ($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            return true;
            
        }
    }
}

/**
 * 
 * Vrátí všechny žáky z databáze
 * 
 * @param object $connection - připojení do db
 * 
 * @ return array pole objektů, kde každý objekt je jeden žák
 */

 // specifukujeme sloupečky, kvůli zrychlení databáze
function getAllStudents($connection, $columns = "*") {

    $sql = "SELECT $columns 
            FROM student";

    $connection = connectionDB();

    $result = mysqli_query($connection, $sql);
    if($result === false) {
        echo mysqli_connect_error($connection);
    } else {
        $allstudents = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $allstudents;
    }
}

/**
 * 
 * Přidá žáka do db a přesměruje do detailu žáka
 * 
 * @param $connection -připojení do db
 * @param string $first_name - jméno žáka
 * @param string $second_name - příjmení
 * @param integer $age - věk žáka
 * @param string $life - podrobnosti o žákovi
 * @param string $college - kolej žáka
 * 
 * @return int $id - id přidaného žáka
 */
function createStudent($connection, $first_name, $second_name, $age, $life, $college) {

    $sql = "INSERT INTO student (first_name, second_name, age, life, college)
        VALUES (?,?,?,?,?)";

        // příprava na odeslání
        $statement = mysqli_prepare($connection, $sql);

        if($statement === false) {
            echo mysqli_error($connection);
        } else {
            // otazníky vymění za konkrétní hodnoty, string, string, int, string, string (takto specifikované datové typy ochraňují db před sql injection)
            mysqli_stmt_bind_param($statement, "ssiss", $first_name, $second_name, $age, $life, $college);
            // provedení
            if(mysqli_stmt_execute($statement)) {
                $id = mysqli_insert_id($connection);
                return $id; 
        
            } else {
                echo mysqli_error($statement);
            }
        }
}

