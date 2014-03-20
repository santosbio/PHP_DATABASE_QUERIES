<?php

/**
*
*   Class Queries()
*
*	@param string $table = nome da tabela. Exemplo: 'string'.
*   @param string $fields = campos da tabela, separados por vírgula e sem espaços. Exemplo: 'string1,string2,string3'.
*   @param array $values = valores para popular as tabelas. (array unidimensional com chave não definida)
*	@param array $where = condição para a query. (array unidimensional. O campo da tabela deve ser definido como chave do array. Ex.: array('nome'=>'João') )
*	@param array $order = ordena os resultados da query. (array unidimensional. O campo da tabela deve ser definido como chave do array. Ex.: array($campo=>$valor) )
*	@param string $limit = limita os resultados a uma faixa de valores. Formato: '$inicio,$quantidade'. Exemplo: '0,5'.
*
*
*   Autor: Adriano dos Santos
*   E-mail: santosbio@gmail.com
*   Empresa: Agência Sic - http://agenciasic.com.br
*	Docs: https://github.com/santosbio2/PHP_DATABASE_QUERIES
*   
*/

class Queries
{

	public $fields;
	public $values;
	public $where;
	public $order;
	public $limit;
	public $q;

	function __construct()
   {
       
   }

   public function insert_field($fields, $table, $values)
   {
   		
   		$v = '';
		foreach ($values as $key => $value) {
			$v .= "'".$value."',";
		}
		$v = substr($v, 0, -1);
		$e = "INSERT INTO ".$table." (".$fields.") VALUES (".$v.")";
		$q = mysql_query($e) or die(mysql_error());

		return true;	
   		
   }

   public function update_field($fields, $table, $values, $where)
   {

		$c = explode(',', $fields);
		$i = 0;
		$v = '';
		foreach ($values as $key => $value) {
			$v .= ' '.$c[$i]." = '".$value."',";
			$i++;
		}
		if (!empty($where)) {
			$w = '';
			foreach ($where as $k => $val) {
				$w .= $k . " = '" . $val . "',";
			}
			$w = substr($w, 0, -1);
			$e = "UPDATE ".$table." SET ".$v." WHERE ".$w;
		}	
		$q = mysql_query($e) or die(mysql_error());

		return true;	

   }

   public function select_field($fields, $table, $where=NULL, $order=NULL, $limit=NULL, $group=NULL)
   {

		$e = "SELECT ".$fields." FROM ".$table;

		if (!empty($where) && $where != NULL) {
			$w = '';
			foreach ($where as $k => $val) {
				$w .= $k . " = '" . $val . "',";
			}
			$w = substr($w, 0, -1);
			$e .= " WHERE ".$w;
		}

		if (!empty($order) && $order != NULL) {
			$o = '';
			foreach ($order as $key => $value) {
				$o .= $key . " " . $value;
			}
			$e .= " ORDER BY ".$o;
		}	

		if (!empty($limit) && $limit != NULL) {

			$e .= " LIMIT ".$limit;
		}

		if (!empty($group) && $group != NULL) {

			$e .= " GROUP BY ".$group;
		}

		$q = mysql_query($e) or die(mysql_error());

		return $q;

   }

   public function delete_field($table, $where)
   {
   		$w = '';

		foreach ($where as $k => $val) {
			$w = $k . " = '" . $val . "'";
		}


		$e = "DELETE FROM ".$table." WHERE ".$w;

		$q = mysql_query($e) or die(mysql_error());

		return true;

   }
}
?>







