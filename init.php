<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once 'app/authentication/auth.php';

function auto_loader($classname)
{
    if(is_file("app/Controllers/".$classname.".php"))
    {
        $path = "app/Controllers/".$classname.".php";
    }
    else if(is_file("app/Repositories/".$classname.".php"))
    {
        $path = "app/Repositories/".$classname.".php";
    }
    else if(is_file("app/Repositories/QueryBuilder/".$classname.".php"))
    {
        $path = "app/Repositories/QueryBuilder/".$classname.".php";
    }
    else if(is_file("app/Services/".$classname.".php"))
    {
        $path = "app/Services/".$classname.".php";
    }
    else if(is_file("app/Models/".$classname.".php"))
    {
        $path = "app/Models/".$classname.".php";
    }
    else if(is_file("config/".$classname.".php"))
    {
        $path = "config/".$classname.".php";
    }
    else
    {
        throw new Exception(" this $classname is not found");
    }
    require_once $path;
}
spl_autoload_register('auto_loader');

(new DotEnv(__DIR__ . '/.env'))->load();

/**
 * @return UserController
 */
function initNewUserController(): UserController {
    $db = new DB();
    $queryBuilder = new QueryBuilder($db);
    $repo = new SQLUserRepository($queryBuilder);
    $service = new UserService($repo);
    return new UserController($service);
}