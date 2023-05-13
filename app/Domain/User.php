<?php

namespace CobaMVC\Domain;

class User
{
    public ?string $id;
    public ?string $email;
    public ?string $password;
    public ?int $role_id;
    public ?int $kelas_id;
    public ?string $nama;
    public ?\DateTime $tanggal_lahir;
    public ?string $tempat_lahir;
    public ?string $jenis_kelamin;
    public ?string $domisili;
    public ?int $jurusan_id;
    public ?string $link_foto;
    public ?int $semester_id;
    public ?\DateTime $approved_at;
}