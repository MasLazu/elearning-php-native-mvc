<?php

namespace CobaMVC\Repository;

use CobaMVC\Domain\Kelas;

require_once __DIR__ . "/../Domain/Kelas.php";

class KelasRepository
{
    private \PDO $connection;

    public function  __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function create(Kelas $kelas): void
    {
        $statement = $this->connection->prepare("INSERT INTO kelas(nama, jurusan_id) VALUES (?, ?)");
        $statement->execute([
            $kelas->nama, $kelas->jurusan_id
        ]);
    }

    public function getById(int $id): ?Kelas
    {
        $statement = $this->connection->prepare("SELECT id, nama, jurusan_id FROM kelas WHERE id = ?");
        $statement->execute([$id]);
        $result = [];
        if ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $kelas = new Kelas();
            $kelas->id = $row['id'];
            $kelas->nama = $row['nama'];
            $kelas->jurusan_id = $row['jurusan_id'];
            return $kelas;
        }
        return null;
    }

    public function getAll(): array
    {
        $statement = $this->connection->prepare("SELECT id, nama, jurusan_id FROM kelas");
        $statement->execute();
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $kelas = new Kelas();
            $kelas->id = $row['id'];
            $kelas->nama = $row['nama'];
            $kelas->jurusan_id = $row['jurusan_id'];
            $result[]=$kelas;
        }
        return $result;
    }
}