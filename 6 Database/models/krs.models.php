<?php

class krs extends DB
{
    function getKartuRencanaStudi()
    {
        $query = "SELECT * FROM krs";
        return $this->execute($query);
    }

    function AddKartuRencanaStudi($data)
    {
        // Lengkapi Query
        $ID_Mahasiswa = $data['ID_Mahasiswa'];
        $ID_Mata_Kuliah = $data['ID_Mata_Kuliah'];
        $Tahun_Akademik = $data['Tahun_Akademik'];
        $Semester = $data['Semester'];
        $query = "INSERT INTO krs (ID_Mahasiswa, ID_Mata_Kuliah, Tahun_Akademik, Semester) VALUES ('$ID_Mahasiswa', '$ID_Mata_Kuliah', '$Tahun_Akademik', '$Semester')";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditKartuRencanaStudi ($id, $data)
    {
        // Lengkapi Query
        $ID_Mahasiswa = $data['ID_Mahasiswa'];
        $ID_Mata_Kuliah = $data['ID_Mata_Kuliah'];
        $Tahun_Akademik = $data['Tahun_Akademik'];
        $Semester = $data['Semester'];
        $query = "UPDATE krs SET ID_Mahasiswa='$ID_Mahasiswa', ID_Mata_Kuliah='$ID_Mata_Kuliah', Tahun_Akademik='$Tahun_Akademik', Semester='$Semester' WHERE id='$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function DeleteKartuRencanaStudi($id)
    {
        // Lengkapi Query
        $query = "DELETE FROM krs WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusKartuRencanaStudi($id)
    {
        $status = $this->getKartuRencanaStudiById($id)['status'];
        $newStatus = $status == 0 ? 1 : 0;
        
        $query = "UPDATE krs SET status=$newStatus WHERE id=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function getKartuRencanaStudiById($id)
    {
        $query = "SELECT * FROM krs WHERE id=$id";
        $this->execute($query);
        return $this->getResult();
    }
}
?>