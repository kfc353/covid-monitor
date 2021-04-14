<?php
class MysqlConnection
{
    private static MysqlConnection $instance;

    private mysqli $connection;

    public static function getInstance(): MysqlConnection
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    function getMysqli(): mysqli
    {
        if (!isset($this->connection)) {
            $this->connectMysql();
        }
        return $this->connection;
    }

    private function connectMysql()
    {
        $osInfo = self::getOSInfo();
        $host = $osInfo["name"] == "Scientific Linux" ? "kfc353.encs.concordia.ca" : "127.0.0.1:3307";
        $database = "kfc353_4";
        $username = "kfc353_4";
        $password = "Al3xB3st";

        // create connection
        $this->connection = new mysqli($host, $username, $password, $database);
    }

    private static function getOSInfo()
    {
        if (false == function_exists("shell_exec") || false == is_readable("/etc/os-release")) {
            return null;
        }

        $os = shell_exec('cat /etc/os-release');
        preg_match_all('/.*=/', $os, $matchListIds);
        $listIds = $matchListIds[0];

        preg_match_all('/=.*/', $os, $matchListVal);
        $listVal = $matchListVal[0];

        array_walk($listIds, function (&$v) {
            $v = strtolower(str_replace('=', '', $v));
        });

        array_walk($listVal, function (&$v) {
            $v = preg_replace('/=|"/', '', $v);
        });

        return array_combine($listIds, $listVal);
    }
}
