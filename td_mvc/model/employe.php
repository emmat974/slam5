<?php

require_once 'connexionDB.php';

class employe extends ConnexionDB  {

	public function getAllEmploye() {
        return $this->cnx->query("SELECT * FROM employes")->fetchAll();
	}

	public function getEmploye($id) {
		$sql = $this->cnx->prepare("SELECT * FROM employes WHERE id=?");
		$sql->execute( array($id) );
		return $sql->fetch();
	}

	public function add($empl)
	{
		$pwd= password_hash($empl['pwd'], PASSWORD_DEFAULT);
		$sql = $this->cnx->prepare("INSERT INTO employes (prenom,nom,email,age,ville,motdepasse,sexe,droit) 
        VALUES (?,?,?,?,?,?,?,?)");
		$sql->execute( array($empl['prenom'],$empl['nom'],$empl['email'],$empl['age'],$empl['ville'],$pwd,$empl['sexe'],$empl['droit']));
		return $sql->rowCount();
	}

	public function edit($empl,$id)
	{
		$sql = $this->cnx->prepare("UPDATE employes 
                                    SET prenom=?,nom=?,email=?,age=?,ville=? 
                                    WHERE id=?");
        $sql->execute( array($empl['prenom'],$empl['nom'],$empl['email'],$empl['age'],$empl['ville'],$id) );
		return $sql->rowCount();
	}

	public function delete($id)
	{
		$sql = $this->cnx->prepare("DELETE FROM employes WHERE id = ?");
		$sql->execute( array($id) );
		return $sql->rowCount();
	}

	public function deletemasse($post){
		foreach($post['tb_delete'] as $key){
			$id = addslashes($key);
			$delete = $this->cnx->prepare("DELETE FROM employes WHERE id like ?");
			$delete->execute(array($id));
		}
		 return $delete->rowCount();
	}

	public function connexion($post){
		$sql = $this->cnx->prepare("SELECT id,droit,motdepasse FROM employes WHERE email like ?");
		$sql->execute(array($post['email']));

		return $result = $sql->fetch();
	}

	public function search($post){
		$sql = $this->cnx->prepare("SELECT * FROM employes WHERE ville=?");
		$sql->execute( array($post['city']) );
		return $sql->fetchAll();
	}
}