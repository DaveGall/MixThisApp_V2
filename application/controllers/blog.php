<?php
/**
 * Created by PhpStorm.
 * User: davegall
 * Date: 10/19/15
 * Time: 6:45 PM
 */

class Blog extends CI_Controller {

    public function __construct(){
        session_start();
        parent::__construct();
        $this->load->helper('form');
    }

    public function index(){

        $this->load->helper('url');

        $this->load->view('header');

        $this->load->view('signup_login');

        $this->load->view('footer');
    }

    public function signup(){

        $this->load->helper('url');


        $this->load->view('header');
        $this->load->view('signup');
        $this->load->view('footer');




    }

    public function addUser(){
        $this->load->helper('url');
        $this->load->database();
        $data = array(
            'firstname'=>$this->input->post('firstName'),
            'lastname'=>$this->input->post('lastName'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
            'email'=>$this->input->post('email'),

        );

        $this->db->insert('users', $data);

        echo '<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://localhost:8888/CodeIgniter-3.0.2/js/jquery-ui.min.js"></script>
    <script src="http://localhost:8888/CodeIgniter-3.0.2/js/bootstrap.min.js"></script>
    <link href="http://localhost:8888/CodeIgniter-3.0.2/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="http://localhost:8888/CodeIgniter-3.0.2/assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <title>Mix This Version 2</title>
</head>
<body>
<header>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="http://localhost:8888/CodeIgniter-3.0.2/">Home</a> </li>
        <li role="presentation"><a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/bac/">BAC</a> </li>
        <li role="presentation"><a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/searchPage/">Search</a> </li>
    </ul>
</header>

<div class="container-fluid bacPage">

            <h1 class="title">Mix This</h1>
            <h3>Welcome to Mix This '.$data["firstname"].'!!!</h3>
            <form action="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/deleteuser/" method="POST"> <button type="submit" name="user_id" class="userButton" value="' . $data["username"] .'">Delete</button> </form> <form action="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/updateUser/" method="POST"> <button type="submit" name="user_id" class="userButton" value="' . $data["username"] .'">Edit</button>   </form>
            <p>Where would like to go?</p>
<a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/searchPage/"><button type="submit" class="userButton">Search</button> </a>
<a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/bac/"><button type="submit" class="userButton">BAC</button> </a>';

        $this->load->view('footer');
    }

    public function getUser()
    {
        $this->load->helper('url');
        $this->load->database();

        $username = $this->input->post('username');
        $password = $this->input->post('password');

//This is correct, I just need to figure out how to display the first name on the page.

        $this->db->select('*');
        $this->db->from('users');
        $array = array('username'=>$username, 'password'=>$password);
        $this->db->where($array);
        $query = $this->db->get();
        foreach ($query->result() as $row)
        {
            echo '<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://localhost:8888/CodeIgniter-3.0.2/js/jquery-ui.min.js"></script>
    <script src="http://localhost:8888/CodeIgniter-3.0.2/js/bootstrap.min.js"></script>
    <link href="http://localhost:8888/CodeIgniter-3.0.2/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="http://localhost:8888/CodeIgniter-3.0.2/assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <title>Mix This Version 2</title>
</head>
<body>
<header>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="http://localhost:8888/CodeIgniter-3.0.2/">Home</a> </li>
        <li role="presentation"><a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/bac/">BAC</a> </li>
        <li role="presentation"><a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/searchPage/">Search</a> </li>
    </ul>
</header>

<div class="container-fluid bacPage">

            <h1 class="title">Mix This</h1>
            <h3>Welcome to Mix This '.$row->firstname.'!!!</h3>
            <form action="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/deleteuser/" method="POST"> <button type="submit" name="user_id" class="userButton" value="' . $row->user_id .'">Delete</button> </form> <form action="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/updateUser/" method="POST"> <button type="submit" name="user_id" class="userButton" value="' . $row->user_id .'">Edit</button>   </form>
            <p>Where would like to go?</p>
<a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/searchPage/"><button type="submit" class="userButton">Search</button> </a>
<a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/bac/"><button type="submit" class="userButton">BAC</button> </a>';

        }


        $this->load->view('footer');

    }

    public function deleteuser(){
        $this->load->helper('url');
        $this->load->database();

        $user_id = $this->input->post('user_id');

        $sql = ("DELETE FROM users WHERE user_id = $user_id");

        $this->load->view('header');
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id', $user_id);
        $this->db->delete();


    }

    public function updateUser(){
        $this->load->helper('url');
        $this->load->database();

        if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
            unset($_SESSION['username']);
        }

        $this->load->view('header');
        $user_id = $this->input->post('user_id');
        $this->db->select('*');
        $this->db->from('users');
        $array = array('user_id'=>$user_id);
        $this->db->where($array);
        $query = $this->db->get();






        foreach ($query->result() as $row)
        {

            echo '<form class="col-md-6 formDisplay" action="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/completeUpdate/" method="POST"><!--This will post back to the same page. post will also set the input to load into the database.-->
    <label for="firstName">First Name: </label>
    <input type="text" id="firstName" name="firstName" value="'.$row->firstname.'" required><!--Fields are required so I placed required on each input-->
<label for="lastName">Last Name</label>
<input id="lastName" type="text" name="lastName" value="'.$row->lastname.'" required>
<label for="username">User Name: </label>
<input type="text" id="username" name="username" value="'.$row->username.'" required>
<label for="email">Email Address: </label>
<input type="email" id="email" name="email" value="'.$row->email.'" required/>
<label for="password">Password: </label>
<input type="password" id="password" name="password" value="'.$row->password.'" required/>

 <button type="submit" name="user_id" class="userButton" value="' . $row->user_id .'">Enter</button>
</form>
'.$row->user_id;
    }





        $this->load->view('footer');

    }

