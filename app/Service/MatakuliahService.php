<?php

namespace CobaMVC\Service;

use CobaMVC\Domain\MatakuliahKelas;
use CobaMVC\Repository\MatakuliahRepository;

require_once __DIR__ . "/../Repository/MatakuliahRepository.php";
require_once __DIR__ . "/../Domain/MatakuliahKelas.php";

class MatakuliahService
{
    private MatakuliahRepository $matakuliahRepository;
    public function __construct(MatakuliahRepository $matakuliahRepository)
    {
        $this->matakuliahRepository = $matakuliahRepository;
    }

    public function tambahKelas(MatakuliahKelas $matakuliahKelas): bool
    {
        if (!$this->matakuliahRepository->checkKelasInMatakuliah($matakuliahKelas)){
            $this->matakuliahRepository->tambahKelas($matakuliahKelas);
            return true;
        }
        return false;
    }
}