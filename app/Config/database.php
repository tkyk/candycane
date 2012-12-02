<?php

class DATABASE_CONFIG {
    public static $baseConfigs = array(
        'DATABASE_URL' => array(
            'datasource' => 'Database/Postgres',
            'persistent' => false,
            'prefix' => '',
        ),
        'CLEARDB_DATABASE_URL' => array(
            'datasource' => 'Database/Mysql',
            'persistent' => false,
            'prefix' => '',
            'port' => '',
            'encoding' => 'utf8',
        )
	);

    public $default = array();

    public function __construct() {
        foreach(self::$baseConfigs as $env => $defaults) {
            if(($value = getenv($env))) {
                $this->default = array_merge($defaults, $this->_parseDatabaseConfig($value));
                break;
            }
        }
    }

    protected function _parseDatabaseConfig($value) {
        $url = parse_url($value);
        $config = array();

        $config['host'] = $url["host"];
        $config['login'] = $url["user"];
        $config['password'] = $url["pass"];
        $config['database'] = substr($url["path"],1);
        if(!empty($url['port'])) {
            $config['port'] = $url['port'];
        }
        return $config;
    }

}
