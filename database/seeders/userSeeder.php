<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=1; $i<=20; $i++) { 
        $add=new User();
        $add['name']="acheng".$i;
        $add['email']="mingcheng".$i."@gmail.com";
        $add['password']=Hash::make("abc".$i);
        $add->save();

      }
    }
}
