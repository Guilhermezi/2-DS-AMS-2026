# 13/08/2026

Diferença entre o MySQL e MariaDB

O maria DB deriva do MySQL, pq o criador do mysql vendeu o MySQL para a oracle e eles queriam cobrar para cada uso, já o dono do mysql não queria então ele criou o maria DB que é identico ao MySQL.

PHP é usado pq era bom e virou sinonimo de conexão com o banco

```php
<?php
// Guarda o endereço do servidor e do banco
$host = "localhost"; // diz ao php onde o banco está instalado
$dbname = "escola"; // Garda o nome do banco de dados

$user = "root"; // Garda o nome do usuario
$password = ""; // Garda a senha do banco

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
}
// Caso acontaça algum erro
catch (PDOException $e){
	// Mostra a descrição do erro
	echo ""Erro na conexão: " . $e->getMessage()";
}
?>
```

## PDO

PHP Data Objects. É uma ferramenta embutida no PHP moderna e segura. É uma ponte universal. Ele serve para conectar não apenas no MySQL/MariaDB, mas em vários outros tipos de bancoda de dados se for preciso.

## Boas práticas de segurança

Nunca mostrar getMessage() para o publico final. Guardamos isso em um arquivo de texto(log) oculto para não dar dicas a hackers!

**Questão 1:** Qual o códgo que guarda o endereço do servidor? 

```php
$host = "localhost";
```

**Questão 2:** Qual o códgo que cria a conexão com o banco de dados? 

```php
	$pdo = new PDO(
		"mysql:host=$host;dbname=$dbname",
		$user,
		$password
	);
```