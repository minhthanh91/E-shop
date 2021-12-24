<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Database\seeders\productSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function start()
    {
      DB::connection('mysql_start')->statement("CREATE DATABASE IF NOT EXISTS learning");
      return 'learning database created.';
      // $this->seed();

      // $this->seed(productSeeder::class);





        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
}
