<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= new ModelsUser();

        $user->name ="Matheus Rocha";
        $user->email="matheus_456@hotmail.com";
        $user->password = Hash::make('12345678');
        $user->type ="administrador"; 

        $user->save();

        $user2= new ModelsUser();

        $user2->name ="Arielle Resende";
        $user2->email="a@b.com";
        $user2->password = Hash::make('12345678');
        $user2->type ="normal"; 

        $user2->save();
    }

    
}
