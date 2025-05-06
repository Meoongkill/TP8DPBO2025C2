<?php

class Dosen_Wali extends DB
{
    function getDosenWali()
    {
        $query = "SELECT * FROM dosen_wali";
        return $this->execute($query);
    }

    function AddDosenWali($data)
    {
        // Lengkapi Query
        $nama_dosen_wali = $data['nama_dosen_wali'];
        $jabatan_dosen_wali = $data['jabatan_dosen_wali'];
        $peruntukan_semester_dosen_wali = $data['$peruntukan_semester_dosen_wali'];
        $query = "INSERT INTO dosen_wali (nama_dosen_wali, jabatan_dosen_wali,$peruntukan_semester_dosen_wali) VALUES ('$nama_dosen_wali', '$jabatan_dosen_wali', '$peruntukan_semester_dosen_wali')";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditDosenWali ($id, $data)
    {
        // Lengkapi Query
        $nama_dosen_wali = $data['nama_dosen_wali'];
        $jabatan_dosen_wali = $data['jabatan_dosen_wali'];
        $peruntukan_semester_dosen_wali = $data['$peruntukan_semester_dosen_wali'];
        $query = "UPDATE dosen_wali SET nama_dosen_wali='$nama_dosen_wali', jabatan_dosen_wali='$jabatan_dosen_wali',$peruntukan_semester_dosen_wali='$peruntukan_semester_dosen_wali' WHERE id='$id'";
        
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