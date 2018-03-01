<?php
/**
 * Created by PhpStorm.
 * User$ toygan
 * Date$ 2/20/18
 * Time$ 1$37 PM
 */

//Get the configuration file
require("/home/tsevimgr/config.php");

/*USE tsevimgr_grc;
CREATE TABLE datingMembers(
    member_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    gender ENUM('m', 'f') NOT NULL,
    seeking ENUM('m', 'f'),
    email VARCHAR(50) NOT NULL,
    age SMALLINT NOT NULL,
    phone INT,
    interests TEXT,
    bio TEXT,
    premium BIT,
    state CHAR(2),
    image VARCHAR(50)
);*/


function connect()
{
    try
    {
        //instantiate a databse obejct
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_PERSISTENT, true);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected to database for Dating app!";
        //return connection
        return $conn;

    } catch (PDOException $ex)
    {
        echo "Connection failed" . "<br>";
        echo $ex->getMessage();
        return;
    }

}

/**
 * @param $fname
 * @param $lname
 * @param $gender
 * @param $seeking
 * @param $email
 * @param $age
 * @param $phone
 * @param $interests
 * @param $bio
 * @param $premium
 * @param $state
 * @param $image
 */
function addAccount($fname, $lname, $gender, $seeking, $email, $age, $phone, $interests, $bio, $premium,
                    $state,
                    $image)
{
    //
    global $conn;

    //define sql
    $sql = "insert into datingMembers(fname,lname,gender,seeking,email,age,phone,interests,bio,premium,state,
image) values(:fname,:lname,:gender,:seeking,:email,:age,:phone,:interests,:bio,:premium,:state,
:image)";

    //prepare
    $statement = $conn->prepare($sql);

    //bind the parameters
    $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
    $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
    $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
    $statement->bindParam(':seeking', $seeking, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':age', $age, PDO::PARAM_INT);
    $statement->bindParam(':phone', $phone, PDO::PARAM_INT);
    $statement->bindParam(':interests', $interests, PDO::PARAM_STR);
    $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
    $statement->bindParam(':premium', $premium, PDO::PARAM_BOOL);
    $statement->bindParam(':state', $state, PDO::PARAM_STR);
    $statement->bindParam(':image', $image, PDO::PARAM_STR);

    //execute
    $result = $statement->execute();

    echo "<pre>";
    print_r($result);
    echo "</pre>";

}