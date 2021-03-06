<?php
class Dashboard extends Controller
{
  function __construct()
  {
    parent::__construct();
    require HELPERS . 'session.php';
    validateSession();
  }

  function render()
  {
    $this->view->render('Dashboard/index');
  }

  function renderTable()
  {
    echo json_encode($this->model->getAll());
  }

  function handleRequest()
  {
    switch($_SERVER["REQUEST_METHOD"]) {

      case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        $this->model->remove(intval($_DELETE['emp_id']));
        break;

      case "POST":
        parse_str(file_get_contents("php://input"), $_POST);
        $this->model->insert($_POST);
        break;

      default:
        break;
    }
  }
}