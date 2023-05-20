<?php

namespace CobaMVC\Service;

use CobaMVC\Domain\TugasUser;

class FileService
{
    public function uploadPhotoProfile(string $user_id, string $tmpFileName, string $fileName): string
    {
        move_uploaded_file($tmpFileName, __DIR__ . "/../../public/resources/users/photoProfile/" . $user_id . "_$fileName");
        return __DIR__ . "/../../public/resources/users/photoProfile/" . $user_id . "_$fileName";
    }

    public function uploadLampiranTugas(string $tugas_id, string $tmpFileName ,string $fileName): string
    {
        move_uploaded_file($tmpFileName, __DIR__ . "/../../public/resources/tugas/lampiran/" . $tugas_id . "_$fileName");
        return __DIR__ . "/../../public/resources/tugas/lampiran/" . $tugas_id . "_$fileName";
    }

    public function uploadTugas(string $tugas_id, string $user_id, string $tmpFileName, string $fileName): string
    {
        move_uploaded_file($tmpFileName, __DIR__ . "/../../public/resources/tugas/pengumpulan/" . $tugas_id . "_$user_id" . "_$fileName");
        return __DIR__ . "/../../public/resources/tugas/pengumpulan/" . $tugas_id . "_$user_id" . "_$fileName";
    }
}