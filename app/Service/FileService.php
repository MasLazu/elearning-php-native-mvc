<?php

namespace CobaMVC\Service;

use CobaMVC\Service\SessionService;

class FileService
{
    private SessionService $sessionService;

    public function __construct(SessionService $sessionService)
    {
        $this->sessionService = $sessionService;
    }

    public function uploadPhotoProfile(string $tmpFoleName, string $fileName): string
    {
        $user = $this->sessionService->current();
        move_uploaded_file($tmpFoleName, __DIR__ . "/../../public/resources/users/photoProfile/" . $user->id . "_$fileName");
        return __DIR__ . "/../../public/resources/users/photoProfile/" . $user->id . "_$fileName";
    }
}