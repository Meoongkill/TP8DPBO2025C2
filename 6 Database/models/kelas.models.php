<?php

class kelas extends DB
{
    function getKelas()
    {
        $query = "SELECT * FROM kelas";
        return $this->execute($query);
    }

    function AddKelas($data)
    {
        // Lengkapi Query
        $Nama_Kelas = $data['Nama_Kelas'];
        $ID_Mata_Kuliah = $data['ID_Mata_Kuliah'];
        $Tahun_Akademik = $data['Tahun_Akademik'];
        $query = "INSERT INTO kelas (Nama_Kelas, ID_Mata_Kuliah, Tahun_Akademik) VALUES ('$Nama_Kelas', '$ID_Mata_Kuliah', '$Tahun_Akademik')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditKelas($id, $data)
    {
        // Lengkapi Query
        $Nama_Kelas = $data['Nama_Kelas'];
        $ID_Mata_Kuliah = $data['ID_Mata_Kuliah'];
        $Tahun_Akademik = $data['Tahun_Akademik'];
        $query = "UPDATE kelas SET Nama_Kelas='$Nama_Kelas', ID_Mata_Kuliah='$ID_Mata_Kuliah', Tahun_Akademik='$Tahun_Akademik' WHERE id='$id'";

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