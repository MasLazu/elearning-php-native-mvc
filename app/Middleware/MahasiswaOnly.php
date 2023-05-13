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

class MahasiswaOnly implements Middleware
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
        $role = $this->sessionService->getRole();
        if($role == null){
            View::redirect("/auth/login", "message=you are not logged in");
            return;
        }
        if($role != "mahasiswa"){
            View::redirect("/$role/beranda", "message=you are not mahasiswa");
            return;
        }
        $this->sessionService->extandExpired();
    }
}