    public function completeUpdate(){
        $this->load->helper('url');
        $this->load->database();

        $user_id = $this->input->post('user_id');

        $fName = $this->input->post('firstName');
        $lName = $this->input->post('lastName');
        $uName = $this->input->post('username');
        $pass = $this->input->post('password');
        $ema = $this->input->post('email');


        $array = array('firstname'=>$fName, 'lastname'=>$lName, 'username'=>$uName, 'password'=>$pass, 'email'=>$ema);
        $user = array('user_id'=>$user_id);
        $this->db->set($array);
        $this->db->where($user);
        $this->db->update('users');

        echo '<h1>Update Succesful!!</h1>';
    }

    public function searchPage(){
        $this->load->helper('url');
        $this->load->database();

        $this->load->view('header');
        $this->load->view('search');
        $this->load->view('footer');
    }

    public function detailsPage(){
        $this->load->helper('url');
        $this->load->database();

        $drink = $this->input->post('drink');

        $this->db->select('*');
        $this->db->from('drinks');
        $array = array('drink_name'=>$drink);
        $this->db->where($array);
        $query = $this->db->get();
//This is working right I just need to figure out how to display it correctly.
        foreach($query->result() as $row){

            echo '<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://localhost:8888/CodeIgniter-3.0.2/js/jquery-ui.min.js"></script>
    <script src="http://localhost:8888/CodeIgniter-3.0.2/js/bootstrap.min.js"></script>
    <link href="http://localhost:8888/CodeIgniter-3.0.2/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="http://localhost:8888/CodeIgniter-3.0.2/assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <title>Mix This Version 2</title>
</head>
<body>
<header>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="http://localhost:8888/CodeIgniter-3.0.2/">Home</a> </li>
        <li role="presentation"><a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/bac/">BAC</a> </li>
        <li role="presentation"><a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/searchPage/">Search</a> </li>
    </ul>
</header>

<div class="container-fluid bacPage">



            <div class="results"><h3 class="drinkTitle"><b>'.$row->drink_name.'</b></h3><hr><ul class="ingredientDisplay">
            <li>'.$row->Ingredient1.'</li>
            <li>'.$row->ingredient2.'</li>
            <li>'.$row->ingredient3.'</li>
            <li>'.$row->ingredient4.'</li>
            <li>'.$row->ingredient5.'</li>
            <li>'.$row->ingredient6.'</li>
        </ul><hr>
        <p class="directions">Directions:</p>
        <p class="directions">'.$row->recipe.'</p>


        </div>';
        }
        $this->load->view('footer');
    }

    public function resultsPage(){
        $this->load->helper('url');
        $this->load->database();
        $ing = $this->input->post('ingredient');
        $sql = ("Ingredient1 LIKE '%" . $ing . "%' OR ingredient2 LIKE '%" . $ing . "%' OR ingredient3 LIKE '%" . $ing . "%' OR ingredient4 LIKE '%" . $ing . "%' OR ingredient5 LIKE '%" . $ing . "%' OR ingredient6 LIKE '%" . $ing . "%' ORDER BY drink_name");
        $this->db->select('*');
        $this->db->from('drinks');
        $this->db->where($sql);
        $query = $this->db->get();
//This is also done I just need to figure out how to display the results where I want on the page.

        echo '<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://localhost:8888/CodeIgniter-3.0.2/js/jquery-ui.min.js"></script>
    <script src="http://localhost:8888/CodeIgniter-3.0.2/js/bootstrap.min.js"></script>
    <link href="http://localhost:8888/CodeIgniter-3.0.2/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="http://localhost:8888/CodeIgniter-3.0.2/assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <title>Mix This Version 2</title>
</head>
<body>
<header>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="http://localhost:8888/CodeIgniter-3.0.2/">Home</a> </li>
        <li role="presentation"><a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/bac/">BAC</a> </li>
        <li role="presentation"><a href="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/searchPage/">Search</a> </li>
    </ul>
</header>

<div class="container-fluid bacPage">
<div class="row">
        <h1>Your Search Results</h1>
        <hr>
<div class="col-md-6">
';

        foreach ($query->result() as $row) {

            echo '<form action="http://localhost:8888/CodeIgniter-3.0.2/index.php/blog/detailsPage/" method="POST"> <button type="submit" name="drink" class="userButton" value="' . $row->drink_name .'">'.$row->drink_name.'</button>   </form>';

        }
        echo '</div><div class="col-md-6 image"></div></div>';
        $this->load->view('footer');

    }

    public function bac(){
        $this->load->view('bac');
    }

}