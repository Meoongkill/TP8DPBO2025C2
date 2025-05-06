<?php
require_once BASE_PATH . '/config/database.php';

class Mahasiswa {
    private $conn;
    private $table_name = "Mahasiswa";

    // Properties
    public $ID_Mahasiswa;
    public $NIM_Mahasiswa;
    public $Nama_Mahasiswa;
    public $Phone_Mahasiswa;

    // Constructor
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // READ all mahasiswa
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY ID_Mahasiswa ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    // READ one mahasiswa
    public function getOne($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE ID_Mahasiswa = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $this->ID_Mahasiswa = $row['ID_Mahasiswa'];
            $this->NIM_Mahasiswa = $row['NIM_Mahasiswa'];
            $this->Nama_Mahasiswa = $row['Nama_Mahasiswa'];
            $this->Phone_Mahasiswa = $row['Phone_Mahasiswa'];
            return true;
        }
        
        return false;
    }

    // CREATE mahasiswa
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET NIM_Mahasiswa = :nim, 
                      Nama_Mahasiswa = :nama, 
                      Phone_Mahasiswa = :phone";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize data
        $this->NIM_Mahasiswa = htmlspecialchars(strip_tags($this->NIM_Mahasiswa));
        $this->Nama_Mahasiswa = htmlspecialchars(strip_tags($this->Nama_Mahasiswa));
        $this->Phone_Mahasiswa = htmlspecialchars(strip_tags($this->Phone_Mahasiswa));
        
        // Bind data
        $stmt->bindParam(":nim", $this->NIM_Mahasiswa);
        $stmt->bindParam(":nama", $this->Nama_Mahasiswa);
        $stmt->bindParam(":phone", $this->Phone_Mahasiswa);
        
        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    // UPDATE mahasiswa
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET NIM_Mahasiswa = :nim, 
                      Nama_Mahasiswa = :nama, 
                      Phone_Mahasiswa = :phone 
                  WHERE ID_Mahasiswa = :id";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize data
        $this->ID_Mahasiswa = htmlspecialchars(strip_tags($this->ID_Mahasiswa));
        $this->NIM_Mahasiswa = htmlspecialchars(strip_tags($this->NIM_Mahasiswa));
        $this->Nama_Mahasiswa = htmlspecialchars(strip_tags($this->Nama_Mahasiswa));
        $this->Phone_Mahasiswa = htmlspecialchars(strip_tags($this->Phone_Mahasiswa));
        
        // Bind data
        $stmt->bindParam(":id", $this->ID_Mahasiswa);
        $stmt->bindParam(":nim", $this->NIM_Mahasiswa);
        $stmt->bindParam(":nama", $this->Nama_Mahasiswa);
        $stmt->bindParam(":phone", $this->Phone_Mahasiswa);
        
        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    // DELETE mahasiswa
    public function delete($id) {
        // Periksa apakah mahasiswa memiliki data KRS
        $query_check = "SELECT COUNT(*) as krs_count FROM KRS WHERE ID_Mahasiswa = ?";
        $stmt_check = $this->conn->prepare($query_check);
        $stmt_check->bindParam(1, $id);
        $stmt_check->execute();
        $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
        
        if ($row['krs_count'] > 0) {
            // Jika ada data KRS terkait, jangan hapus
            return false;
        }
        
        // Jika tidak ada data KRS terkait, lanjutkan hapus
        $query = "DELETE FROM " . $this->table_name . " WHERE ID_Mahasiswa = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    // Cek keberadaan NIM
    public function checkNIM($nim, $exceptId = null) {
        if ($exceptId) {
            $query = "SELECT COUNT(*) as count FROM " . $this->table_name . " WHERE NIM_Mahasiswa = ? AND ID_Mahasiswa != ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $nim);
            $stmt->bindParam(2, $exceptId);
        } else {
            $query = "SELECT COUNT(*) as count FROM " . $this->table_name . " WHERE NIM_Mahasiswa = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $nim);
        }
        
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return ($row['count'] > 0);
    }
}
?>