<?php

class krs extends DB
{
    function getKRS()
    {
        $query = "SELECT * FROM krs";
        return $this->execute($query);
    }

    function AddKRS($data)
    {
        // Lengkapi Query
        $ID_Mahasiswa = $data['ID_Mahasiswa'];
        $ID_Mata_Kuliah = $data['ID_Mata_Kuliah'];
        $Kode_Mata_Kuliah = $data['Kode_Mata_Kuliah'];
        $Nama_Mata_Kuliah = $data['Nama_Mata_Kuliah'];
        $Semester = $data['Semester'];
        $Nilai_Akhir = $data['Nilai_Akhir'];
        $query = "INSERT INTO krs (ID_Mahasiswa, ID_Mata_Kuliah, Kode_Mata_Kuliah, Nama_Mata_Kuliah, Semester, Nilai_Akhir) VALUES ('$ID_Mahasiswa', '$ID_Mata_Kuliah', '$Kode_Mata_Kuliah', '$Nama_Mata_Kuliah', '$Semester', '$Nilai_Akhir')";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditKRS ($id, $data)
    {
        // Lengkapi Query
        $ID_Mahasiswa = $data['ID_Mahasiswa'];
        $ID_Mata_Kuliah = $data['ID_Mata_Kuliah'];
        $Kode_Mata_Kuliah = $data['Kode_Mata_Kuliah'];
        $Nama_Mata_Kuliah = $data['Nama_Mata_Kuliah'];
        $Semester = $data['Semester'];
        $Nilai_Akhir = $data['Nilai_Akhir'];
        $query = "UPDATE krs SET ID_Mahasiswa='$ID_Mahasiswa', ID_Mata_Kuliah='$ID_Mata_Kuliah', Kode_Mata_Kuliah='$Kode_Mata_Kuliah', Nama_Mata_Kuliah='$Nama_Mata_Kuliah', Semester='$Semester', Nilai_Akhir='$Nilai_Akhir' WHERE id='$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function DeleteKRS($id)
    {
        // Lengkapi Query
        $query = "DELETE FROM krs WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusKRS($id)
    {
        $status = $this->getKRSById($id)['status'];
        $newStatus = $status == 0 ? 1 : 0;
        
        $query = "UPDATE krs SET status=$newStatus WHERE id=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function getKRSById($id)
    {
        $query = "SELECT * FROM krs WHERE id=$id";
        $this->execute($query);
        return $this->getResult();
    }
}
?>