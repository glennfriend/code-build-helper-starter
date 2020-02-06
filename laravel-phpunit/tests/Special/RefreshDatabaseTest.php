<?php

namespace Tests\Special;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RefreshDatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function testRefreshDatabase()
    {
        $this->assertTrue(true);
    }

}
