<?php
class AB{
    // adattagok
    private $host = "localhost";
    private $felhasznalo = "root";
    private $jelszo = "";
    private $abNev = "magyarkartya";
    private $kapcsolat;


    // kontruktor
    public function __construct(){
        // létrehozzuk a kapcsolatot
        $this->kapcsolat = new mysqli($this->host,
        $this->felhasznalo,
        $this->jelszo,
        $this->abNev);

        if($this->kapcsolat->connect_error){
            echo "<p>Sikertelen kapcsolódás.</p>";
        }else{
            echo "<p>Sikeres kapcsolódás.</p>";
        }   

        $this->kapcsolat->query("SET NAMES UTF8");
    }
   
    // tagfüggvények
    public function meret($tabla){
        $sql = "SELECT * FROM $tabla";
        return $this->kapcsolat->query($sql)->num_rows;
    }
   
    public function feltoltes($tabla, $mezo1, $mezo2){
        $szinekSzama = $this->meret("szin");
        $formakSzama = $this->meret("forma");

        for ($i=1; $i <= $szinekSzama; $i++) {
         
            for ($j=1; $j <= $formakSzama ; $j++) {
            $sql = "INSERT INTO $tabla($mezo1, $mezo2)
            VALUES ('$i','$j')";
            $siker = $this->kapcsolat->query($sql);
            echo $siker?"siker":"nem siker";
          }
        }
    }


    public function oszlopLeker($oszlop,$tabla) {
        $sql = "SELECT $oszlop FROM $tabla";
        //Mátrix eredmény
        return $this->kapcsolat->query($sql);
    }
   
   
    public function oszlopleker2($oszlop,$oszlop2,$tabla){
        $sql = "SELECT $oszlop, $oszlop2 FROM $tabla";
        return $this->kapcsolat->query($sql);
    }



    public function megjelenit($matrix){
        while ($row = $matrix -> fetch_row() ){
            echo "<img src='forras/$row[0]'alt ='kártya képei'>";
        }
   
    }
   
    public function tableone($matrix){
        while($row = $matrix -> fetch_row()){
            echo "<tr><td><p>$row[0]</p></td><td><img src='forras/$row[1]' alt='kártya képei'></td></tr>";
        }
        echo "</table>";    
    }


    public function bezar(){
        $this->kapcsolat->close();
    }

}
?>