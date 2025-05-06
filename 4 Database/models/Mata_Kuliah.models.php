<?php

class Mata_Kuliah extends DB
{
    function getMataKuliah()
    {
        $query = "SELECT * FROM mata_kuliah";
        return $this->execute($query);
    }

    function AddMataKuliah($data)
    {
        // Lengkapi Query
        $kode_mata_kuliah = $data['kode_mata_kuliah'];
        $nama_mata_kuliah = $data['nama_mata_kuliah'];
        $peruntukkan_semester_mata_kuliah = $data['peruntukkan_semester_mata_kuliah'];
        $pengampu_mata_kuliah = $data['pengampu_mata_kuliah'];
        $query = "INSERT INTO mata_kuliah (kode_mata_kuliah, nama_mata_kuliah, peruntukkan_semester_mata_kuliah, pengampu_mata_kuliah) VALUES ('$kode_mata_kuliah', '$nama_mata_kuliah', '$peruntukkan_semester_mata_kuliah', '$pengampu_mata_kuliah')";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditMataKuliah($id, $data)
    {
        // Lengkapi Query
        $kode_mata_kuliah = $data['kode_mata_kuliah'];
        $nama_mata_kuliah = $data['nama_mata_kuliah'];
        $peruntukkan_semester_mata_kuliah = $data['peruntukkan_semester_mata_kuliah'];
        $pengampu_mata_kuliah = $data['pengampu_mata_kuliah'];
        $query = "UPDATE mata_kuliah SET kode_mata_kuliah='$kode_mata_kuliah', nama_mata_kuliah='$nama_mata_kuliah', peruntukkan_semester_mata_kuliah='$peruntukkan_semester_mata_kuliah', pengampu_mata_kuliah='$pengampu_mata_kuliah' WHERE id='$id'";
        
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