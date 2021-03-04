<!doctype html>
<html lang="en" data-theme='light'>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/loginDesign.css">

    <title>Login page</title>
    
  </head>
  <body>


        <?php require_once('API/header.php');
              session_start();

        require_once('API/db_connection.php');
        $conn = OpenCon(); 

        $sql = "SELECT * FROM loaded";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
          require_once('API/myDB.php');
          load();
        }
        
        if(isset($_COOKIE['email'])){
          header('Location: PHP/lists.php');
        }else{
          $_SESSION = array();
              setcookie(session_name(), '', time()-42000, '/');
              session_destroy();
        }
        if(isset($_SESSION['user'])){
          header('Location: PHP/lists.php');
        }?>
        
      <section class="middle">
        <div id="middiv" class="mid">
            <div> 
                <h1 id="Logintitle" style="text-align: center;">USER LOGIN</h1>

            <form method ="POST" id="form1" action = "PHP/lists.php">

            <div id="errLab" >Invalid email or password !</div>
                <br><br><br>

                

                  <label for="exampleInputEmail1">Email :</label>
                  <input type="email" name = "email" class="form-control" id="exampleInputEmail1"  style="width: 300px; margin-bottom: 2em;" aria-describedby="emailHelp" required>
            
             
                  <label for="exampleInputPassword1">Password : </label>
                  <input type="password" class="form-control" name = "password" style="width: 300px;"  id="exampleInputPassword1" required>
                  <br>
                  <input type="checkbox" id = "staylog" value= "on" name= "stay"> <label for="staylog">Stay Logged In</label>
                  <br>
                  <a class="regUrl" href="PHP/resetPassword.php" style="font-size: 1.75em; margin-bottom: -2em; ">Did you forget your password ?</a>                <br>
                <a class = "regUrl" href="PHP/registerPage.php" style="font-size: 1.75em; margin-top : -2em;">No account ? click here to register</a>                <br><br>
                
                
                <input type="submit" class="btn btn-primary" value= "Login" style="width: 100px; position:relative; left:100px; margin-top : -3em;">
              </form>
            </div>
        </div>
      </section>
      <script type="text/javascript">
       function errLabel(){
        document.getElementById('errLab').style.display = 'block';}</script>;

              <?php 

            

              if(isset($_GET["error"]) ){

                  if($_GET["error"] == "yes"){
                    ?> <script type="text/javascript">
                    errLabel();
                    </script>; <?php
                  }
              }
              //if(isset($_GET["logout"])){

                  //if($_GET["error"] == "yes"){
                  //  echo "<div id='logErr'>Wrong email or password!    </div>";
                 // }
              //}

              ?>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <footer id="foot" class="page-footer font-small blue text-white static-bottom">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        Mohamad + Saleh : Web Based 2020
      </div>
      <!-- Copyright -->
    
    </footer>

    <script>

const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

function switchTheme(e) {
    if (e.target.checked) {
      trans();
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); //add this

    }
    else {
      trans();
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light'); //add this

    }    
}


toggleSwitch.addEventListener('change', switchTheme, false);

 function trans(){

    document.documentElement.classList.add("transition");
    window.setTimeout(()=> {
      document.documentElement.classList.remove("transition");},1000) ;
    };

    const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}
    </script>
    <!-- Footer -->
</body>
</html>