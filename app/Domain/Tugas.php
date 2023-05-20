<?php

namespace CobaMVC\Domain;

class Tugas
{
    public ?int $id;
    public ?string $judul;
    public ?string $deskripsi;
    public ?string $link_lampiran;
    public ?int $pelajaran_id;
    public ?\DateTime $deadline;
}