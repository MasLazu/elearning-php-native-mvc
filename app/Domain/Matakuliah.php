<?php

namespace CobaMVC\Domain;

class Matakuliah
{
    public ?int $id;
    public ?string $nama;
    public ?int $dosen_id;
    public ?string $hari;
    public ?string $jam_mulai;
    public ?string $jam_selesai;
    public ?string $ruangan;
}