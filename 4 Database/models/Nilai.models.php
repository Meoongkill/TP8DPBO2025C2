<?php

class Nilai extends DB
{
    function getNilai()
    {
        $query = "SELECT * FROM nilai";
        return $this->execute($query);
    }

    function AddNilai($data)
    {
        // Lengkapi Query
        $nilai_akhir = $data['nilai_akhir'];
        $grade = $data['grade'];
        $id_mahasiswa = $data['id_mahasiswa'];
        $id_mata_kuliah = $data['id_mata_kuliah'];
        $query = "INSERT INTO nilai (nilai_akhir, grade, id_mahasiswa, id_mata_kuliah) VALUES ('$nilai_akhir', '$grade', '$id_mahasiswa', '$id_mata_kuliah')";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditNilai ($id, $data)
    {
        // Lengkapi Query
        $nilai_akhir = $data['nilai_akhir'];
        $grade = $data['grade'];
        $id_mahasiswa = $data['id_mahasiswa'];
        $id_mata_kuliah = $data['id_mata_kuliah'];
        $query = "UPDATE nilai SET nilai_akhir='$nilai_akhir', grade='$grade', id_mahasiswa='$id_mahasiswa', id_mata_kuliah='$id_mata_kuliah' WHERE id='$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function DeleteNilai($id)
    {
        // Lengkapi Query
        $query = "DELETE FROM nilai WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusNilai($id)
    {
        $status = $this->getNilaiById($id)['status'];
        $newStatus = $status == 0 ? 1 : 0;
        
        $query = "UPDATE nilai SET status=$newStatus WHERE id=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function getNilaiById($id)
    {
        $query = "SELECT * FROM nilai WHERE id=$id";
        $this->execute($query);
        return $this->getResult();
    }
}
?>