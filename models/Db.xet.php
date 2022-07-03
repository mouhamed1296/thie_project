<?php
abstract class Db {
    private static PDO $_connect;
    public static function connect(string $servername, string $username, string $password, string $dbname)
    {
        if (!isset(self::$_connect))
        {
            try
            {
                self::$_connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                self::$_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // set the PDO fetch mode to assoc
                self::$_connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
        }
        return self::$_connect;
    }
}

