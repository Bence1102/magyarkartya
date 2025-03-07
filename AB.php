<?php
class AB {
    //adattagok
    private $host = "localhost";
    private $felhasznalo = "root";
    private $jelszo = "";
    private $abNev = "magyarkartya";
    private $kapcsolat;


    //konstruktor

    public function __construct(){
        $this->kapcsolat = new mysqli($this->host,
        $this->felhasznalo, $this->jelszo, 
        $this->abNev);

        if($this->kapcsolat->connect_error){
            echo "<p>Sikertelen kapcsolódás.</p>";
        }else{
            echo "<p>Sikeres kapcsolódás.</p>";
        }
    } 
    

    //tagfüggvények
    public function meret($tabla){
        $sql = "SELECT * FROM $tabla";
        return $this->kapcsolat->query($sql)->num_rows;
    }
    
    public function feltoltes($tabla,$mezo1,$mezo2){
            $szinekSzama = $this->meret("szin");
            $formaSzama = $this->meret("forma");
            for ($i=1; $i <= $szinekSzama; $i++) { 
                for ($j=1; $j <= $formaSzama; $i++) { 
                   $sql = "INSERT INTO $tabla($mezo1, $mezo2) VALUES ('$i','$j')";
                   $siker = $this->kapcsolat->query($sql);
                   echo "$siker?\"siker\":\"nem siker\"";
                }
            }
    }
    
    public function oszlopleker($oszlop,$table){
        $sql="SELECT $oszlop FROM $table";
        return $this->kapcsolat->query($sql);

    }
    
    public function megjelenit($matrix){
    }
    public function bezar(){
        $this->kapcsolat->close();
    }








}
?>