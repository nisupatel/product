<?php

use Illuminate\Database\Seeder;
//use \ToolCountryRegionTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if ($this->command->confirm('Do you wish to refresh migration before seeding, Make sure it will clear all old data ?')) {
            $this->command->call('migrate:refresh');
            $this->command->warn("Data deleted, starting from fresh database.");
        }

        $this->call([ToolCountryRegionTableSeeder::class]);
    }
}
