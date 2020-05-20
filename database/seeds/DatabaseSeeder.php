<?php //role table seeder

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RTS::class);
        $this->call(UTS::class);
    }
}
