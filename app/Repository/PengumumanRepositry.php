<?php

namespace CobaMVC\Repository;

use CobaMVC\Domain\Pengumuman;

require_once __DIR__ . "/../Domain/Pengumuman.php";

class PengumumanRepositry
{
    private \PDO $connection;

    public function  __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Pengumuman $pengumuman): Pengumuman
    {
        $statement = $this->connection->prepare("INSERT INTO pengumuman(judul, isi) VALUES (?, ?)");
        $statement->execute([
            $pengumuman->judul, $pengumuman->isi
        ]);
        return $pengumuman;
    }

    public function getAll(): array
    {
        $statement = $this->connection->prepare("SELECT id, judul, isi FROM pengumuman");
        $statement->execute();
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $pengumuman = new Pengumuman();
            $pengumuman->id = $row['id'];
            $pengumuman->judul = $row['judul'];
            $pengumuman->isi = $row['isi'];
            $result[]= $pengumuman;
        }
        return $result;
    }
}