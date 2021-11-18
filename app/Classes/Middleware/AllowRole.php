<?php

namespace App\Classes\Middleware;

class AllowRole
{
    public static function role(...$roles)
    {
        $result="role:";

        foreach($roles as $role)
        {
            $result.=$role.",";
        }

        return substr($result,0,strlen($result)-1); //removes the extra ',' before returning it
    }
}
