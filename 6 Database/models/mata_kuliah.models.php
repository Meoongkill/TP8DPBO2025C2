<?php

class mata_kuliah extends DB
{
    function getMataKuliah()
    {
        $query = "SELECT * FROM mata_kuliah";
        return $this->execute($query);
    }

    function AddMataKuliah($data)
    {
        // Lengkapi Query
        $Kode_Mata_Kuliah = $data['Kode_Mata_Kuliah'];
        $Nama_Mata_Kuliah = $data['Nama_Mata_Kuliah'];
        $Semester_Peruntukan = $data['Semester_Peruntukan'];
        $Pengampu_Mata_Kuliah = $data['Pengampu_Mata_Kuliah'];
        $query = "INSERT INTO mata_kuliah (Kode_Mata_Kuliah, Nama_Mata_Kuliah, Semester_Peruntukan, Pengampu_Mata_Kuliah) VALUES ('$Kode_Mata_Kuliah', '$Nama_Mata_Kuliah', '$Semester_Peruntukan', '$Pengampu_Mata_Kuliah')";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditMataKuliah($id, $data)
    {
        // Lengkapi Query
        $Kode_Mata_Kuliah = $data['Kode_Mata_Kuliah'];
        $Nama_Mata_Kuliah = $data['Nama_Mata_Kuliah'];
        $Semester_Peruntukan = $data['Semester_Peruntukan'];
        $Pengampu_Mata_Kuliah = $data['Pengampu_Mata_Kuliah'];
        $query = "UPDATE mata_kuliah SET Kode_Mata_Kuliah='$Kode_Mata_Kuliah', Nama_Mata_Kuliah='$Nama_Mata_Kuliah', Semester_Peruntukan='$Semester_Peruntukan', Pengampu_Mata_Kuliah='$Pengampu_Mata_Kuliah' WHERE id='$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function DeleteMataKuliah($id)
    {
        // Lengkapi Query
        $query = "DELETE FROM mata_kuliah WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function getMataKuliahById($id)
    {
        $query = "SELECT * FROM mata_kuliah WHERE id=$id";
        $this->execute($query);
        return $this->getResult();
    }
}
?>