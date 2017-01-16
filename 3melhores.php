<?php


try{
    $conexao = new \PDO("mysql:host=localhost;dbname=projetopdo","root","root");

    $query = "select * from alunos order by nota DESC LIMIT 3";
    $stmt = $conexao->query($query);
    $resultado = $stmt->fetchAll(PDO::FETCH_CLASS);

} catch (\PDOException $e){
    echo "Não foi possível estabelecer a conexão com o banco de dados:Erro código ".$e->getCode().": ".$e->getMessage();

};

?>

<h1>Lista do 3 meljores alunos</h1>
<h4>Voltar para lista  completa <a href="index_exemplo.php">click aqui</a></h4>

<?php foreach ($resultado as $aluno) {
    echo "id: ".$aluno->nota."<br>", "Nome: ".$aluno->nome."<br>", "Nota: ".$aluno->nota."<br><hr><br>";
}; ?>