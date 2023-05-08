<?php

namespace CobaMVC\Repository;

use CobaMVC\Domain\Jurusan;

require_once __DIR__ . "/../Domain/Jurusan.php";
class JurusanRepository
{
    private \PDO $connection;

    public function  __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllJurusan(): array
    {
        $statement = $this->connection->prepare("SELECT id, nama FROM jurusan");
        $statement->execute();
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $jurusan = new Jurusan();
            $jurusan->id = $row["id"];
            $jurusan->nama = $row["nama"];
            $result[]=$jurusan;
        }
        return $result;
    }
}