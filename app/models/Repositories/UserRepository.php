<?php

class UserRepository implements UserRepositoryInterface
{
    public function usersAll(){
        return User::all();
    }
}