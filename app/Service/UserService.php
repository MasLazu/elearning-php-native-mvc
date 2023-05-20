<?php

namespace CobaMVC\Service;

use CobaMVC\App\View;
use CobaMVC\Domain\User;
use CobaMVC\Repository\SessionRepository;
use CobaMVC\Repository\UserRepository;


require_once __DIR__ . "/../Repository/UserRepository.php";
require_once __DIR__ . "/../Domain/User.php";

class UserService
{
    private UserRepository $userRepository;
    private SessionRepository $sessionRepository;
    private  SessionService $sessionService;

    public function __construct(UserRepository $userRepository, SessionRepository $sessionRepository, SessionService $sessionService)
    {
        $this->userRepository = $userRepository;
        $this->sessionRepository = $sessionRepository;
        $this->sessionService = $sessionService;
    }

    public function register(User $request): array
    {
        $request->password = password_hash($request->password, PASSWORD_BCRYPT);

        $user = $this->userRepository->findByEmail($request->email);
        if($user != null){
            return [
                "error" => "email already taken",
                "data" => null,
                "message" => null
            ];
        }

        $this->userRepository->save($request);
        return [
            "error" => null,
            "data" => $user,
            "message" => "Register success, data will be reviewed by admin"
        ];
    }

    public function login(User $request): array
    {
        $user = $this->userRepository->findByEmail($request->email);
        if (!$user){
            return [
                "error" => "credential not metch",
                "role" => null,
            ];
        }

        if(!password_verify($request->password, $user->password)){
            return [
                "error" => "credential not metch",
                "role" => null,
            ];
        }

        if($this->sessionRepository->findByUserId($user->id)){
            $this->sessionService->update($user->id);
        } else {
            $this->sessionService->create($user->id);
        }

        $role = $this->userRepository->getRoleById($user->id);

        if(!$user->tempat_lahir && !$user->tempat_lahir && !$user->jenis_kelamin && !$user->domisili){
            return [
                "error" => null,
                "alert" => "data not complete",
                "role" => $role
            ];
        }

        return [
            "error" => null,
            "role" => $role,
        ];
    }

    public function approveByEmail(User $userRequest): void
    {
        $user = $this->userRepository->findByEmail($userRequest->email);
        $user->role_id = $userRequest->role_id;
        if($user->role_id == '3'){
            $user->jurusan_id = $userRequest->jurusan_id;
            $user->kelas_id = $userRequest->kelas_id;
            $user->semester_id = $userRequest->semester_id;
        }
        $user->approved_at = new \DateTime();
        $this->userRepository->updateUserData($user);
    }

    public function detailRegister(User $request): void
    {
        $user = $this->sessionService->current();
        $user->nama = $request->nama;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->domisili = $request->domisili;
        $user->jurusan_id = $request->jurusan_id;
    }
}