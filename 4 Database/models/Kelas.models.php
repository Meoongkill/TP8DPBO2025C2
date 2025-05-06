<?php

class Kelas extends DB
{
    function getKelas()
    {
        $query = "SELECT * FROM kelas";
        return $this->execute($query);
    }

    function AddKelas($data)
    {
        // Lengkapi Query
        $nama_kelas = $data['nama_kelas'];
        $tahun_akademik = $data['tahun_akademik'];
        $id_mata_kuliah = $data['id_mata_kuliah'];
        $query = "INSERT INTO kelas (nama_kelas, tahun_akademik, id_mata_kuliah) VALUES ('$nama_kelas', '$tahun_akademik', '$id_mata_kuliah')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditKelas($id, $data)
    {
        // Lengkapi Query
        $nama_kelas = $data['nama_kelas'];
        $tahun_akademik = $data['tahun_akademik'];
        $id_mata_kuliah = $data['id_mata_kuliah'];
        $query = "UPDATE kelas SET nama_kelas='$nama_kelas', tahun_akademik='$tahun_akademik', id_mata_kuliah='$id_mata_kuliah' WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function DeleteKelas($id)
    {
        // Lengkapi Query
        $query = "DELETE FROM kelas WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusKelas($id)
    {
        $status = $this->getKelasById($id)['status'];
        $newStatus = $status == 0 ? 1 : 0;
        
        $query = "UPDATE kelas SET status=$newStatus WHERE id=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }
    function getKelasById($id)
    {
        $query = "SELECT * FROM kelas WHERE id=$id";
        $this->execute($query);
        return $this->getResult();
}
    
}
?>