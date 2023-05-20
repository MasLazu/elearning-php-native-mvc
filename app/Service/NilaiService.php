<?php

namespace CobaMVC\Service;

use CobaMVC\Domain\Nilai;
use CobaMVC\Repository\NilaiRepository;

require_once __DIR__ . "/../Domain/Nilai.php";
require_once __DIR__ . "/../Repository/NilaiRepository.php";

class NilaiService
{
    private NilaiRepository $nilaiRepository;
    public function __construct(NilaiRepository $nilaiRepository)
    {
        $this->nilaiRepository = $nilaiRepository;
    }

    public function save(Nilai $nilai): void
    {
        if($nilai->id && $this->nilaiRepository->getById($nilai->id)->id){
            $this->nilaiRepository->update($nilai);
        } else {
            $this->nilaiRepository->save($nilai);
        }
    }
}