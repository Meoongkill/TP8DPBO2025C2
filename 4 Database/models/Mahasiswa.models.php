<?php

class Mahasiswa extends DB
{
    function getMahasiswa()
    {
        $query = "SELECT * FROM mahasiswa";
        return $this->execute($query);
    }

    function AddMahasiswa($data)
    {
        // Lengkapi Query
        $nim = $data['nim'];
        $nama = $data['nama'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_dosen_wali = $data['id_dosen_wali'];
        $query = "INSERT INTO mahasiswa (nim, nama, phone, join_date, id_dosen_wali) VALUES ('$nim', '$nama', '$phone', '$join_date', '$id_dosen_wali')";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditMahasiswa ($id, $data)
    {
        // Lengkapi Query
        $nim = $data['nim'];
        $nama = $data['nama'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_dosen_wali = $data['id_dosen_wali'];
        $query = "UPDATE mahasiswa SET nim='$nim', nama = '$nama', phone='$phone', join_date='$join_date', id_dosen_wali='$id_dosen_wali' WHERE id='$id'";
        
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