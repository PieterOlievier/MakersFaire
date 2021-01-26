<?php

require_once __DIR__ . '/Controller.php';
//require_once __DIR__ . '/../dao/OrderDAO.php';
require_once __DIR__ . '/../dao/SkillDAO.php';
require_once __DIR__ . '/../dao/userDAO.php';



class StepsController extends Controller
{

  private $orderDAO;

  function __construct()
  {
    //$this->orderDAO = new OrderDAO();
    $this->userDAO = new UserDAO();
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
      
        $inserteduser = $this->userDAO->insert(array(
          'naam' => $_POST['naam'],
          'voornaam' => $_POST['voornaam'],
          'email' => $_POST['email'],
          'adres' => $_POST['adres'],
          'nr' => $_POST['nr'],
          'postcode' => $_POST['postcode'],
          'stad' => $_POST['stad']
        ));
        if (!empty($inserteduser)) {
          $_SESSION['info'] = 'Bestelling voltooid!';
          header('location:index.php?page=index');
          exit();
        }
      
    
    }
  }

  
  


 
}
