<?php
class Conexao
{
    // Guarda uma instância da classe
    static private $instance;
        
    // Um construtor privado. A conexão com o banco é feita aqui, pois  esse 
    // método só vai ser acessado no momento de instanciar a classe.
    private function __construct() 
    {
        $link = mysql_connect('localhost', 'root', ''); 
        if (!$link) {
            die('Não foi possível conectar: ' . mysql_error()."<br><br>");
        }
        
        $db_selected = mysql_select_db('singleton', $link);
        if (!$db_selected) {
            die ('Não foi possível selecionar : ' . mysql_error());
        }
        
    }
    // O método singleton
    static public function getInstance() 
    {
        if (!isset(self::$instance)) {
            
            self::$instance = new Conexao();
        }

        return self::$instance;
    }
    
      
    // Método rrealizar o select
    public function query($sql)
    {
        $result = mysql_query($sql);
        
        if (!$result) {
            die('<br><br>Consulta Inválida: ' . mysql_error());
        }
        
        return $result;
    }
}

echo "<div align='center'>";
echo "objeto1: <br/>";
// Desse modo se faz a recuperação da instancia, pois como o método _construct é privado
// se tentar instanciar um objeto com o 'new', retorna um erro
$test = Conexao::getInstance();
$query = $test->query('select id,nome from usuarios');
while($dados = mysql_fetch_assoc($query)){
    echo $dados['id']." - ". $dados['nome']."<br>";
}

echo "<br>objeto2: <br>";
//Dessa forma retorna um erro, pois o constructor está privado
$test2 = new Conexao();
$query2 = $test2->query('select id,descricao,cores from times');
while($dados = mysql_fetch_assoc($query2)){
    echo $dados['id']." - ". $dados['descricao']." - ". $dados['cores']. "<br>";
}

echo "</div>";        
?>