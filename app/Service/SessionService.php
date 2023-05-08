<?php

namespace CobaMVC\Service;

use CobaMVC\Domain\Session;
use CobaMVC\Domain\User;
use CobaMVC\Repository\SessionRepository;
use CobaMVC\Repository\UserRepository;

require_once __DIR__ . "/../Domain/Session.php";
require_once __DIR__ . "/../Repository/SessionRepository.php";
require_once __DIR__ . "/../Repository/UserRepository.php";

class SessionService
{
    private SessionRepository $sessionRepository;
    private UserRepository $userRepository;

    public function __construct(SessionRepository $sessionRepository, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->sessionRepository = $sessionRepository;
    }

    public function create(string $user_id): Session
    {
        $session = new Session();
        $session->session_id = uniqid();
        $session->user_id = $user_id;

        $this->sessionRepository->save($session);
        setcookie("ELEARNING-SESSION", $session->session_id, time() + (60*30), "/", "", true, true);
        return $session;
    }

    public function update(string $user_id): Session
    {
        $session = new Session();
        $session->session_id = uniqid();
        $session->user_id = $user_id;

        $this->sessionRepository->updateWhereUserId($session);
        setcookie("ELEARNING-SESSION", $session->session_id, time() + (60*30), "/", "", true, true);
        return $session;
    }

    public function current(): ?User
    {
        $session_id = $_COOKIE["ELEARNING-SESSION"] ?? null;
        if(!$session_id){
            return null;
        }

        $session = $this->sessionRepository->findBySessionId($session_id);
        if(!$session){
            return null;
        }

        $user = $this->userRepository->findById($session->user_id);
        return $user;
    }

    public function extandExpired(): void
    {
        $session_id = $_COOKIE["ELEARNING-SESSION"];
        setcookie("ELEARNING-SESSION", $session_id, time() + (60*30), "/", "", true, true);
    }

    public function destroy(): void
    {
        $session_id = $_COOKIE["ELEARNING-SESSION"];
        $this->sessionRepository->deleteBySessionId($session_id);
    }

    public function getRole(): ?string
    {
        $session_id = $_COOKIE["ELEARNING-SESSION"] ?? null;
        if(!$session_id){
            return null;
        }
        $session_id = $_COOKIE["ELEARNING-SESSION"];
        $session = $this->sessionRepository->findBySessionId($session_id);
        if(!$session){
            return null;
        }
        return $this->userRepository->getRoleById($session->user_id);
    }
}