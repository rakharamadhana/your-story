<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use ParseCsv\Csv;
use DB;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'type' => User::TYPE_ADMIN,
            'name_en' => 'Admin',
            'name_zh-TW' => '行政',
            'email' => 'admin@admin.com',
            'password' => 'secret',
            'email_verified_at' => now(),
            'active' => true,
        ]);

        if (app()->environment(['local', 'testing'])) {
            User::create([
                'type' => User::TYPE_USER,
                'name_en' => 'Student A',
                'name_zh-TW' => '學生A',
                'email' => 'user@user.com',
                'password' => 'secret',
                'email_verified_at' => now(),
                'active' => true,
            ]);

            User::create([
                'type' => User::TYPE_USER,
                'name_en' => 'Student B',
                'name_zh-TW' => '學生B',
                'email' => 'userb@user.com',
                'password' => 'secret',
                'email_verified_at' => now(),
                'active' => true,
            ]);

            User::create([
                'type' => User::TYPE_USER,
                'name_en' => 'Student C',
                'name_zh-TW' => '學生C',
                'email' => 'userc@user.com',
                'password' => 'secret',
                'email_verified_at' => now(),
                'active' => true,
            ]);
        }
        dump('check');

        $users = self::getUsers();

        dump('users:');
        dump($users);

        if(!empty($users)){
            dump('users found');
            foreach ($users as $user) {
                $user['type'] = User::TYPE_USER;
                $user['email_verified_at'] = Carbon::now();
                $user['password'] = bcrypt($user['password']);
                $user['password_changed_at'] = null;
                $user['last_login_at'] = null;
                $user['deleted_at'] = null;
                $user['created_at'] = Carbon::now();
                $user['updated_at'] = Carbon::now();

                DB::table('users')->insert($user);
                dump('Inserting '.$user['email']);
            }


        }

        $this->enableForeignKeys();
    }

    /**
     * Raw Data file path.
     *
     * @return string
     */
    protected static $path = __DIR__.'/rawdata/csv';


    /**
     * Get users data.
     *
     * @return array
     */
    public static function getUsers()
    {
        $csv = new Csv;

        dump('path: '.self::$path);
        $data = $csv->parseFile(self::$path.'\users.csv');
        dump('csv found: '.$data);
        return $data;
    }

}
