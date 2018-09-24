<?php

require_once 'model/employe.php';

class EmployeController {

	private $employes;

	public function __construct() {
		$this->employes = new employe();
	}

    public function index($notification = '') {
        $data['notification'] = $notification;
    	$data['employes'] = $this->employes->getAllEmploye();
    	include 'view/employe/index.php';
        die;
    }

    public function show() {
    	$employe = $this->employes->getEmploye($_GET['id']);
        if (!$employe) {
            die('Page Not Found 404');    
        }
    	include 'view/employe/show.php';
    }

    public function add() {
        $errors = array();

        if (isset($_POST['submit'])) {
            
            if (empty($errors)) {
                $add = $this->employes->add($_POST);
                if ($add) {
                    $msg = "L'employé ".$_POST['prenom']." ".$_POST['nom']." a été ajouté!";
                } 
                else {
                    $msg = "Impossible d'ajouter l'employé!";
                }
                $this->index($msg); // Redirection vers l'index
            }
        }
        include 'view/employe/add.php';
    }

    ##UPDATE
    public function edit(){
        if(@($_POST['submit'])){

                $update = $this->employes->edit($_POST,$_GET['id']);
                if($update)
                    $msg = "L'employé ".$_POST['prenom']." ".$_POST['nom']." a été maj !";
                else
                    $msg = "Impossible de mettre à jour l'employé";

                $this->index($msg);
        }

        $employes = $this->employes->getEmploye($_GET['id']);
        if (!$employes) {
            die('Page Not Found 404');    
        }
        include 'view/employe/edit.php';
    }

    public function delete()
    {
        $del = $this->employes->delete($_GET['id']);
        if ($del) {
            $msg = "L'employé ". $_GET['id']." a été supprimé.";
        } 
        else {
            $msg = "Impossible de supprimer l'employé!";
        }
        $this->index($msg); // Redirection vers l'index
    }

    #SUPPRESSION DE MASSE
    public function deletemasse(){
        $del = $this->employes->deletemasse($_POST);
        if($del)
            $msg = "Les employés ont bien été viré :)";
        else
            $msg = "Impossible de les virés";

        $this->index($msg);
    }

    #Connexion
    public function connexion(){
        $result = $this->employes->connexion($_POST);
        if($result){
            $verifyPwd = password_verify($_POST['pwd'],$result['motdepasse']);
            if($verifyPwd){
                session_start();
                $_SESSION['id'] = $result['id'];
                $_SESSION['droit'] = $result['droit'];
                $msg = "Connexion réussi";
                header("Location: index.php?ctrl=employe"); }
            else
                $msg = 'Erreur dans la connexion (mauvais mdp/identifiant)';
        }
           
       else
                $msg = 'Erreur dans la connexion';

        $this->index($msg);
    }

    #Search
    public function search(){
        $data['employes'] = $this->employes->search($_POST);
        include 'view/employe/search.php';
    }
}