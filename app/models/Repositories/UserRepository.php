<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 27/03/15
 * Time: 19:44
 */

class UserRepository implements UserRepositoryInterface
{
    public  function getUserAll()
    {
        return User::all()->toArray();
    }
}