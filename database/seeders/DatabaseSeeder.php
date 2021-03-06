<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        $this->call(AnnouncementSeeder::class);
        $this->call(CaseSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(StudentGroupSeeder::class);
        $this->call(StorySeeder::class);
        $this->call(StoryDrawingSeeder::class);

        Model::reguard();
    }
}
