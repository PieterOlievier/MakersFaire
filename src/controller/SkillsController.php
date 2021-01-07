<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/SkillDAO.php';
require_once __DIR__ . '/../dao/StepsweekDAO.php';
require_once __DIR__ . '/../dao/SkillhoursDAO.php';
require_once __DIR__ . '/../dao/StepsdayDAO.php';
require_once __DIR__ . '/../dao/userDAO.php';

class SkillsController extends Controller
{

  private $skillDAO;

  function __construct()
  {
    $this->skillDAO = new SkillDAO();
    $this->stepsweekDAO = new StepsweekDAO();
    $this->skillhoursDAO = new SkillhoursDAO();
    $this->stepsdayDAO = new StepsdayDAO();
    $this->userDAO = new UserDAO();
  }

  public function index()
  {
    if (!empty($_POST)) {
      if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $existing = $this->userDAO->selectByUsername($_POST['username']);
        if (!empty($existing)) {
          if (password_verify($_POST['password'], $existing['password'])) {
            $_SESSION['user'] = $existing;
            $_SESSION['info'] = 'Logged In';
            header('location:index.php?page=dashboard');
            exit();
          } else {
            $_SESSION['error'] = 'Foutief wachtwoord';
          }
        } else {
          $_SESSION['error'] = 'Ongekende gebruikersnaam';
        }
      } else {
        $_SESSION['error'] = 'Unknown username / password';
      }
    }
  }

  public function home()
  {
    if (!empty($_SESSION['user']['id'])) {

      $skills = $this->skillDAO->selectSkills();
      $this->set('skills', $skills);

      $current_skills = $this->skillDAO->selectCurrentSkills();
      $this->set('current_skills', $current_skills);

      // $currentNewskill = $this->skillDAO->selectCurrentSkillById($_GET['id']);
      // $this->set('currentNewskill', $currentNewskill);
    } else {
      header('Location:index.php?page=index');
      exit();
    }

    // $skills = $this->skillDAO->selectSkills();
    // $this->set('skills', $skills);

    // $current_skills = $this->skillDAO->selectCurrentSkills();
    // $this->set('current_skills', $current_skills);
  }

  public function profile()
  {
    if (!empty($_SESSION)) {
      $current_skills = $this->skillDAO->selectCompletedSkills($_SESSION['user']['id']);

      $this->set('current_skills', $current_skills);
    } else {
      header('Location:index.php?page=index');
      exit();
    }
    //$level = $this->skillDAO->selectCompletedSkills('finished');
    //$this->set('level', $level);
  }

  public function progress()
  {
    if (!empty($_SESSION['user']['id'])) {

      if (!empty($_GET['id'])) {
        $skill = $this->skillDAO->selectById($_GET['id']);
        $this->set('skill', $skill);

        if (empty($skill)) {
          header('Location:index.php');
          exit();
        }
      }

      $stepsday = $this->stepsdayDAO->selectSkillStepsDay($skill['id']);
      $this->set('stepsday', $stepsday);

      $getWeek = 1;

      if (!empty($_POST['select_week'])) {
        // if ($_POST['select_week'] === '1') {
        //   header('Location: index.php?page=progress&id=' . $skill['id']);
        //   exit();
        // } else if ($_POST['select_week'] === '2') {
        //}
        $getWeek = $_POST['select_week'];
      }
      $this->set('getWeek', $getWeek);

      $currentSkill = $this->skillDAO->selectByIdCurrent($skill['title']);
      $this->set('currentSkill', $currentSkill);
    } else {
      header('Location:index.php?page=index');
      exit();
    }
  }

  public function firstbreakdown()
  {
    if (!empty($_SESSION['user']['id'])) {

      if (!empty($_GET['id'])) {
        $skill = $this->skillDAO->selectById($_GET['id']);
        $this->set('skill', $skill);

        if (empty($skill)) {
          header('Location:index.php');
          exit();
        }

        $stepsweek = $this->stepsweekDAO->selectSkillStepsWeek($skill['id']);
        $this->set('stepsweek', $stepsweek);

        if (!empty($_POST['action'])) {
          if ($_POST['action'] == 'addnewskill') {
            $data = array(
              'user_id' => $_SESSION['user']['id'],
              'current_skill' => $skill['title'],
              'recommanded_time' => $skill['recommanded_time'],
              'timeperiod' => $skill['recommanded_time'],
              'start_date' => $_POST['start_date'],
              'status' => 'progress'
            );
            $insertedskill = $this->skillDAO->insert($data);
            if (!$insertedskill) {
              $errors = $this->skillDAO->validate($data);
              $this->set('errors', $errors);
            } else {
              header('Location: index.php?page=secondbreakdown&id=' . $skill['id']);
              exit();
            }
          }
        }
      }
    } else {
      header('Location:index.php?page=index');
      exit();
    }
  }


  public function secondbreakdown()
  {
    if (!empty($_SESSION['user']['id'])) {

      if (!empty($_GET['id'])) {
        $skill = $this->skillDAO->selectById($_GET['id']);
        $this->set('skill', $skill);

        if (empty($skill)) {
          header('Location:index.php');
          exit();
        }

        // $skills = $this->skillDAO->selectSkills();
        // $this->set('skills', $skills);
      }

      $currentSkill = $this->skillDAO->selectByIdCurrent($skill['title']);
      $this->set('currentSkill', $currentSkill);

      if (!empty($_POST['action'])) {
        if ($_POST['action'] == 'updateTimeperiod') {

          $data = array(
            'timeperiod' => $_POST['timeperiod'],
            'user_id' => $_SESSION['user']['id'],
            'current_skill' => $currentSkill['current_skill'],
            'recommanded_time' => $currentSkill['recommanded_time'],
            'start_date' => $currentSkill['start_date'],
            'id' => $currentSkill['id']
          );
          $updatedTimeperiod = $this->skillDAO->update($data);
          if (!$updatedTimeperiod) {
            $errors = $this->skillDAO->update($data); // was eerste 'validate'
            $this->set('errors', $errors);
          } else {
            // redirect naar de home page
            header('Location: index.php?page=thirdbreakdown&id=' . $skill['id']);
            exit();
          }
        }
      }
    } else {
      header('Location:index.php?page=index');
      exit();
    }
  }


  public function thirdbreakdown()
  {
    if (!empty($_SESSION['user']['id'])) {

      if (!empty($_GET['id'])) {
        $skill = $this->skillDAO->selectById($_GET['id']);
        $this->set('skill', $skill);

        if (empty($skill)) {
          header('Location:index.php');
          exit();
        }

        // selecteer de notificatie-uren
        $hours = $this->skillhoursDAO->selectSkillhours($skill['id']);
        $this->set('hours', $hours);

        // selecteer alle stappen per dag apart
        $stepsday = $this->stepsdayDAO->selectSkillStepsDay($skill['id']);
        $this->set('stepsday', $stepsday);

        $currentSkill = $this->skillDAO->selectByIdCurrent($skill['title']);
        $this->set('currentSkill', $currentSkill);

        // om de uren in de database te steken
        if (!empty($_POST['action'])) {
          if ($_POST['action'] == 'insertHour') {
            $data = array(
              'skill_id' => $skill['id'],
              'user_id' => $_POST['user_id'],
              'time_one' => $_POST['time_one'],
              'time_two' => $_POST['time_two'],
              'time_three' => $_POST['time_three'],
              'time_four' => $_POST['time_four']

            );
            $insertedHour = $this->skillhoursDAO->insert($data);



            if (!$insertedHour) {
              $errors = $this->skillhoursDAO->validate($data);
              $this->set('errors', $errors);
            } else {
              header('Location: index.php?page=progress&id=' . $skill['id']);
              exit();
            }
          }
        }


        if (!empty($_POST['action'])) {
          if ($_POST['action'] == 'updateHome') {

            $data = array(
              'skill_id' => $skill['id'],
              'status' => $skill['status'],
              'start_date' => $_POST['start_date']
            );
            $addedSkill = $this->skillDAO->updateHome($data);
            if (!$addedSkill) {
              $errors = $this->skillDAO->update($data); //was eerst validate
              $this->set('errors', $errors);
            } else {
              // redirect naar de home page
              header('Location: index.php?page=settings&id=' . $skill['id']);
              exit();
            }
          }
        }

        $getWeek = 1;

        if (!empty($_POST['select_week'])) {
          // if ($_POST['select_week'] === '1') {
          //   header('Location: index.php?page=progress&id=' . $skill['id']);
          //   exit();
          // } else if ($_POST['select_week'] === '2') {
          //}
          $getWeek = $_POST['select_week'];
        }
        $this->set('getWeek', $getWeek);
      }
    } else {
      header('Location:index.php?page=index');
      exit();
    }
  }

  public function settings()
  {
    if (!empty($_SESSION['user']['id'])) {

      if (!empty($_GET['id'])) {
        $skill = $this->skillDAO->selectById($_GET['id']);
        $this->set('skill', $skill);

        if (empty($skill)) {
          header('Location:index.php');
          exit();
        }
      }

      if (!empty($_POST['action'])) {
        if ($_POST['action'] == 'updateHours') {

          $data = array(
            'time_one' => $_POST['time_one'],
            'time_two' => $_POST['time_two'],
            'time_three' => $_POST['time_three'],
            'time_four' => $_POST['time_four'],
            'user_id' => $_SESSION['user']['id'],
            'skill_id' => $skill['id']
          );
          $updatedHours = $this->skillhoursDAO->update($data);
          if (!$updatedHours) {
            $errors = $this->skillhoursDAO->validate($data);
            $this->set('errors', $errors);
          } else {
            // redirect naar de home page
            header('Location: index.php?page=settings&id=' . $skill['id']);
            exit();
          }
        }
      }

      if (!empty($_POST['action'])) {
        if ($_POST['action'] == 'removeSkill') {

          $data = array(
            'skill_id' => $skill['id'],
            'status' => $skill['status']
          );
          $removedSkill = $this->skillhoursDAO->remove($data);
          if (!$removedSkill) {
            $errors = $this->skillhoursDAO->validate($data);
            $this->set('errors', $errors);
          } else {
            // redirect naar de home page
            header('Location: index.php?page=settings&id=' . $skill['id']);
            exit();
          }
        }
      }

      $hours = $this->skillhoursDAO->selectSkillhours($skill['id']);
      $this->set('hours', $hours);

      $currentSkill = $this->skillDAO->selectByIdCurrent($skill['title']);
      $this->set('currentSkill', $currentSkill);
    } else {
      header('Location:index.php?page=index');
      exit();
    }
  }

  public function register()
  {
    if (!empty($_POST)) {
      $errors = array();
      if (empty($_POST['username'])) {
        $errors['username'] = 'Please enter your username';
      } else {
        $existing = $this->userDAO->selectByUsername($_POST['username']);
        if (!empty($existing)) {
          $errors['username'] = 'Gebruikersnaam al in gebruik';
        }
      }
      if (empty($_POST['password'])) {
        $errors['password'] = 'Vul een paswoord in alstublieft';
      }
      if ($_POST['confirm_password'] != $_POST['password']) {
        $errors['confirm_password'] = 'Paswoorden komen niet overeen';
      }
      if (empty($errors)) {
        $inserteduser = $this->userDAO->insert(array(
          'username' => $_POST['username'],
          'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
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

  public function login()
  {

    if (!empty($_POST)) {
      if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $existing = $this->userDAO->selectByUsername($_POST['username']);
        if (!empty($existing)) {
          if (password_verify($_POST['password'], $existing['password'])) {
            $_SESSION['user'] = $existing;
            $_SESSION['info'] = 'Logged In';
            header('location:index.php?page=dashboard');
            exit();
          } else {
            $_SESSION['error'] = 'Foutief wachtwoord';
          }
        } else {
          $_SESSION['error'] = 'Ongekende gebruikersnaam';
        }
      } else {
        $_SESSION['error'] = 'Unknown username / password';
      }
    }
  }

  public function logout()
  {
    if (!empty($_SESSION['user'])) {
      unset($_SESSION['user']);
    }
    $_SESSION['info'] = 'Logged Out';
    header('location:index.php?page=index');
    exit();
  }
}
