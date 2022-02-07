<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','assem.cs.90@gmail.com')->first();

        if(!$user){
            User::create([
                'name'=>'assem al jimzawi',
                'email'=>'assem.cs.90@gmail.com',
                'role'=>'admin',
                'password'=> Hash::make('0000123assem')
            ]);
        }
    }
}
