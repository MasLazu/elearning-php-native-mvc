<?php

namespace CobaMVC\Repository;

use CobaMVC\Domain\Nilai;

require_once __DIR__ . "/../Domain/Nilai.php";

class NilaiRepository
{
    private \PDO $connection;

    public function  __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Nilai $nilai): void
    {
        $statement = $this->connection->prepare("INSERT INTO nilai(pelajaran_id, user_id, nilai_1, nilai_2, nilai_3, nilai_4, nilai_5, nilai_uts, nilai_6, nilai_7, nilai_8, nilai_9, nilai_10, nilai_uas) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute([
            $nilai->pelajaran_id, $nilai->user_id, $nilai->nilai_1, $nilai->nilai_2, $nilai->nilai_3, $nilai->nilai_4, $nilai->nilai_5, $nilai->nilai_uts, $nilai->nilai_6, $nilai->nilai_7, $nilai->nilai_8, $nilai->nilai_9, $nilai->nilai_10, $nilai->nilai_uas
        ]);
    }

    public function getById(int $nilai_id): ?Nilai
    {
        $statement = $this->connection->prepare("SELECT id, pelajaran_id, user_id, nilai_1, nilai_2, nilai_3, nilai_4, nilai_5, nilai_uts, nilai_6, nilai_7, nilai_8, nilai_9, nilai_10, nilai_uas FROM nilai WHERE id = ?");
        $statement->execute([$nilai_id]);
        if($row = $statement->fetch()) {
            $nilai = new Nilai();
            $nilai->id = $row['id'];
            $nilai->pelajaran_id = $row['pelajaran_id'];
            $nilai->user_id = $row['user_id'];
            $nilai->nilai_1 = $row['nilai_1'];
            $nilai->nilai_2 = $row['nilai_2'];
            $nilai->nilai_3 = $row['nilai_3'];
            $nilai->nilai_4 = $row['nilai_4'];
            $nilai->nilai_5 = $row['nilai_5'];
            $nilai->nilai_uts = $row['nilai_uts'];
            $nilai->nilai_6 = $row['nilai_6'];
            $nilai->nilai_7 = $row['nilai_7'];
            $nilai->nilai_8 = $row['nilai_8'];
            $nilai->nilai_9 = $row['nilai_9'];
            $nilai->nilai_10 = $row['nilai_10'];
            $nilai->nilai_uas = $row['nilai_uas'];
            return $nilai;
        }
        return null;
    }

    public function update(Nilai $nilai): void
    {
        $statement = $this->connection->prepare("UPDATE nilai SET pelajaran_id = ?, user_id = ?, nilai_1 = ?, nilai_2 = ?, nilai_3 = ?, nilai_4 = ?, nilai_5 = ?, nilai_uts = ?, nilai_6 = ?, nilai_7 = ?, nilai_8 = ?, nilai_9 = ?, nilai_10 = ?, nilai_uas = ? WHERE id = ?");
        $statement->execute([
            $nilai->pelajaran_id, $nilai->user_id, $nilai->nilai_1, $nilai->nilai_2, $nilai->nilai_3, $nilai->nilai_4, $nilai->nilai_5, $nilai->nilai_uts, $nilai->nilai_6, $nilai->nilai_7, $nilai->nilai_8, $nilai->nilai_9, $nilai->nilai_10, $nilai->nilai_uas, $nilai->id
        ]);
    }

    public function getRekapNilaiData(int $matakuliah_id): array
    {
        $statement = $this->connection->prepare("SELECT u.id AS user_id, u.nama AS user_name, n.id AS nilai_id, n.pelajaran_id, n.nilai_1, n.nilai_2, n.nilai_3, n.nilai_4, n.nilai_5, n.nilai_uts, n.nilai_6, n.nilai_7, n.nilai_8, n.nilai_9, n.nilai_10, n.nilai_uas FROM (SELECT u.* FROM users u, pelajaran p, pelajaran_kelas pk, nilai n WHERE u.kelas_id = pk.kelas_id AND u.semester_id = pk.semester_id GROUP BY u.id, u.nama) u JOIN pelajaran_kelas pk ON u.kelas_id = pk.kelas_id AND u.semester_id = pk.semester_id JOIN pelajaran p ON pk.pelajaran_id = p.id AND p.id = ? LEFT JOIN nilai n ON u.id = n.user_id AND n.pelajaran_id = ? WHERE (n.pelajaran_id = ? OR n.pelajaran_id IS NULL) GROUP BY u.id, u.nama, n.id, n.pelajaran_id, n.nilai_1, n.nilai_2, n.nilai_3, n.nilai_4, n.nilai_5, n.nilai_uts, n.nilai_6, n.nilai_7, n.nilai_8, n.nilai_9, n.nilai_10, n.nilai_uas ORDER BY u.id;");
        $statement->execute([$matakuliah_id, $matakuliah_id, $matakuliah_id]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
        return $result;
    }

    public function getMahasiswaNilaiData(int $mahasiswa_id, int $semester): array
    {
        $statement = $this->connection->prepare("select n.*, p.id as pelajaran_id, p.nama as pelajaran_name from users u join kelas k on u.kelas_id = k.id join pelajaran_kelas pk on k.id = pk.kelas_id and pk.semester_id = ? join pelajaran p on pk.pelajaran_id = p.id left join nilai n on p.id = n.pelajaran_id where u.id = ? and (n.user_id = ? or n.user_id is null) group by u.id, n.id, p.id order by p.id");
        $statement->execute([$semester, $mahasiswa_id, $mahasiswa_id]);
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
        return $result;
    }
}