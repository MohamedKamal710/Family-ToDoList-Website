<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/myitemsdesign.css">

    <title>My Items</title>
    
  </head>
<body>


<?php

  session_start();
  if(!isset($_SESSION['user'])){
    header('Location: http://localhost/hw1/web.php');
    exit();
  }
 
  



  
  
  
  
  ?>

<body class="d-flex flex-column min-vh-100">
<header>
<div class="image">
      <a href="../PHP/lists.php">
      <img src="../CSS/logo.png"  alt="LOGO" class="img-fluid" width="150px" height="150px"></a>
    </div>
    <!-- <div class="header">
        <a href="#default" class="logo"></a> 
        <div class="header-right">
          <a  href="lists.php">Home</a>
          <a  href="familyList.php">Family List</a>
          <a  href="FamilyMgmt.php">Manage Family</a>
          <a  href="lists.php?changepass=1">Change Password</a>
          <a  href="lists.php?logout=yes">Logout</a>
        </div>
      </div> -->
      <div class="topnav" id="myTopnav">
        <a href="#default" class="logo"></a> 
        <div class="header-right">
          <a  href="lists.php">Home</a>
          <div class="dropdown">
    <button class="dropbtn">Family
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
                    <a  href="familyList.php">Family List</a>
                    <a  href="FamilyMgmt.php">Manage Family</a>
                    <a  href="myFamilyMembers.php"> Family Member</a>
</div>
</div>
          <a  href="lists.php?changepass=1">Change Password</a>
          <a  href="myitems.php">My Items</a>
          <a  href="lists.php?logout=yes">Logout</a>
          <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
      </div>

      <div id="first" class="bg-dark">

      <div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox" />
        <div class="slider round"></div>
  </label>
  <em style=" color:white;"> Dark Mode!</em>
</div>
      </div> 
</header>

     <content>
      <div class="container" id="screen">
    <div class="row">
        <div class="col-md-2"></div>
        <div id="middiv" class="col-md-8 d-flex justify-content-center text-center" style="background-color: white;">
        <form>
        <div class="form-row">
          <h2>My Purchased Items </h2>
          </div>
          <div class="form-row">
        <input v-model="search" class="form-control" type="text" placeholder="Search" aria-label="search"><br> 
        </div>
        <from>
        </div> 
        
        <div class="col-md-2"></div>
</div>
        
    <div class="row" style="">    

      <!--Table-->
      <div class="col-md-2"></div>
        <div id="middiv" class="col-md-8 d-flex justify-content-center text-center" style="background-color: white;">
         
 <table id="table1" class="table" style="margin-top:10px;">
 <!--Table head-->
   <thead>
     <tr>
       <th>#</th>
       <th>Items Name</th>
       <th>List</th>
       <th>Quantity</th>
       <th>Edit</th>
</tr>
   </thead>
   <!--Table head-->
   <!--Table body-->
   <tbody>
   <tr v-for='Item in filterItems'><td>{{Item.id}}</td><td id='namet'>{{Item.itemName}}</td><td id='listi'>{{Item.listi}}</td><td id='quan'>{{Item.Quantity}}</td><td><button type='button' id='del' class='btn btn-danger'>Delete</button> <button type='button' id='edi' class='btn btn-danger'>Edit Name</button></td></tr>
  </tbody>
   <!--Table body-->
 </table>
 <!--Table-->
</div>
<div class="col-md-2"></div>
</div>
</div>



  
</content>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   
<footer id="foot" class="page-footer bg-dark font-small blue text-white static-bottom mt-auto">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">©Copyright:
  Mohamad + Saleh : Web Based 2020
</div>
<!-- Copyright -->

</footer>

<div class="modal" tabindex="-1" role="dialog" id="ModalRemove">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Rename</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p id="modalp">Type A New Name</p>
              <input class="form-control" id="newName" type="text" required="required" placeholder="New Name">
              <label id="wrong"></label>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="rem">Change Name</button>
            </div>
          </div>
        </div>
      </div>


<script>



$(document).ready(function() {

      let items = new Array();
        
        
        $.ajax({
            url: '../API/getPurchasedItems.php',
            type: 'POST',
            data: {
                email: "<?php echo $_SESSION['user']; ?>"
            },
            dataType: 'JSON',
            success: function(response) {
              
                
                var len = response.length;
                for (var i = 0; i < len; i++) {
                  console.log(response[i].itemName);
                  var item = {id:i+1,itemName:response[i].itemName,listi:response[i]['listID'],Quantity:response[i].quantity};
                   
                    items.push(item);

                }

                
                for(i = 0;i < items.length;i++){

                  

                  var name = items[i]['itemName'];
                  var quantity = items[i]['Quantity'];
                  var listnr = items[i]['listi'];


                }
            },
                error: function() {
                    
                }


               


        });

       


        $(document).on('click', '#del', function(e) {

            e.preventDefault();
            let name = $(this).parents("tr").find("#namet").text();
            console.log(name);
            var listn =  $(this).parents("tr").find("#listi").text();

            $.ajax({
                url: "../API/deleteItem.php",
                type: "POST",
                datatype: "json",
                data: {
                    email: "<?php echo $_SESSION['user']; ?>",
                    item: name,
                    list: listn

                },
                success: function(response) {

                },
                error: function() {
                    // do action
                }
            });

            $(this).parents("tr").remove();


        });


                  $(document).on('click', '#edi', function(e) {
                    
                    e.preventDefault();
                    $("#ModalRemove").modal('show');
                    let name = $(this).parents("tr").find("#namet").text();
                    let listn = $(this).parents("tr").find("#listi").text();
                    let row = $(this).parents("tr")
                    let newtext;

                    $("#rem").click(function() {

                      if($("#newName").val().length > 0){
                        newtext = $("#newName").val();
                        document.getElementById("wrong").style.visibility="hidden";

                        $.ajax({
                            url: "../API/changeItemName.php",
                            type: "POST",
                            datatype: "json",
                            data: {
                                email: "<?php echo $_SESSION['user']; ?>",
                                item: name,
                                new : newtext,
                                list : listn
                            },
                            success: function(response) {

                              for(var i=0 ; i < items.length ; i++){
                                if(items[i]['itemName'] === name && items[i]['listi'] === listn){
                                  items[i]['itemName'] = newtext;
                                }
                              }

                            },
                            error: function() {
                                // do action
                            }

                  });





                        $("#ModalRemove").modal('hide');
                        row.find("#namet").html(newtext);

                      }
                      else{
                        console.log("bats");
                        var label = document.getElementById("wrong");
                        label.innerText = "Fill A Name!!";
                      }
                   });
                 

               
                 


          });


          new Vue({
          el:"#screen",
          data:{
            itemsList: items,
            search:""
          },
          computed: {
            filterItems () {
              var self=this;
               return this.itemsList.filter(function(fam){return fam.itemName.toLowerCase().indexOf(self.search.toLowerCase())>=0;});
    }
      }
          
          
        });





        
        


});


function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}


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