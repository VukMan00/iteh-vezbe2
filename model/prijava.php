<?php

class Prijava{
    public $id;
    public $predmet;
    public $katedra;
    public $sala;
    public $datum;

    public function __construct($id=null,$predmet=null,$katedra=null,$sala=null,$datum=null)
    {
        $this->id = $id;
        $this->predmet = $predmet;
        $this->katedra = $katedra;
        $this->sala = $sala;
        $this->datum = $datum;
    }

    public static function getAll(mysqli $conn){
        $query = "SELECT * FROM prijava";
        return $conn->query($query);
    }

    public static function getById($id,mysqli $conn){
        $query = "SELECT * FROM prijave WHERE id = $id";
        $rezultat = $conn->query($query);
        $myArray = array();
        if($rezultat){
            while($red = $rezultat->fetch_array()){
                $myArray[] = $red;
            }
        }
        return $myArray;
    }

    public function deleteById(mysqli $conn){
        $query = "DELETE FROM prijave WHERE id=$this->id";
        return $conn->query($query);
    }

    public static function add(Prijava $prijava, mysqli $conn){
        $query = "INSERT INTO prijave(predmet,katedra,sala,datum) VALUES('$prijava->predmet','$prijava->katedra','$prijava->sala','$prijava->datum')";
    }

    public function update(mysqli $conn){
        $query = "UPDATE prijave SET predmet='$this->predmet',katedra = '$this->katedra',sala='$this->sala',datum = '$this->datum'";
        return $conn->query($query);
    }
}

?>