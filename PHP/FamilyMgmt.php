<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../CSS/manageStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Manage Family page</title>
  </head>
  <body class="d-flex flex-column min-vh-100">
    <header>
  <div class="image">
      <a href="lists.php">
      <img src="../CSS/logo.png"  alt="LOGO" class="img-fluid" width="150px" height="150px"></a>
    </div>
    <!-- <div class="header">
        <a href="#default" class="logo"></a> 
        <div class="header-right">
          <a  href="lists.php">Home</a>
          <a  href="myitems.php">My Items</a>
          <a  href="familyList.php">Family List</a>
          <a  href="myFamilyMembers.php"> Family Member</a>
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

<?php 
session_start();



?>
<content >

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <div id= "thirdPart" class="rounded">
        <table class="table table-hover text-center " id="tableMyFamilies">
  <thead class="table-warning">
      <th scope="col">Your families :</th>
  </thead>
  <tbody>
   
  </tbody>
</table>
        </div></div>
        <div class="col-sm-6 col-md-7" id="middle">
            <div id="midPart">
                <div id="innerMid">
                <p id= "searchLabel">Search for a family you would like to join :</p>
            <input v-model="search" class="form-control" type="text" placeholder="Search" aria-label="search"><br>

        <table class="table" id='tableAllFamilies'>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Family Name</th>
      <th class="manage" scope="col">Manager</th>
      <th scope="col" style="text-align:center;">Join</th>
    </tr>
    <tr class="table-group-f" v-for='Family in filterFamily'><td>{{Family.name}}</td><td id="managerName">{{Family.me}}</td><td v-if=Family.request id="thirdCell" style="text-align:center; color:blue;"><strong>Requested</strong></td><td id="thirdCell" style="text-align:center;"  v-else><button type="submit"   class="btn btn-primary" id="requestButton" style="width: 150px; position:relative; ">Request to join</button></td><tr>
  </thead>
  <tbody>

  </tbody>
</table></div></div></div>
        <div class="col-sm-3">
            <div id="firstPart" class="rounded">
            <div class="form-inline well" style=" margin-left: 0.5em;">
                <label for="families" id="manage"> Family you manage :</label> 
                <select class="form-control" id="families" style="position: relative; width: 215px; margin-left:10px;" >
                <option value="None">None</option>
</select>
<button type="submit"   class="btn btn-success" id="createFamilyButton" style="width: 200px; margin-top:5px; position:relative;   ">Create family</button> 
</div>
        <table class="table table-striped" style="margin-top:20px;" id="requestTable">
  <thead >
    <tr>
      <th scope="col">UserMail</th>
      <th scope="col" style="text-align:right;">Accept/Reject</th>
    </tr>
  </thead>
  <tbody>
    
  
  </tbody>
</table></div></div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="ModalCreateFamily">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Create a new family </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="lolo">
            <div class="modal-body" id="autocomplete">
             
              <label for="familyName">Family Name : </label>
              <input type="text" name="familyName" id="familyNameField"   style="width: 200px;" required="required" >
              <label for="familyName" id="ErrorLabel"><strong>Family name does exist ! </strong></label>
              <datalist id="suggestion">
              </datalist>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="BtnCreate">Create</button></form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
          </div>
        </div>
      </div>
</content>
    
      <!-- Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <footer id="foot" class="page-footer bg-dark font-small blue text-white static-bottom mt-auto">

<!-- Copyright -->
<div class="footer-copyright text-center py-3 ">©Copyright:
  Mohamad + Saleh : Web Based 2020
</div>
<!-- Copyright -->

</footer>
      
