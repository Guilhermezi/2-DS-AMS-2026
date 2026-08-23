# 20/08/2026

```php
<?php
//Coloca em uma variavel o valor do campo do html
$nome = $_POST["nome"];
$curso = $_POST["curso"];

// Guarda o endereço do servidor e do banco
$host = "localhost"; // diz ao php onde o banco está instalado
$dbname = "escola"; // Garda o nome do banco de dados

$user = "root"; // Garda o nome do usuario
$password = "1234"; // Garda a senha do banco

// Inicio do tratamento de erros
try {

	// Cria a conexão com MariaDB/MySQL
	$pdo = new PDO(
		"mysql:host=$host;dbname=$dbname",
		$user,
		$password
	);
	
	// Mostra uma mensagem de sucesso
	echo "Banco conectado";
	// Apartir daqui o php cria um comando SQL para inserir no banco de dados 
	//Cria o comando SQL
	$sql = "INSERT INTO aluno(nome, curso)
				VALUES(:nome, :curso)";

	//Prepara o comando SQL para execução
	$stmt = $pdo->prepare($sql);

	// Substitui o pâramentro :nome pelo valor digitado em $nome
	$stmt->bindValue(":nome", $nome);

	// Substitui o pâramentro :curso pelo valor digitado em $curso
	$stmt->bindValue(":curso", $curso);

	// Execulta o comando SQL no banco de dados.
	// Neste momento o comando é enviado para o MariaDB
	$stmt->execute();

	echo "Aluno cadastrado com sucesso!";
}
// Caso acontaça algum erro
catch (PDOException $e){
	// Mostra a descrição do erro
	echo ""Erro na conexão: " . $e->getMessage()";
}
?>
```