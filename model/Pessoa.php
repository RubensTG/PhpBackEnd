<?php
include __DIR__.'/Conexao.php';

class Pessoa extends Conexao {
    private $id; 
	private $nome;
    private $idade;    
    private $altura;
    private $peso;
    private $sexo;


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

   
    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    
    public function getAltura() {
        return $this->altura;
    }

   
    public function setAltura($altura) {
        $this->altura = $altura;
        return $this;
    }

    
    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
        return $this;
    }

    
    public function getSexo()  {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
        return $this;
    }
    
    public function getIdade()   {
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
        return $this;
    }
    
    public function insert($obj){   /*Query*/    
    $sql = "INSERT INTO pessoas(nome,idade,altura,peso,sexo) VALUES (:nome,:idade,:altura,:peso,:sexo)";
    	$consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome',  $obj->nome);
        $consulta->bindValue('idade' , $obj->idade);
        $consulta->bindValue('peso' , $obj->peso);
        $consulta->bindValue('altura', $obj->altura);
        $consulta->bindValue('sexo' , $obj->sexo);
    	$consulta->execute();
        return Conexao::lastId(); /*Aqui vc tem o ID da pessoa, você pode não retornar ele e adicionar uma nova query para inserção e inserir nas duas tabelas ao mesmo tempo se for sempre assim */        
	}

	public function update($obj,$id = null){
		$sql = "UPDATE pessoas SET nome = :nome, altura = :altura,peso = :peso, sexo = :sexo,idade =:idade, disciplina_id = :disciplina_id WHERE id = :id ";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('nome', $obj->nome);
		$consulta->bindValue('idade' , $obj->idade);		
        $consulta->bindValue('peso' , $obj->peso);
        $consulta->bindValue('altura', $obj->altura);
        $consulta->bindValue('sexo', $obj->sexo);
		$consulta->bindValue('id', $id);
		return $consulta->execute();
	}

	public function delete($obj,$id = null){
		$sql =  "DELETE FROM pessoas WHERE id = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
		$consulta->execute();
	}

	public function find($id = null){
        $sql =  "SELECT * FROM pessoas WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',$id);
        $consulta->execute();
	}

	public function findAll(){
		$sql = "SELECT * FROM pessoas";
		$consulta = Conexao::prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();/*Todas as respostas*/
	}
}

?>