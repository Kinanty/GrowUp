<?php
    class Workshop extends Connection{
        private $namaworkshop = '';
        private $deskripsi = '';
        private $benefit = '';

        public $hasil = false;
        public $message = '';

        public function __get($atribute){
            if (property_exists($this, $atribute)){
                return $this->$atribute;
            }
        }
        public function __set($atribute, $value){
            if(property_exists($this, $atribute)){
                $this->$atribute = $value;
            }
        }
        public function AddWorkshop(){
            $sql = "INSERT INTO workshop (namaworkshop, deskripsi, benefit)
                        VALUES ('$this->namaworkshop', '$this->deskripsi', '$this->address')";
            $this->hasil = mysqli_query($this->connection, $sql);
            if($this->hasil){
                $this->message = 'Data berhasil ditambahkan pren!';
            }else{
                $this->message = "Data gagal ditambahkan pren! nice try";
            }
        }
        public function UpdateWorkshop(){
            $sql = "UPDATE workshop
                    SET benefit = '$this->benefit',
                        deksripsi = '$this->deskripsi'
                    WHERE namaworkshop = '$this->namaworkshop'";
            $this->hasil = mysqli_query($this->connection, $sql);
            if($this->hasil){
                $this->message = 'Data berhasil diupdate';
            }else{
                $this->message = 'Data gagal diubah';
            }
        }
        public function DeleteWorkshop(){
            $sql = "DELETE FROM workshop WHERE namaworkshop='$this->namaworkshop'";
            $this->hasil = mysqli_query($this->connection, $sql);
            if($this->hasil){
                $this->message = 'Data berhasil dihapus';
            }else{
                $this->message = 'Data gagal dihapus';
            }
        }
        public function SelectAllWorkshop(){
            $sql = "SELECT * FROM workshop";
            $result = mysqli_query($this->connection, $sql);
            $arrResult = Array();
            $count = 0;
            if(mysqli_num_rows($result) > 0){
                while($data = mysqli_fetch_array($result)){
                    $objWorkshop = new Workshop();
                    $objWorkshop->namaworkshop=$data['namaworkshop'];
                    $objWorkshop->deskripsi=$data['deskripsi'];
                    $objWorkshop->benefit=$data['benefit'];
                    $arrResult[$count] = $objWorkshop;
                    $count++;
                }
            }
            return $arrResult;
        }
        public function SelectOneWorkshop(){
            $sql = "SELECT * FROM workshop WHERE namaworkshop='$this->namaworkshop'";
            $resultOne = mysqli_query($this->connection, $sql);

            if(mysqli_num_rows($resultOne) == 1){
                $this->hasil = true;
                $data = mysqli_fetch_assoc($resultOne);
                $this->deskripsi = $data['deskripsi'];
                $this->benefit=$data['benefit'];
            }
        }
    }
?>