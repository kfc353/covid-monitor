<?php
// TODO: should set $host based on environment
// had a 127.0.0.1:3307 -> mysqlUrl:3306 port forwarding
class MysqlConnection
{
  private static $instance;

  private $connection;

  public static function getInstance()
  {
    if (!isset(self::$instance)) {
      self::$instance = new static();
    }
    return self::$instance;
  }

  private function connectMysql()
  {
    $host = "127.0.0.1:3307";
    $database = "kfc353_4";
    $username = "kfc353_4";
    $password = "Al3xB3st";

    // create connection
    $this->connection = new mysqli($host, $username, $password, $database);
  }

  function getConnection()
  {
    if (!isset($this->connection)) {
      $this->connectMysql();
    }
    return $this->connection;
  }
}
