<?php

namespace CobaMVC\Repository;

use CobaMVC\Domain\Tugas;

require_once __DIR__ . "/../Domain/Tugas.php";

class TugasRepository
{
    private \PDO $connection;

    public function  __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Tugas $tugas): void
    {
        $statement = $this->connection->prepare("INSERT INTO tugas(judul, deskripsi, link_lampiran, pelajaran_id, deadline) VALUES (?, ?, ?, ?, ?)");
        $statement->execute([
            $tugas->judul,
            $tugas->deskripsi,
            $tugas->link_lampiran,
            $tugas->pelajaran_id,
            $tugas->deadline->format('Y-m-d')
        ]);
    }

    public function getAllCertainMatakuliah(int $matakuliah_id): array
    {
        $statement = $this->connection->prepare("SELECT id, judul, deadline FROM tugas WHERE pelajaran_id = ?");
        $statement->execute([
            $matakuliah_id
        ]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $tugas = new Tugas();
            $tugas->id = $row['id'];
            $tugas->judul = $row['judul'];
            $tugas->deadline = new \DateTime($row['deadline']);
            $result[] = $tugas;
        }
        return $result;
    }

    public function getById(int $tugas_id): ?Tugas
    {
        $statement = $this->connection->prepare("SELECT id, judul, deskripsi, link_lampiran, deadline FROM tugas WHERE id = ?");
        $statement->execute([
            $tugas_id
        ]);
        if ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $tugas = new Tugas();
            $tugas->id = $row['id'];
            $tugas->judul = $row['judul'];
            $tugas->deskripsi = $row['deskripsi'];
            $tugas->link_lampiran = $row['link_lampiran'];
            $tugas->deadline = new \DateTime($row['deadline']);
            return $tugas;
        }
        return null;
    }

    public function getByTugasUserId(int $tugasUser_id): ?Tugas
    {
        $statement = $this->connection->prepare("SELECT t.id, t.judul, t.deskripsi, t.link_lampiran, t.deadline FROM tugas t, tugas_user ts WHERE t.id = ts.tugas_id AND ts.id = ?");
        $statement->execute([
            $tugasUser_id
        ]);
        if ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $tugas = new Tugas();
            $tugas->id = $row['id'];
            $tugas->judul = $row['judul'];
            $tugas->deskripsi = $row['deskripsi'];
            $tugas->link_lampiran = $row['link_lampiran'];
            $tugas->deadline = new \DateTime($row['deadline']);
            return $tugas;
        }
        return null;
    }

    public function getAllUserTugas(int $user_id): array
    {
        $statement = $this->connection->prepare("SELECT t.id, t.judul, t.deskripsi, t.link_lampiran, t.deadline FROM tugas t, users u, pelajaran p, kelas k, pelajaran_kelas pk WHERE t.pelajaran_id = p.id AND p.id = pk.pelajaran_id AND pk.kelas_id = k.id AND pk.semester_id = u.semester_id AND u.id = ? GROUP BY t.id");
        $statement->execute([
            $user_id
        ]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $tugas = new Tugas();
            $tugas->id = $row['id'];
            $tugas->judul = $row['judul'];
            $tugas->deskripsi = $row['deskripsi'];
            $tugas->link_lampiran = $row['link_lampiran'];
            $tugas->deadline = new \DateTime($row['deadline']);
            $result[] = $tugas;
        }
        return $result;
    }

    public function getAllUserTugasWhereMatakuliah(int $user_id, int $matakuliah_id): array
    {
        $statement = $this->connection->prepare("SELECT t.id, t.judul, t.deskripsi, t.link_lampiran, t.deadline FROM tugas t, users u, pelajaran p, kelas k, pelajaran_kelas pk WHERE t.pelajaran_id = p.id AND p.id = pk.pelajaran_id AND pk.kelas_id = k.id AND pk.semester_id = u.semester_id AND u.id = ? AND p.id = ? GROUP BY t.id");
        $statement->execute([
            $user_id, $matakuliah_id
        ]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $tugas = new Tugas();
            $tugas->id = $row['id'];
            $tugas->judul = $row['judul'];
            $tugas->deskripsi = $row['deskripsi'];
            $tugas->link_lampiran = $row['link_lampiran'];
            $tugas->deadline = new \DateTime($row['deadline']);
            $result[] = $tugas;
        }
        return $result;
    }
}