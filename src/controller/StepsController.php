<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/OrderDAO.php';
require_once __DIR__ . '/../dao/SkillDAO.php';



class StepsController extends Controller
{

  private $skillDAO;

  function __construct()
  {
    $this->OrderDAO = new OrderDAO();
  }

  public function index()
  {
  
  }

  public function tutorial()
  {
  
  }

  public function shop()
  {
  
  }

  public function order()
  {
    if (!empty($_POST)) {
      $errors = array();
      if (empty($_POST['username'])) {
        $errors['username'] = 'Please enter your username';
      }
      if (empty($errors)) {
        $inserteduser = $this->orderDAO->insert(array(
          'username' => $_POST['username'],
        ));
        if (!empty($inserteduser)) {
          $_SESSION['info'] = 'Registratie voltooid! </br>Hier kan je inloggen met je nieuwe account';
          header('location:index.php?page=index');
          exit();
        }
      }
      $_SESSION['error'] = 'Registratie niet gelukt!';
      $this->set('errors', $errors);
    }
  }

  
  


 
}
