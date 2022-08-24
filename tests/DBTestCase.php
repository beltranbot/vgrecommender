<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class DBTestCase extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
}
