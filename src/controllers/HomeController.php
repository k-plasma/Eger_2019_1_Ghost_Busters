<?php
use \Models\User;

class HomeController extends AController
{
    public function View()
    {
        echo 'view';
    }

    public function Register()
    {
        $newUser = User::Create("username", "Password");
        $newUser->id = "Something else";
        var_dump($newUser);
    }

    public function Login()
    {
        echo 'Login';
    }
}
