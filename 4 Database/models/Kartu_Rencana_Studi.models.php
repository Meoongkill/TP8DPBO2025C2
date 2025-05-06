<?php

class Kartu_Rencana_Studi extends DB
{
    function getKartuRencanaStudi()
    {
        $query = "SELECT * FROM kartu_rencana_studi";
        return $this->execute($query);
    }

    function AddKartuRencanaStudi($data)
    {
        // Lengkapi Query
        $tahun_akademik = $data['tahun_akademik'];
        $semester = $data['semester'];
        $id_mahasiswa = $data['id_mahasiswa'];
        $id_mata_kuliah = $data['id_mata_kuliah'];
        $query = "INSERT INTO kartu_rencana_studi (tahun_akademik, semester, id_mahasiswa, id_mata_kuliah) VALUES ('$tahun_akademik', '$semester', '$id_mahasiswa', '$id_mata_kuliah')";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditKartuRencanaStudi ($id, $data)
    {
        // Lengkapi Query
        $tahun_akademik = $data['tahun_akademik'];
        $semester = $data['semester'];
        $id_mahasiswa = $data['id_mahasiswa'];
        $id_mata_kuliah = $data['id_mata_kuliah'];
        $query = "UPDATE kartu_rencana_studi SET tahun_akademik='$tahun_akademik', semester='$semester', id_mahasiswa='$id_mahasiswa', id_mata_kuliah='$id_mata_kuliah' WHERE id='$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function DeleteKartuRencanaStudi($id)
    {
        // Lengkapi Query
        $query = "DELETE FROM kartu_rencana_studi WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusKartuRencanaStudi($id)
    {
        $status = $this->getKartuRencanaStudiById($id)['status'];
        $newStatus = $status == 0 ? 1 : 0;
        
        $query = "UPDATE kartu_rencana_studi SET status=$newStatus WHERE id=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function getKartuRencanaStudiById($id)
    {
        $query = "SELECT * FROM kartu_rencana_studi WHERE id=$id";
        $this->execute($query);
        return $this->getResult();
    }
}
?>