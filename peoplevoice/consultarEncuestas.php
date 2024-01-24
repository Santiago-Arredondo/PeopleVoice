<?php include ("template/cabecera.php")?>

    <title>Consultar Encuestas</title>
</head>

<body>
    
<?php
include 'conexion/bd.php';

class Survey extends DB{

    private $totalVotes;
    private $optionSelected;

    public function setOptionSelected($option){
        $this->optionSelected = $option;
    }

    public function getOptionSelected(){
        return $this->optionSelected;
    }

    public function vote(){
        $query = $this->connect()->prepare('UPDATE encuesta SET total = total + 1 WHERE cod = :cod');
        $query->execute(['cod' => $this->optionSelected]);
    }

    public function showResults(){
        return $this->connect()->query('SELECT * FROM encuesta');
    }

    public function getTotalVotes(){
        $query =$this->connect()->query('SELECT SUM(total) AS votos_totales FROM encuesta');
        $this->totalVotes = $query->fetch(PDO::FETCH_OBJ)->votos_totales;
        return $this->totalVotes;
    }

    public function getPercentageVotes($votes){
        return round(($votes / $this->totalVotes) * 100, 0);
    }
}
?>

<section class="container"><br><br>
  <center><h4>Resultados de Encuestas</h4></center><hr>
  <table class="table table-striped">
  <thead><br>
    <tr>
      <th scope="col">Codigo encuesta</th>
      <th scope="col">Satisfechos</th>
      <th scope="col">Insatisfechos</th>
      <th scope="col">Indiferentes</th>
      <th scope="col">Total encuestados</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>...</td>
      <td>...</td>
      <td>...</td>
      <td><?php $totalVotes ?></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>...</td>
      <td>...</td>
      <td>...</td>
      <td>...</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>...</td>
      <td>...</td>
      <td>...</td> 
      <td>...</td> 
    </tr>
 
  </tbody>
</table>
</section>


<?php include ("template/footer.php")?>