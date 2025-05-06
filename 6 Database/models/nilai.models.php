<?php

class nilai extends DB
{
    function getNilai()
    {
        $query = "SELECT * FROM nilai";
        return $this->execute($query);
    }

    function AddNilai($data)
    {
        // Lengkapi Query
        $ID_Mahasiswa = $data['ID_Mahasiswa'];
        $ID_Mata_Kuliah = $data['ID_Mata_Kuliah'];
        $Nilai_Akhir = $data['Nilai_Akhir'];
        $Grade = $data['Grade'];
        $query = "INSERT INTO nilai (ID_Mahasiswa, ID_Mata_Kuliah, Nilai_Akhir, Grade) VALUES ('$ID_Mahasiswa', '$ID_Mata_Kuliah', '$Nilai_Akhir', '$Grade')";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function EditNilai ($id, $data)
    {
        // Lengkapi Query
        $ID_Mahasiswa = $data['ID_Mahasiswa'];
        $ID_Mata_Kuliah = $data['ID_Mata_Kuliah'];
        $Nilai_Akhir = $data['Nilai_Akhir'];
        $Grade = $data['Grade'];
        $query = "UPDATE nilai SET ID_Mahasiswa='$ID_Mahasiswa', ID_Mata_Kuliah='$ID_Mata_Kuliah', Nilai_Akhir='$Nilai_Akhir', Grade='$Grade' WHERE id='$id'";
        
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