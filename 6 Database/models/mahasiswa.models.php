<?php

class mahasiswa extends DB
{
    function getMahasiswa()
    {
        $query = "SELECT * FROM mahasiswa";
        return $this->execute($query);
    }

    function AddMahasiswa($data)
    {
        // Lengkapi Query
        $NIM_Mahasiswa = $data['NIM_Mahasiswa'];
        $Nama_Mahasiswa = $data['Nama_Mahasiswa'];
        $Phone_Mahasiswa = $data['Phone_Mahasiswa'];
        $Join_Date_Mahasiswa = $data['Join_Date_Mahasiswa'];
        $ID_Dosen_Wali = $data['ID_Dosen_Wali'];
        $query = "INSERT INTO mahasiswa (NIM_Mahasiswa, Nama_Mahasiswa, Phone_Mahasiswa, Join_Date_Mahasiswa, ID_Dosen_Wali) VALUES ('$NIM_Mahasiswa', '$Nama_Mahasiswa', '$Phone_Mahasiswa', '$Join_Date_Mahasiswa', '$ID_Dosen_Wali')";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditMahasiswa ($id, $data)
    {
        // Lengkapi Query
        $NIM_Mahasiswa = $data['NIM_Mahasiswa'];
        $Nama_Mahasiswa = $data['Nama_Mahasiswa'];
        $Phone_Mahasiswa = $data['Phone_Mahasiswa'];
        $Join_Date_Mahasiswa = $data['Join_Date_Mahasiswa'];
        $ID_Dosen_Wali = $data['ID_Dosen_Wali'];
        $query = "UPDATE mahasiswa SET NIM_Mahasiswa='$NIM_Mahasiswa', Nama_Mahasiswa = '$Nama_Mahasiswa', Phone_Mahasiswa='$Phone_Mahasiswa', Join_Date_Mahasiswa='$Join_Date_Mahasiswa', ID_Dosen_Wali='$ID_Dosen_Wali' WHERE id='$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function DeleteMahasiswa($id)
    {
        // Lengkapi Query
        $query = "DELETE FROM mahasiswa WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusMahasiswa($id)
    {
        $status = $this->getMahasiswaById($id)['status'];
        $newStatus = $status == 0 ? 1 : 0;
        
        $query = "UPDATE mahasiswa SET status=$newStatus WHERE id=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }
    
    function getMahasiswaById($id)
    {
        $query = "SELECT * FROM mahasiswa WHERE id=$id";
        $this->execute($query);
        return $this->getResult();
    }
}
?>