<script>
        $(document).ready(function() {

          let myFamilies = [];
          let allFamilies = [];
          let viewfamilies = [];
          let members = [];
          let manageList = [];
          let RequestSent =[];
          getMyFamilies();


          $.ajax({
            url: "http://localhost/hw1/API/getNotApprovedRequest.php",
            type: "POST",
            dataType: "JSON",
            data: {
              email: "<?php echo $_SESSION['user']; ?>"
            },
            success: function(response){
              let arrLength = response.length;
              for(var i=0 ; i < arrLength ;i++){
                var familyName = response[i].familyName;
                var manager = response[i].manager.split(' ').join('');
                var userEmail = response[i].userEmail;
                RequestSent.push({"FamilyName": familyName,"Manager": manager,"userEmail": userEmail});
              }
              getList();
            },error: function(){
            }
          });



          $.ajax({
            url: "http://localhost/hw1/API/myManageList.php",
            type: "POST",
            dataType: "JSON",
            data: {
              email: "<?php echo $_SESSION['user']; ?>"
            },
            success: function(response){
              var lengthArr = response.length;

              for(var i =0;i < lengthArr ; i++){
                var familyName = response[i].fname;
                manageList.push(familyName);
              }
              getManageList();

            },error: function(){

            }
           });


           function getManageList(){
             var list = document.getElementById("families");

            if(manageList.length != 0){
              
              for(var i=0;i<manageList.length ; i++){
                var name = manageList[i];
                $('#families').append($('<option>', {
                  text: name
                }));

                }
              }
           }



          function getList(){
          $.ajax({
          url: "http://localhost/hw1/API/all_families.php",
          type: "POST",
          dataType: "JSON",
          data: {
            email: "<?php echo $_SESSION['user']; ?>"
          },
            success: function(response){
              let arrLength = response.length;
              for(var i=0;i < arrLength ; i++){
                var familyName = response[i].fname;
                var managerEmail = response[i].manager;
                var flag = false;
                var found = false;
                for(var k=0 ; k < myFamilies.length ; k++){
                  if(myFamilies[k] === familyName)
                    found = true;
                }
                for(var j=0 ; j < RequestSent.length ; j++){


                  if((RequestSent[j].Manager === managerEmail) && (RequestSent[j].FamilyName === familyName)){
                    flag = true;
                  }
                }
                allFamilies.push(familyName);
                if(flag == false && found == false){
                var family = {name:familyName,me:managerEmail,request:""};
                viewfamilies.push(family);
                console.log(viewfamilies);
                //var row = "<tr><td >" + familyName + "</td><td id='managerName' class='manage'>"+ managerEmail+ '</td><td id="thirdCell" style="text-align:center;"><button type="submit"   class="btn btn-primary" id="requestButton" style="width: 150px; position:relative;   ">Request to join</button></tr>';
                 //$('#tableAllFamilies > tbody').append(row);
                }
                 else if(flag == true && found == false){
                  var family = {name:familyName,me:managerEmail,request:"yes"};
                  viewfamilies.push(family);
                  console.log(viewfamilies);
                  //var row = "<tr><td >" + familyName + "</td><td id='managerName' class='manage'>"+ managerEmail+ '</td><td id="thirdCell" style="text-align:center; color:blue;"><strong>Requested</strong></tr>';
                 //$('#tableAllFamilies > tbody').append(row);
                 }
              }
              
            },error: function(){
              
            }
          });
          }


          $('#families').on('change', function() {
            var selectedFamily = $("#families option:selected").text();
            var emailS= "<?php echo $_SESSION['user']; ?>"
            if(selectedFamily === "None")
              $('#requestTable > tbody').html("");
            else{
              $('#requestTable > tbody').html("");
            $.ajax({
              url: "http://localhost/hw1/API/getRequestsForFamily.php",
              type: "POST",
              dataType: "JSON",
              data: {
                email: emailS,
                fname: selectedFamily
              },success: function(response){
                let length = response.length;
                for(var i =0 ; i < length ; i++){
                  var user = response[i].user;
                  var row ='<tr><td id="userMail"> ' + user + '</td><td style="text-align:right;"><button type="submit"  class="btn btn-success" id="acceptBut" style="width: 70px; margin-top:5px; position:relative;   ">Accept</button> <button type="submit"   class="btn btn-danger" id="rejectBut" style="width: 70px; margin-top:5px; position:relative;   ">Reject</button> </td></tr>';
                  $('#requestTable > tbody').append(row);

                }
              },error: function(){
              }
            });
            }
          });



          $(document).on('click', '#acceptBut', function(){
            var emailUser = $(this).parents("tr").find("#userMail").text();
            var familyName =$("#families option:selected").text();
            emailUser = emailUser.split(' ').join('');

            $.ajax({
              url: "http://localhost/hw1/API/UpdateMemberRequest.php",
              type: "POST",
              data: {
                email: "<?php echo $_SESSION['user']; ?>",
                fname: familyName,
                userEmail: emailUser
              },success: function(response){
              
              },error: function(){
              }
            });

            var rowToRemove = $(this).closest('tr');
                rowToRemove.find('td').fadeOut('fast',function(){
                  rowToRemove.remove();
                })
          });


          $(document).on('click', '#rejectBut', function(){
            var emailUser = $(this).parents("tr").find("#userMail").text();
            var familyName = $("#families option:selected").text();
            emailUser = emailUser.split(' ').join('');
            var managerEmail ="<?php echo $_SESSION['user']; ?>";
            managerEmail = managerEmail.split(' ').join('');
            $.ajax({
              url: "http://localhost/hw1/API/deleteMemberRequest.php",
              type: "POST",
              data: {
                email: "<?php echo $_SESSION['user']; ?>",
                fname: familyName,
                userEmail: emailUser
              },success: function(response){

                
              },error: function(){
              }
            });

            var rowToRemove = $(this).closest('tr');
                rowToRemove.find('td').fadeOut('fast',function(){
                  rowToRemove.remove();
                })
            // $(this).closest("tr").remove();

          });


          function getMyFamilies(){
          $.ajax({
            url: "http://localhost/hw1/API/getFamilies.php",
            type: "POST",
            dataType: "JSON",
            data: {
              email: "<?php echo $_SESSION['user']; ?>"
            },
            success: function(response){
              var length = response.length;
              for(var i = 0;i < length ; i++){
                var name = response[i].fname;
                myFamilies.push(name);
                allFamilies.push(name);
              }
              addToMyFamilies();
            },error: function(){
         
            }
          });}

          
        $("#createFamilyButton").click(function(e){
            $('#ModalCreateFamily').modal('show');
        });



        $("#BtnCreate").click(function(e){
          let text = $('#familyNameField').val();
          let flag = false;
          let lengthArr = allFamilies.length;
          for(var i=0;i<lengthArr;i++){
            if(allFamilies[i].toLowerCase()=== text.toLowerCase())
              flag=true;
          }
          if(text.length == 0){

          }
          else if(flag == false ){
          $.ajax({
            url: "http://localhost/hw1/API/createFamily.php",
            type: "POST",
            dataType: "JSON",
            data: {
              email: "<?php echo $_SESSION['user']; ?>",
              familyName: text
            },success: function(response) {
              getMyFamilies();
            },
            error: function() {
              // do action
            }
          });
          }else{
            e.preventDefault();
            document.getElementById("ErrorLabel").style.display ="block";

          }
        });



        function addToMyFamilies(){
          
          $("#tableMyFamilies:not(:first)").remove();
          var list = document.getElementById("families");

          if(myFamilies.length != 0){
            
            for(var i=0;i<myFamilies.length ; i++){
              var name = myFamilies[i];
              // $('#families').append($('<option>', {
              //   text: name
              // }));
              var row = "<tr><td>" + name + "</td></tr>";
            $('#tableMyFamilies > tbody').append(row);

            }
          }
        }



        $(document).on('click', '#requestButton', function(e) {
          let familyName = $(this).parents("tr").find("td:first").html();
            let managerName = $(this).parents("tr").find("#managerName").text();

            $.ajax({
              url: "http://localhost/hw1/API/enterMember.php",
              type: "POST",
              data: {
                email: "<?php echo $_SESSION['user']; ?>",
                manager: managerName,
                family: familyName
              },
              success: function(response){
                
              },error: function(){
                console.log("Error");
              }
            });
            var i = 0;
            for(i = 0; i < viewfamilies.length;i++){

              if(viewfamilies[i].name === familyName){
                viewfamilies[i].request = "yes";
                break;
              }



            }
            //var family = {name:familyName,me:managerEmail,request:""};
            machine.updateArray();
            //var new_row = '<tr><td>' + familyName +'</td><td>'+ managerName +'</td><td id="requested" style="text-align:center; color:blue;"><strong>Requested</strong></td></tr>';
            //$(this).parent().parent().replaceWith(new_row);
        });

       var machine = new Vue({
          el:"#middle",
          data:{
            FamilyList: viewfamilies,
            search:""
          },
          computed: {
            filterFamily () {
              var self=this;
               return this.FamilyList.filter(function(fam){return fam.name.toLowerCase().indexOf(self.search.toLowerCase())>=0;});
            }
    }, methods:{
            updateArray: function(event) {
                var self=this;
                self.FamilyList = viewfamilies;
        
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