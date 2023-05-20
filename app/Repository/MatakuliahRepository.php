<?php

namespace CobaMVC\Repository;

use CobaMVC\Domain\Matakuliah;
use CobaMVC\Domain\MatakuliahKelas;

require_once __DIR__ . "/../Domain/Matakuliah.php";
require_once __DIR__ . "/../Domain/MatakuliahKelas.php";

class MatakuliahRepository
{
    private \PDO $connection;

    public function  __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function create(Matakuliah $matakuliah): void
    {
        $statement = $this->connection->prepare("INSERT INTO pelajaran(nama, dosen_id, hari, jam_mulai, jam_selesai, ruangan) VALUES (?, ?, ?, ?, ?, ?)");
        $statement->execute([
            $matakuliah->nama, $matakuliah->dosen_id, $matakuliah->hari, $matakuliah->jam_mulai, $matakuliah->jam_selesai, $matakuliah->ruangan
        ]);
    }

    public function getAllWithDosenName(): array
    {
        $statement = $this->connection->prepare("SELECT p.id, p.nama, p.dosen_id, p.hari, p.jam_mulai, p.jam_selesai, p.ruangan, u.nama AS nama_dosen FROM pelajaran p, users u WHERE u.id = p.dosen_id");
        $statement->execute();
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $matakuliah['id'] = $row['id'];
            $matakuliah['nama'] = $row['nama'];
            $matakuliah['dosen_id'] = $row['dosen_id'];
            $matakuliah['hari'] = $row['hari'];
            $matakuliah['jam_mulai'] = $row['jam_mulai'];
            $matakuliah['jam_selesai'] = $row['jam_selesai'];
            $matakuliah['ruangan'] = $row['ruangan'];
            $matakuliah['nama_dosen'] = $row['nama_dosen'];
            $result[] = $matakuliah;
        }
        return $result;
    }

    public function getById(int $id): ?Matakuliah
    {
        $statement = $this->connection->prepare("SELECT id, nama, dosen_id, hari, jam_mulai, jam_selesai, ruangan FROM pelajaran WHERE id = ?");
        $statement->execute([$id]);
        if ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $matakuliah = new Matakuliah();
            $matakuliah->id = $row['id'];
            $matakuliah->nama = $row['nama'];
            $matakuliah->dosen_id = $row['dosen_id'];
            $matakuliah->hari = $row['hari'];
            $matakuliah->jam_mulai = $row['jam_mulai'];
            $matakuliah->jam_selesai = $row['jam_selesai'];
            $matakuliah->ruangan = $row['ruangan'];
            return $matakuliah;
        }
        return null;
    }

    public function tambahKelas(MatakuliahKelas $matakuliahKelas): void
    {
        $statement = $this->connection->prepare("INSERT INTO pelajaran_kelas(kelas_id, pelajaran_id, semester_id) VALUES (?, ?, ?)");
        $statement->execute([
            $matakuliahKelas->kelas_id, $matakuliahKelas->pelajaran_id, $matakuliahKelas->semester_id
        ]);
    }

    public function checkKelasInMatakuliah(MatakuliahKelas $matakuliahKelas): bool
    {
        $statement = $this->connection->prepare("SELECT id FROM pelajaran_kelas WHERE kelas_id = ? AND pelajaran_id = ? AND semester_id = ?");
        $statement->execute([
            $matakuliahKelas->kelas_id, $matakuliahKelas->pelajaran_id, $matakuliahKelas->semester_id
        ]);
        if ($statement->fetch(\PDO::FETCH_ASSOC)){
            return true;
        }
        return false;
    }

    public function getKelasYangMengikutiById(int $id): ?array
    {
        $statement = $this->connection->prepare("SELECT k.id, k.nama, j.nama AS jurusan, pk.semester_id FROM pelajaran_kelas pk, kelas k, jurusan j WHERE pk.pelajaran_id = ? AND pk.kelas_id = k.id AND k.jurusan_id = j.id");
        $statement->execute([$id]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $kelas['id'] = $row['id'];
            $kelas['nama'] = $row['nama'];
            $kelas['jurusan'] = $row['jurusan'];
            $kelas['semester'] = $row['semester_id'];
            $result[] = $kelas;
        }
        return $result;
    }

    public function getMatakuliahYangDiikutiWithDosen(int $kelas_id, int $semester_id): ?array
    {
        $statement = $this->connection->prepare("SELECT p.id, p.nama, p.dosen_id, p.hari, p.jam_mulai, p.jam_selesai, p.ruangan, u.nama AS nama_dosen, u.link_foto AS foto_dosen  FROM pelajaran p, pelajaran_kelas pk, users u WHERE p.id = pk.pelajaran_id AND u.id = p.dosen_id AND pk.semester_id = ? AND pk.kelas_id = ?");
        $statement->execute([$semester_id, $kelas_id]);
        $result=[];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $matakuliah['id'] = $row['id'];
            $matakuliah['nama'] = $row['nama'];
            $matakuliah['dosen_id'] = $row['dosen_id'];
            $matakuliah['hari'] = $row['hari'];
            $matakuliah['jam_mulai'] = $row['jam_mulai'];
            $matakuliah['jam_selesai'] = $row['jam_selesai'];
            $matakuliah['ruangan'] = $row['ruangan'];
            $matakuliah['nama_dosen'] = $row['nama_dosen'];
            $matakuliah['foto_dosen'] = $row['foto_dosen'];
            $result[]= $matakuliah;
        }
        return $result;
    }

    public function getMatakuliahYangDiikutiWithDosenByUserId(int $user_id, int $semester_id): ?array
    {
        $statement = $this->connection->prepare("SELECT p.id, p.nama, p.dosen_id, p.hari, p.jam_mulai, p.jam_selesai, p.ruangan, d.nama AS nama_dosen, d.link_foto AS foto_dosen  FROM pelajaran p, pelajaran_kelas pk, users d, users u WHERE p.id = pk.pelajaran_id AND d.id = p.dosen_id AND pk.kelas_id = u.kelas_id AND pk.semester_id = ? AND u.id = ?");
        $statement->execute([$semester_id, $user_id]);
        $result=[];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $matakuliah['id'] = $row['id'];
            $matakuliah['nama'] = $row['nama'];
            $matakuliah['dosen_id'] = $row['dosen_id'];
            $matakuliah['hari'] = $row['hari'];
            $matakuliah['jam_mulai'] = $row['jam_mulai'];
            $matakuliah['jam_selesai'] = $row['jam_selesai'];
            $matakuliah['ruangan'] = $row['ruangan'];
            $matakuliah['nama_dosen'] = $row['nama_dosen'];
            $matakuliah['foto_dosen'] = $row['foto_dosen'];
            $result[]= $matakuliah;
        }
        return $result;
    }

    public function getMatakuliahYangDiajar(int $dosen_id): array
    {
        $statement = $this->connection->prepare("SELECT id, nama, dosen_id, hari, jam_mulai, jam_selesai, ruangan FROM pelajaran WHERE dosen_id = ?");
        $statement->execute([$dosen_id]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $matakuliah = new Matakuliah();
            $matakuliah->id = $row['id'];
            $matakuliah->nama = $row['nama'];
            $matakuliah->dosen_id = $row['dosen_id'];
            $matakuliah->hari = $row['hari'];
            $matakuliah->jam_mulai = $row['jam_mulai'];
            $matakuliah->jam_selesai = $row['jam_selesai'];
            $matakuliah->ruangan = $row['ruangan'];
            $result[]= $matakuliah;
        }
        return $result;
    }

    public function getAllWithCertainKelasWithDosenName(int $kelas_id, int $semester): array
    {
        $statement = $this->connection->prepare("SELECT p.id, p.nama, p.dosen_id, p.hari, p.jam_mulai, p.jam_selesai, p.ruangan, u.nama AS dosen_name FROM pelajaran p, pelajaran_kelas pk, users u WHERE pk.pelajaran_id = p.id AND u.id = p.dosen_id AND pk.kelas_id = ? AND pk.semester_id = ?");
        $statement->execute([$kelas_id, $semester]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $result[]= $row;
        }
        return $result;
    }
}