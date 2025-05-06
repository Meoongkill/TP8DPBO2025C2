<?php

class dosen_wali extends DB
{
    function getDosenWali()
    {
        $query = "SELECT * FROM dosen_wali";
        return $this->execute($query);
    }

    function AddDosenWali($data)
    {
        // Lengkapi Query
        $Nama_Dosen_Wali = $data['Nama_Dosen_Wali'];
        $Jabatan_Dosen_Wali = $data['Jabatan_Dosen_Wali'];
        $Peruntukan_Semester = $data['$Peruntukan_Semester'];
        $query = "INSERT INTO dosen_wali (Nama_Dosen_Wali, Jabatan_Dosen_Wali, $Peruntukan_Semester) VALUES ('$Nama_Dosen_Wali', '$Jabatan_Dosen_Wali', '$Peruntukan_Semester')";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditDosenWali ($id, $data)
    {
        // Lengkapi Query
        $Nama_Dosen_Wali = $data['Nama_Dosen_Wali'];
        $Jabatan_Dosen_Wali = $data['Jabatan_Dosen_Wali'];
        $Peruntukan_Semester = $data['$Peruntukan_Semester'];
        $query = "UPDATE dosen_wali SET Nama_Dosen_Wali='$Nama_Dosen_Wali', Jabatan_Dosen_Wali='$Jabatan_Dosen_Wali', $Peruntukan_Semester='$Peruntukan_Semester' WHERE id='$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function DeleteDosenWali($id)
    {
        // Lengkapi Query
        $query = "DELETE FROM dosen_wali WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusDosenWali($id)
    {
        $status = $this->getDosenWaliById($id)['status'];
        $newStatus = $status == 0 ? 1 : 0;
        
        $query = "UPDATE dosen_wali SET status=$newStatus WHERE id=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }
    
    function getDosenWaliById($id)
    {
        $query = "SELECT * FROM dosen_wali WHERE id=$id";
        $this->execute($query);
        return $this->getResult();
    }
}
?>