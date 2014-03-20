# PHP DATABASE QUERIES

### Introdução
O banco de dados MySQL é uma ferramenta muito poderosa. Porém, muitas vezes necessitamos criar queries gigantescas, que acabam ficando muito confusas por causa da grande quantidade de parâmetros utilizados na mesma.


### Objetivo
O objetivo dessa classe é conseguir executar queries da forma mais organizada e didática possível.


### Utilização
Para utilizar essa classe, basta incluí-la em seu arquivo:

```php
include "../GitHub/PHP_DATABASE_QUERIES/Queries.class.php";
```

Feita a inclusão do arquivo, basta iniciar a classe. Veja um exemplo:

```php
$query = new Queries();
```

Iniciada a classe, basta realizar a query normalmente:

```php
	$q1 = $query->select_field('nomedocampo1,nomedocampo2,[...]', 'nomedatabela');
	
	while ($l = mysql_fetch_array($q1)) {
		echo $l['nomedocampo1'];
		echo $l['nomedocampo2'];
		[...]
	}
```


### Parâmetros


####$fields
Tipo: `string`.
Refere-se aos campos da tabela, <b>separados por vírgula e sem espaços</b>.
Exemplo: `'string1,string2,string3'`

####$table
Tipo: `string`
Refere-se ao nome da tabela.
Exemplo: `'tabela1'`

####$values
Tipo: `array unidimensional com chave não definida`
Refere-se aos valores para popular as tabelas.
Exemplo: `array(valor 1, valor 2, valor 3, ... , valor n)`

####$where
Tipo: `array unidimensional com chave definida`
Refere-se às condições de busca para a query.
O campo da tabela deve ser definido como chave do array.
Exemplo: `array('nome'=>'João')`

####$order
Tipo: `array unidimensional com chave definida`
Refere-se à ordenação dos resultados da query.
O campo da tabela deve ser definido como chave do array, e o tipo de ordenação (ASC ou DESC).
Exemplo: `array(nome=>DESC)`

####$limit
Tipo:
Refere-se à limitação dos resultados a uma faixa de valores.
Devem ser informados dois números, <b>separados por vírgula e sem espaços</b>.
O primeiro número refere-se ao primeiro registro que se deseja exibir. O segundo, à quantidade de registros a serem exibidos.
Exemplo: `'0,5'`.








