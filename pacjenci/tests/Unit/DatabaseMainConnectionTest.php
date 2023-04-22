<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseMainConnectionTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Test if database connection is established
     */
    public function test_database_connection()
    {
        $connection = DB::connection()->getPdo();
        $this->assertNotNull($connection, 'Failed connection to database');
    }
}
