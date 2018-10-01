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
                $categorie = $this->employes->categories();
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
        $categories = $this->employes->categories();

        if (isset($_POST['submit'])) {
            
            if (empty($errors)) {
                $add = $this->employes->add($_POST);
                $msg = ($add) ? "L'employé ".$_POST['prenom']." ".$_POST['nom']." a été ajouté!" : "Impossible d'ajouter l'employé!";
                $this->index($msg); // Redirection vers l'index
            }
        }
    
        include 'view/employe/add.php';
    }

    ##UPDATE
    public function edit(){
        if(@($_POST['submit'])){

                $update = $this->employes->edit($_POST,$_GET['id']);
                $msg = ($update) ? "L'employé ".$_POST['prenom']." ".$_POST['nom']." a été maj !" : "Impossible de mettre à jour l'employé";
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
        $msg = ($del) ? "L'employé ". $_GET['id']." a été supprimé." : "Impossible de supprimer l'employé!";
        $this->index($msg); // Redirection vers l'index
    }

    #SUPPRESSION DE MASSE
    public function deletemasse(){
        $del = $this->employes->deletemasse($_POST);
        $msg = ($del) ? "Les employés ont bien été viré :)" : "Impossible de les virés";

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

    #Cat
    public function cat(){
        $categories = $this->employes->categories();
        include 'view/employe/cat.php';
    }
    public function addcat(){
        if(@$_POST['submit']){
            $addcat = $this->employes->addcat($_POST);
            $msg = ($addcat) ? "L'ajoute de votre catégorie a bien été prise" : "Une erreur s'est produit lors de l'ajout de votre catégorie";
            $this->index($msg);
        }

        $categories = $this->employes->categories();
        include 'view/employe/addcat.php';
    }

    public function updatecat(){
        if(@$_POST['submit']){
            $updatecat = $this->employes->updatecat($_POST,$_GET['id']);
            $msg = ($updatecat) ? "La modification de votre catégorie a bien été prise en compte" : "Erreur produit lors de la modification de votre catégorie";
            $this->index($msg);
        }

        $categorie = $this->employes->getCategorie($_GET['id']);
        include 'view/employe/updatecat.php';
    }

    public function searchcat(){
        $data['employes'] = $this->employes->searchcat($_POST);
        $categorie = $this->employes->categories();
        include 'view/employe/searchcat.php';
    }
}