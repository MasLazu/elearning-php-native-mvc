<?php

namespace CobaMVC\Middleware;

use CobaMVC\App\View;
use CobaMVC\Config\Database;
use CobaMVC\Repository\SessionRepository;
use CobaMVC\Repository\UserRepository;
use CobaMVC\Service\SessionService;

require_once __DIR__ . "/../App/View.php";
require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Repository/SessionRepository.php";
require_once __DIR__ . "/../Repository/UserRepository.php";
require_once __DIR__ . "/../Service/SessionService.php";
require_once __DIR__ . "/Middleware.php";

class GuestOnly implements Middleware
{
    private SessionService $sessionService;
    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }
    public function before(): void
    {
        $user = $this->sessionService->current();
        if($user){
            return;
        }

        $role = $this->sessionService->getRole();
        if(!$role){
            return;
        }

        View::redirect("/$role/beranda" );
    }
}