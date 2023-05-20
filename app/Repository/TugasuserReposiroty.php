<?php

namespace CobaMVC\Repository;

use CobaMVC\Domain\TugasUser;

require_once __DIR__ . "/../Domain/TugasUser.php";

class TugasuserReposiroty
{
    private \PDO $connection;

    public function  __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(TugasUser $tugasUser): void
    {
        $statement = $this->connection->prepare("INSERT INTO tugas_user(user_id, tugas_id, kumpulkan_at, link_file_pengumpulan, catatan) VALUES (?, ?, ?, ?, ?)");
        $statement->execute([
            $tugasUser->user_id, $tugasUser->tugas_id, $tugasUser->kumpulkan_at->format('Y-m-d'), $tugasUser->link_file_pengumpulan, $tugasUser->catatan
        ]);
    }

    public function checkKumpulkan(int $user_id, int $tugas_id): ?int
    {
        $statement = $this->connection->prepare("SELECT id FROM tugas_user WHERE user_id = ? AND tugas_id = ?");
        $statement->execute([
            $user_id, $tugas_id
        ]);
        if($row = $statement->fetch()){
            return $row['id'];
        }
        return null;
    }

    public function getById(int $tugasuser_id): ?TugasUser
    {
        $statement = $this->connection->prepare("SELECT id, user_id, tugas_id, kumpulkan_at, link_file_pengumpulan, catatan FROM tugas_user WHERE id = ?");
        $statement->execute([
            $tugasuser_id
        ]);
        if($row = $statement->fetch()){
            $tugasUser = new TugasUser();
            $tugasUser->id = $row['id'];
            $tugasUser->user_id = $row['user_id'];
            $tugasUser->tugas_id = $row['tugas_id'];
            $tugasUser->catatan = $row['catatan'];
            $tugasUser->kumpulkan_at = new \DateTime($row['kumpulkan_at']);
            $tugasUser->link_file_pengumpulan = $row['link_file_pengumpulan'];
            return $tugasUser;
        }
        return null;
    }

    public function getByUserIdAndTugasId(int $user_id, int $tugas_id): ?TugasUser
    {
        $statement = $this->connection->prepare("SELECT id, user_id, tugas_id, kumpulkan_at, link_file_pengumpulan, catatan FROM tugas_user WHERE user_id = ? AND tugas_id = ?");
        $statement->execute([
            $user_id, $tugas_id
        ]);
        if($row = $statement->fetch()){
            $tugasUser = new TugasUser();
            $tugasUser->id = $row['id'];
            $tugasUser->user_id = $row['user_id'];
            $tugasUser->tugas_id = $row['tugas_id'];
            $tugasUser->catatan = $row['catatan'];
            $tugasUser->kumpulkan_at = new \DateTime($row['kumpulkan_at']);
            $tugasUser->link_file_pengumpulan = $row['link_file_pengumpulan'];
            return $tugasUser;
        }
        return null;
    }

    public function getUsersAlreadySubmit(int $tugas_id): array
    {
        $statement = $this->connection->prepare("SELECT ts.id AS tugasuser_id, u.id AS user_id, u.nama, u.semester_id, k.nama AS nama_kelas, ts.kumpulkan_at FROM tugas_user ts, users u, kelas k WHERE ts.user_id = u.id AND u.kelas_id = k.id AND ts.tugas_id = ?");
        $statement->execute([$tugas_id]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
        return $result;
    }

    public function getTugasUserWithTugasJudulAndUserById(int $tugasUser_id): ?array
    {
        $statement = $this->connection->prepare("SELECT ts.id, ts.user_id, ts.tugas_id, ts.kumpulkan_at, ts.link_file_pengumpulan, ts.catatan, t.judul , u.nama AS user_name, u.semester_id AS semester, u.link_foto, k.nama AS kelas_name FROM users u, tugas_user ts, tugas t, kelas k WHERE t.id = ts.tugas_id AND ts.user_id = u.id AND k.id = u.kelas_id AND ts.id = ?");
        $statement->execute([$tugasUser_id]);
        if($row = $statement->fetch()){
            return $row;
        }
        return null;
    }
}