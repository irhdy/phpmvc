<?php

class Mahasiswa_model{
    // private $mhs = [
    //     [
    //         'nama' => 'irhdy',
    //         'nrp'   => '203040068',
    //         'email' => 'p6M3t@example.com',
    //         'jurusan' => 'Teknik Informatika'

    //     ],
    //     [
    //         'nama' => 'putri',
    //         'nrp'   => '203042444',
    //         'email' => 'putri@example.com',
    //         'jurusan' => 'Teknik Industri'

    //     ],
    //     [
    //         'nama' => 'ozora',
    //         'nrp'   => '203042670',
    //         'email' => 'ozora@example.com',
    //         'jurusan' => 'Teknik Mesin'

    //     ]
    // ];

    private $dbh; // database handler
    private $stmt;

    public function __construct(){
        // data source namae
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

        public function getAllMahasiswa(){
            // return $this->mhs;
            $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

}