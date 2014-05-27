# PHP DATABASE QUERIES

### Introdução
O banco de dados MySQL é uma ferramenta muito poderosa. Porém, muitas vezes necessitamos criar queries gigantescas, que acabam ficando muito confusas por causa da grande quantidade de parâmetros utilizados na mesma.


### Objetivo
O objetivo dessa classe é conseguir executar queries da forma mais organizada e didática possível.


### Utilização
Para utilizar essa classe, basta incluí-la em seu arquivo:

```php
include "Queries.class.php";
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
Tipo: `string`.<br>
Refere-se aos campos da tabela, <b>separados por vírgula e sem espaços</b>.<br>
Exemplo: `'string1,string2,string3'`
<b style="color: red">IMPORTANTE:</b><br>
Para seleção de duas tabelas com Inner Join, deve-se lembrar de informar os aliases das tabelas nos campos.  Exemplo:
<b>`'alias.campo1,alias.campo2,alias.campo3[...]'`</b>

####$table
Tipo: `string`<br>
Refere-se ao nome da tabela.<br>
Exemplo: `'tabela1'`<br>
<b style="color: red">IMPORTANTE:</b><br>
Para seleção de duas tabelas com Inner Join, deve-se utilizar um array como parâmetro ao informar as tabelas, sendo que os aliases das tabelas devem ser definidos como chave primária no array. Exemplo:
<b>`array('alias'=>'tabela')`</b>

####$on
######(somente em casos de Inner Join)
Tipo: `string`<br>
Refere-se ao parâmetro que faz a ligação das tabelas.<br>
Exemplo: `'alias1.campo1 = alias2.campo2'`<br>


####$values
Tipo: `array unidimensional com chave não definida`<br>
Refere-se aos valores para popular as tabelas.<br>
Exemplo: `array(valor 1, valor 2, valor 3, ... , valor n)`

####$where
Tipo: `array unidimensional com chave definida`<br>
Refere-se às condições de busca para a query.<br>
O campo da tabela deve ser definido como chave do array.<br>
Exemplo: `array('nome'=>'João')`

####$order
Tipo: `array unidimensional com chave definida`<br>
Refere-se à ordenação dos resultados da query.<br>
O campo da tabela deve ser definido como chave do array, e o tipo de ordenação (ASC ou DESC).<br>
Exemplo: `array(nome=>DESC)`

####$limit
Tipo: `string`<br>
Refere-se à limitação dos resultados a uma faixa de valores.<br>
Devem ser informados dois números, <b>separados por vírgula e sem espaços</b>.<br>
O primeiro número refere-se ao primeiro registro que se deseja exibir. O segundo, à quantidade de registros a serem exibidos.<br>
Exemplo: `'0,5'`.








