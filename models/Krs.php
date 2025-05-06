<?php
require_once BASE_PATH . '/config/database.php';

class Krs {
    private $conn;
    private $table_name = "KRS";

    // Properties
    public $ID_KRS;
    public $ID_Mahasiswa;
    public $Kode_Mata_Kuliah;
    public $Nama_Mata_Kuliah;
    public $Semester;
    public $Nilai_Akhir;
    
    // Additional properties for joining with mahasiswa
    public $NIM_Mahasiswa;
    public $Nama_Mahasiswa;

    // Constructor
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // READ all KRS with mahasiswa info
    public function getAll() {
        $query = "SELECT k.*, m.NIM_Mahasiswa, m.Nama_Mahasiswa 
                  FROM " . $this->table_name . " k
                  JOIN Mahasiswa m ON k.ID_Mahasiswa = m.ID_Mahasiswa
                  ORDER BY k.ID_KRS ASC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    // READ KRS by mahasiswa ID
    public function getByMahasiswa($id_mahasiswa) {
        $query = "SELECT k.*, m.NIM_Mahasiswa, m.Nama_Mahasiswa 
                  FROM " . $this->table_name . " k
                  JOIN Mahasiswa m ON k.ID_Mahasiswa = m.ID_Mahasiswa
                  WHERE k.ID_Mahasiswa = ?
                  ORDER BY k.ID_KRS ASC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id_mahasiswa);
        $stmt->execute();
        
        return $stmt;
    }

    // READ one KRS
    public function getOne($id) {
        $query = "SELECT k.*, m.NIM_Mahasiswa, m.Nama_Mahasiswa 
                  FROM " . $this->table_name . " k
                  JOIN Mahasiswa m ON k.ID_Mahasiswa = m.ID_Mahasiswa
                  WHERE k.ID_KRS = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $this->ID_KRS = $row['ID_KRS'];
            $this->ID_Mahasiswa = $row['ID_Mahasiswa'];
            $this->Kode_Mata_Kuliah = $row['Kode_Mata_Kuliah'];
            $this->Nama_Mata_Kuliah = $row['Nama_Mata_Kuliah'];
            $this->Semester = $row['Semester'];
            $this->Nilai_Akhir = $row['Nilai_Akhir'];
            $this->NIM_Mahasiswa = $row['NIM_Mahasiswa'];
            $this->Nama_Mahasiswa = $row['Nama_Mahasiswa'];
            return true;
        }
        
        return false;
    }

    // CREATE KRS
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET ID_Mahasiswa = :id_mahasiswa, 
                      Kode_Mata_Kuliah = :kode, 
                      Nama_Mata_Kuliah = :nama,
                      Semester = :semester,
                      Nilai_Akhir = :nilai";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize data
        $this->ID_Mahasiswa = htmlspecialchars(strip_tags($this->ID_Mahasiswa));
        $this->Kode_Mata_Kuliah = htmlspecialchars(strip_tags($this->Kode_Mata_Kuliah));
        $this->Nama_Mata_Kuliah = htmlspecialchars(strip_tags($this->Nama_Mata_Kuliah));
        $this->Semester = htmlspecialchars(strip_tags($this->Semester));
        $this->Nilai_Akhir = htmlspecialchars(strip_tags($this->Nilai_Akhir));
        
        // Bind data
        $stmt->bindParam(":id_mahasiswa", $this->ID_Mahasiswa);
        $stmt->bindParam(":kode", $this->Kode_Mata_Kuliah);
        $stmt->bindParam(":nama", $this->Nama_Mata_Kuliah);
        $stmt->bindParam(":semester", $this->Semester);
        $stmt->bindParam(":nilai", $this->Nilai_Akhir);
        
        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    // UPDATE KRS
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET ID_Mahasiswa = :id_mahasiswa, 
                      Kode_Mata_Kuliah = :kode, 
                      Nama_Mata_Kuliah = :nama,
                      Semester = :semester,
                      Nilai_Akhir = :nilai
                  WHERE ID_KRS = :id";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize data
        $this->ID_KRS = htmlspecialchars(strip_tags($this->ID_KRS));
        $this->ID_Mahasiswa = htmlspecialchars(strip_tags($this->ID_Mahasiswa));
        $this->Kode_Mata_Kuliah = htmlspecialchars(strip_tags($this->Kode_Mata_Kuliah));
        $this->Nama_Mata_Kuliah = htmlspecialchars(strip_tags($this->Nama_Mata_Kuliah));
        $this->Semester = htmlspecialchars(strip_tags($this->Semester));
        $this->Nilai_Akhir = htmlspecialchars(strip_tags($this->Nilai_Akhir));
        
        // Bind data
        $stmt->bindParam(":id", $this->ID_KRS);
        $stmt->bindParam(":id_mahasiswa", $this->ID_Mahasiswa);
        $stmt->bindParam(":kode", $this->Kode_Mata_Kuliah);
        $stmt->bindParam(":nama", $this->Nama_Mata_Kuliah);
        $stmt->bindParam(":semester", $this->Semester);
        $stmt->bindParam(":nilai", $this->Nilai_Akhir);
        
        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    // DELETE KRS
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID_KRS = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    // Ambil semua mahasiswa untuk dropdown
    public function getAllMahasiswa() {
        $query = "SELECT ID_Mahasiswa, NIM_Mahasiswa, Nama_Mahasiswa FROM Mahasiswa ORDER BY Nama_Mahasiswa ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
}
?>