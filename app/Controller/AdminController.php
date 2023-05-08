<?php

namespace CobaMVC\Controller;

use CobaMVC\App\View;
use CobaMVC\Config\Database;
use CobaMVC\Domain\User;
use CobaMVC\Repository\SessionRepository;
use CobaMVC\Repository\UserRepository;
use CobaMVC\Service\SessionService;
use CobaMVC\Service\UserService;

require_once __DIR__ . "/../App/View.php";
require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Domain/User.php";
require_once __DIR__ . "/../Repository/SessionRepository.php";
require_once __DIR__ . "/../Repository/UserRepository.php";
require_once __DIR__ . "/../Service/SessionService.php";
require_once __DIR__ . "/../Service/UserService.php";

class AdminController
{
    private UserService $userService;
    private UserRepository $userRepository;
    //private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->userRepository = $userRepository;
        $sessionRepository = new SessionRepository($connection);

        $sessionService = new SessionService($sessionRepository, $userRepository);
        //$this->sessionService = $sessionService;
        $this->userService = new UserService($userRepository, $sessionRepository, $sessionService);
    }

    public function beranda(): void
    {
        View::render("admin/beranda");
    }

    public function request(): void
    {
        $users = $this->userRepository->getAllUserWithNoRole();
        View::render("admin/request", [
            "users" => $users
        ]);
    }

    public function approve_request(): void
    {
        $user = new User();
        $user->email = $_POST['email'];
        $user->role_id = $_POST['role_id'];
        $this->userService->approveByEmail($user);
        View::redirect("/admin/request", "message=success approve " . $user->email);
    }
}