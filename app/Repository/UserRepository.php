<?php

namespace CobaMVC\Repository;

use CobaMVC\Domain\User;

require_once __DIR__ . "/../Domain/User.php";

class UserRepository
{
    private \PDO $connection;

    public function  __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(User $user): User
    {
        $statement = $this->connection->prepare("INSERT INTO users(nama, email, password) VALUES (?, ?, ?)");
        $statement->execute([
            $user->nama, $user->email, $user->password
        ]);
        return $user;
    }

    public function findByEmail(string $email): ?User
    {
        $statement = $this->connection->prepare("SELECT id, nama, email, password, role_id, kelas_id, tanggal_lahir, tempat_lahir, jenis_kelamin, domisili, jurusan_id, link_foto, approved_at, semester_id FROM users WHERE email = ?");
        $statement->execute([$email]);
        if($row = $statement->fetch()){
            $user = new User();
            $user->id = $row['id'];
            $user->nama = $row['nama'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->role_id = $row['role_id'];
            $user->kelas_id = $row['kelas_id'];
            $user->tanggal_lahir = $row['tanggal_lahir'] ? new \DateTime($row['tanggal_lahir']) : null;
            $user->tempat_lahir = $row['tempat_lahir'];
            $user->jenis_kelamin = $row['jenis_kelamin'];
            $user->domisili = $row['domisili'];
            $user->jurusan_id = $row['jurusan_id'];
            $user->link_foto = $row['link_foto'];
            $user->approved_at = $row['approved_at'] ? new \DateTime($row['approved_at']) : null;
            $user->semester_id = $row['semester_id'];
            return $user;
        } else {
            return null;
        }
    }

    public function findById(int $id): ?User
    {
        $statement = $this->connection->prepare("SELECT id, nama, email, password, role_id, kelas_id, tanggal_lahir, tempat_lahir, jenis_kelamin, domisili, jurusan_id, link_foto, approved_at, semester_id FROM users WHERE id = ?");
        $statement->execute([$id]);
        if($row = $statement->fetch()){
            $user = new User();
            $user->id = $row['id'];
            $user->nama = $row['nama'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->role_id = $row['role_id'];
            $user->kelas_id = $row['kelas_id'];
            $user->tanggal_lahir = $row['tanggal_lahir'] ? new \DateTime($row['tanggal_lahir']) : null;
            $user->tempat_lahir = $row['tempat_lahir'];
            $user->jenis_kelamin = $row['jenis_kelamin'];
            $user->domisili = $row['domisili'];
            $user->jurusan_id = $row['jurusan_id'];
            $user->link_foto = $row['link_foto'];
            $user->approved_at = $row['approved_at'] ? new \DateTime($row['approved_at']) : null;
            $user->semester_id = $row['semester_id'];
            return $user;
        } else {
            return null;
        }
    }

    public function getRoleById(int $id): ?string
    {
        $statement = $this->connection->prepare("SELECT roles.nama FROM users, roles WHERE users.id = ? AND roles.id = users.role_id");
        $statement->execute([$id]);
        if($row = $statement->fetch()){
            return $row['nama'];
        }
        return null;
    }

    public function getAllUserWithNoRole(): array
    {
        $statement = $this->connection->prepare("SELECT id, nama, email, password, role_id, kelas_id, tanggal_lahir, tempat_lahir, jenis_kelamin, domisili, jurusan_id, link_foto, approved_at, semester_id FROM users WHERE role_id IS NULL ");
        $statement->execute();
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $user = new User();
            $user->id = $row['id'];
            $user->nama = $row['nama'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->role_id = $row['role_id'];
            $user->kelas_id = $row['kelas_id'];
            $user->tanggal_lahir = $row['tanggal_lahir'] ? new \DateTime($row['tanggal_lahir']) : null;
            $user->tempat_lahir = $row['tempat_lahir'];
            $user->jenis_kelamin = $row['jenis_kelamin'];
            $user->domisili = $row['domisili'];
            $user->jurusan_id = $row['jurusan_id'];
            $user->link_foto = $row['link_foto'];
            $user->approved_at = $row['approved_at'] ? new \DateTime($row['approved_at']) : null;
            $user->semester_id = $row['semester_id'];
            $result[]=$user;
        }
        return $result;
    }

    public function getAllUserWithCertainRole(int $role_id): array
    {
        $statement = $this->connection->prepare("SELECT id, nama, email, password, role_id, kelas_id, tanggal_lahir, tempat_lahir, jenis_kelamin, domisili, jurusan_id, link_foto, approved_at, semester_id FROM users WHERE role_id = ?");
        $statement->execute([$role_id]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $user = new User();
            $user->id = $row['id'];
            $user->nama = $row['nama'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->role_id = $row['role_id'];
            $user->kelas_id = $row['kelas_id'];
            $user->tanggal_lahir = $row['tanggal_lahir'] ? new \DateTime($row['tanggal_lahir']) : null;
            $user->tempat_lahir = $row['tempat_lahir'];
            $user->jenis_kelamin = $row['jenis_kelamin'];
            $user->domisili = $row['domisili'];
            $user->jurusan_id = $row['jurusan_id'];
            $user->link_foto = $row['link_foto'];
            $user->approved_at = $row['approved_at'] ? new \DateTime($row['approved_at']) : null;
            $user->semester_id = $row['semester_id'];
            $result[]=$user;
        }
        return $result;
    }

    public function getAllUserWithCertainKelas(int $kelas_id): array
    {
        $statement = $this->connection->prepare("SELECT id, nama, email, password, role_id, kelas_id, tanggal_lahir, tempat_lahir, jenis_kelamin, domisili, jurusan_id, link_foto, approved_at, semester_id FROM users WHERE kelas_id = ?");
        $statement->execute([$kelas_id]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $user = new User();
            $user->id = $row['id'];
            $user->nama = $row['nama'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->role_id = $row['role_id'];
            $user->kelas_id = $row['kelas_id'];
            $user->tanggal_lahir = $row['tanggal_lahir'] ? new \DateTime($row['tanggal_lahir']) : null;
            $user->tempat_lahir = $row['tempat_lahir'];
            $user->jenis_kelamin = $row['jenis_kelamin'];
            $user->domisili = $row['domisili'];
            $user->jurusan_id = $row['jurusan_id'];
            $user->link_foto = $row['link_foto'];
            $user->approved_at = $row['approved_at'] ? new \DateTime($row['approved_at']) : null;
            $user->semester_id = $row['semester_id'];
            $result[]=$user;
        }
        return $result;
    }

    public function getAllUserWithCertainMatakuliah(int $matakuliah_id): array
    {
        $statement = $this->connection->prepare("SELECT u.id, u.nama, u.email, u.password, u.role_id, u.kelas_id, u.tanggal_lahir, u.tempat_lahir, u.jenis_kelamin, u.domisili, u.jurusan_id, u.link_foto, u.approved_at, u.semester_id FROM users u, pelajaran p, pelajaran_kelas pk WHERE u.kelas_id = pk.kelas_id AND pk.pelajaran_id = p.id AND p.id = ?");
        $statement->execute([$matakuliah_id]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $user = new User();
            $user->id = $row['id'];
            $user->nama = $row['nama'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->role_id = $row['role_id'];
            $user->kelas_id = $row['kelas_id'];
            $user->tanggal_lahir = $row['tanggal_lahir'] ? new \DateTime($row['tanggal_lahir']) : null;
            $user->tempat_lahir = $row['tempat_lahir'];
            $user->jenis_kelamin = $row['jenis_kelamin'];
            $user->domisili = $row['domisili'];
            $user->jurusan_id = $row['jurusan_id'];
            $user->link_foto = $row['link_foto'];
            $user->approved_at = $row['approved_at'] ? new \DateTime($row['approved_at']) : null;
            $user->semester_id = $row['semester_id'];
            $result[]=$user;
        }
        return $result;
    }

    public function getAllApprovedUser(): array
    {
        $statement = $this->connection->prepare("SELECT id, nama, email, password, role_id, kelas_id, tanggal_lahir, tempat_lahir, jenis_kelamin, domisili, jurusan_id, link_foto, approved_at, semester_id FROM users WHERE role_id IS NOT NULL AND approved_at IS NOT NULL ORDER BY id");
        $statement->execute();
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $user = new User();
            $user->id = $row['id'];
            $user->nama = $row['nama'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->role_id = $row['role_id'];
            $user->kelas_id = $row['kelas_id'];
            $user->tanggal_lahir = $row['tanggal_lahir'] ? new \DateTime($row['tanggal_lahir']) : null;
            $user->tempat_lahir = $row['tempat_lahir'];
            $user->jenis_kelamin = $row['jenis_kelamin'];
            $user->domisili = $row['domisili'];
            $user->jurusan_id = $row['jurusan_id'];
            $user->link_foto = $row['link_foto'];
            $user->approved_at = $row['approved_at'] ? new \DateTime($row['approved_at']) : null;
            $user->semester_id = $row['semester_id'];
            $result[]=$user;
        }
        return $result;
    }

    public function updateUserData(User $user): void
    {
        $statement = $this->connection->prepare("UPDATE users SET id = ?, nama = ?, email = ?, password = ?, role_id = ?, kelas_id = ?, tanggal_lahir = ?, tempat_lahir = ?, jenis_kelamin = ?, domisili = ?, jurusan_id = ?, link_foto = ?, approved_at = ?, semester_id = ? WHERE id = ?");
        $statement->execute([
            $user->id,
            $user->nama,
            $user->email,
            $user->password,
            $user->role_id,
            $user->kelas_id,
            $user->tanggal_lahir ? $user->tanggal_lahir->format('Y-m-d') : null,
            $user->tempat_lahir,
            $user->jenis_kelamin,
            $user->domisili,
            $user->jurusan_id,
            $user->link_foto,
            $user->approved_at ? $user->approved_at->format('Y-m-d') : null,
            $user->semester_id,
            $user->id
        ]);
    }
}