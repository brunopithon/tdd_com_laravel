<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class MySQLConnectionTest extends TestCase
{
    public function test_mysql_application_database_connection()
    {
        // Configura manualmente a conexão para usar o banco de dados MySQL da aplicação
        Config::set('database.default', 'mysql');
        Config::set('database.connections.mysql.host', '127.0.0.1');
        Config::set('database.connections.mysql.port', env('DB_PORT'));
        Config::set('database.connections.mysql.database', 'laravel-tdd');
        Config::set('database.connections.mysql.username', env('DB_USERNAME'));
        Config::set('database.connections.mysql.password', env('DB_PASSWORD'));

        $this->assertEquals('127.0.0.1', Config::get('database.connections.mysql.host'));
        $this->assertEquals('3308', Config::get('database.connections.mysql.port'));
        $this->assertEquals('laravel-tdd', Config::get('database.connections.mysql.database'));
        $this->assertEquals('root', Config::get('database.connections.mysql.username'));
        $this->assertEquals('', Config::get('database.connections.mysql.password'));
        $this->assertEquals('mysql', Config::get('database.default'));

        
        $this->assertTrue(DB::connection()->getPdo() != null);
    }
}