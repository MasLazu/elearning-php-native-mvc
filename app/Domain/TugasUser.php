<?php

namespace CobaMVC\Domain;

class TugasUser
{
    public ?int $id;
    public ?int $user_id;
    public ?int $tugas_id;
    public ?\DateTime $kumpulkan_at;
    public ?string $link_file_pengumpulan;
    public ?string $catatan;
}