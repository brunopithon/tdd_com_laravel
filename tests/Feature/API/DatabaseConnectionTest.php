<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class DatabaseConnectionTest extends TestCase
{
  public function test_mysql_database_connection()
  {
      $this->assertEquals('sqlite', env('DB_CONNECTION'));

      $this->assertTrue(DB::connection()->getPdo() != null);
  }
}
