<?php

class App {

    /** @var array Config Array reaad from config.ini */
    protected static $config = [];
    /** @var string Dsn for DB connection */
    protected static $dbDsn;
    /** @var  string The BaseUrl for our Application */
    protected static $baseUrl;

    /**
     * Ran on startup to set up Application
     */
    public function init()
    {
        self::$config = parse_ini_file(__DIR__ . '/../config.ini');

        // Set Error Reporting
        if (self::getConfig('env.debug', '1') === '1') {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        } else {
            error_reporting(0);
            ini_set('display_errors', 0);
        }

        // set DSN String
        self::$dbDsn = sprintf(
            'mysql:dbname=%s;host=%s;charset=UTF8',
            self::getConfig('db.database', 'skill_board'),
            self::getConfig('db.ip', '127.0.0.1')
        );

        // Set base URL
        self::$baseUrl = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/';
        self::$baseUrl = substr(self::$baseUrl, -2) === '//' ? substr(self::$baseUrl, 0, -1) : self::$baseUrl;

        $base = dirname($_SERVER['PHP_SELF']);
        // Update request when we have a subdirectory
        if(ltrim($base, '/')){
            $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
        }
    }

    /**
     * Gets Key from Config Array / config.ini
     *
     * @param string $key Key of value
     * @param mixed $default Default value if not set
     *
     * @return null|string
     */
    public static function getConfig($key, $default = null)
    {
        if (isset(self::$config[$key])) {
            return self::$config[$key];
        } else {
            return $default;
        }
    }

    /**
     * Returns a new Database Connection
     * @return PDO
     */
    public static function getDb()
    {
        $db = new PDO(self::$dbDsn, self::getConfig('db.username'), self::getConfig('db.password'));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    }

    /**
     * Returns the base Url for the Application
     * @return string
     */
    public static function getBaseUrl()
    {
        return self::$baseUrl;
    }

    /**
     * Initializes and returns the Router
     * @return \Klein\Klein
     */
    public function initRouter()
    {
        $router = new \Klein\Klein();

        $router->respond(function ($request, $response, $service, $app) {
            $app->register('db', function() {
                return self::getDb();
            });
            $service->layout(__DIR__ . '/Views/layout.php');
            $service->startSession();
        });

        $router->onHttpError(function($code, $router) {
            if ($router->response()->isLocked()) {
                return;
            }
            switch ($code) {
                case 404:
                    $router->service()->flash('Page not found!', 'error');
                    $router->response()->redirect(App::getBaseUrl());
                    break;
                case 405:
                    $router->service()->flash('You dont have permission for this!', 'error');
                    $router->response()->redirect(App::getBaseUrl());
                    break;
                default:
                    $router->service()->flash('Oh no, a bad error happened that caused a ' . $code, 'error');
                    $router->response()->redirect(App::getBaseUrl());
            }
        });

        return $router;
    }

}