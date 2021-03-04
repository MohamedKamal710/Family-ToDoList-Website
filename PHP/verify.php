
<html lang="en">
<?php


if(isset($_GET['token']) && !isset($_GET['email']) && !isset($_GET['send'])){
    $vtoken = $_GET['token'];
    $query = "UPDATE users SET verfied = '1' WHERE vkey = '$vtoken' ";
    include "../API/db_connection.php";
    $conn = OpenCon();
   $select = mysqli_query($conn, $query) or exit(mysqli_error($conn));
   header("Location: http://localhost/hw1/web.php");
   exit();
}




?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
  
   
    <link rel="stylesheet" href="../CSS/verifyd.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
   
    <title>Reset Password</title>
    
  </head>
 
  <body>



            <?php require_once('../API/header.php'); ?>
            
              <section class="middle">
                <div id="middiv" class="mid " style="text-align:center;">
            <div> 
                <h1 id="Registertitle" style="text-align: center; color: darkblue; font-family :font2; ">Verify Your Email</h1>
            <form id="form1"><br>
                <br><br id="br">
                <div class="form-group">
                <p id="parag" ><b>Account Has Not Been Verified Yet</b></p>
                
              
                </div>
                  <br>
                
                <button id="regBut" type="button" class="btn btn-primary"  style="width: 250px; margin-right: 10%;">Resend Email</button>
                <br><br>
                <label id="emailSent"><b>An email has been sent ! ,Please check your inbox.</b></label>
              </form>
            </div>
        </div>
      </section>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



      <footer id="foot" class="page-footer font-small blue text-white static-bottom">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
          Mohamad + Saleh : Web Based 2020
        </div>
        <!-- Copyright -->

      </footer>
      <!-- Footer -->

        <?php 

            include "../API/db_connection.php";
            $token;
            $conn = OpenCon();
            $email = $_GET["email"];
            $select = "SELECT * FROM `users` WHERE `email` = '$email'";
            $result = $conn->query($select);
            while($row = mysqli_fetch_array($result)){
                $token = $row['vkey'];
            }
    
    
 ?>


      <script>

      
      $(document).ready(function(e) {
    
    if (window.location.href.indexOf("send") > -1) {
        // $("#parag").text("Thank you for registering in our website .             Verification email has been sent! Check Your Inbox");
        document.getElementById("parag").innerHTML = "Thank you for registering in our website . <br>   Verification email has been sent! Check Your Inbox";
        // document.getElementById("parag").style.color ="Blue";
               
    
        var token = "<?php echo $token; ?>";
        var receiver = "<?php echo $email; ?>";
        
    
                             
                             
         $.ajax({
                url: "../API/sendvEmail.php",
                type: "POST",
                dataType: "JSON",
                data: {
                  sentTo: receiver ,
                  vtoken: token
                },
                success: function(response) {
                        },
                        error: function() {
                            // do action
                          
                        }
              });

              }

             if (window.location.href.indexOf("email") == -1) {
                window.location.href ="../Web.php";

              }


     $(document).on('click', '#regBut', function(e) {

            

        var receiver = "<?php echo $email; ?>";
        var token = "<?php echo $token; ?>";
        

    
                             
                             
        $.ajax({
                url: "../API/sendvEmail.php",
                type: "POST",
                dataType: "JSON",
                data: {
                  sentTo: receiver ,
                  vtoken: token
                },
                success: function(response) {

                        },
                        error: function() {
                            // do action
                          
                        }
              });
              document.getElementById("emailSent").style.display = "inline";
                        setTimeout(function () {
                            $("#emailSent").fadeOut("slow"); },2000);

     });

              });

              
             
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
       
</body>




    

</html>