<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_saveUser()
    {
        $users=User::all();
        $usersCount=count($users);
        $user=new User();
        $user->name="Christopher";
        $user->email="test@test.pl";
        $user->role="admin";
        $user->password='12345678';
        $user->save();
        $users=User::all();
        $this->assertTrue(count($users)==$usersCount+1);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_readUser()
    {
        $users=User::all();
        $user=$users[count($users)-1];
        $this->assertTrue($user->email=='test@test.pl');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_updateUser()
    {
        $users=User::all();
        $user=$users[count($users)-1];
        $user->email='new@test.pl';
        $user->update();
        $user=$users[count($users)-1];
        $this->assertTrue($user->email=='new@test.pl');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_deleteUser()
    {
        $users=User::all();
        $usersCount=count($users);
        $user=$users[count($users)-1];
        $user->delete();
        $users=User::all();
        $this->assertTrue($usersCount-count($users)==1);
    }
}
