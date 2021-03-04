<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../CSS/familyStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Lists</title>
  </head>
  <body>
    
  <div class="image">
      <a href="lists.php">
      <img src="../CSS/logo.png"  alt="LOGO" class="img-fluid" width="150px" height="150px"></a>
    </div>
    <!-- <div class="header">
        <a href="#default" class="logo"></a> 
        <div class="header-right">
          <a  href="lists.php">Home</a>
          <a  href="myitems.php">My Items</a>
          <a  href="familyMgmt.php">Manage Family</a>
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

      <div id="first" class="bg-dark" >
      <div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox" />
        <div class="slider round"></div>
    </label>
    <em style=" color:white;"> Dark Mode!</em>

    </div>
      </div> 



      <?php 
              session_start();



      ?>
    
      
      <!-- <div id="first" class="bg-dark"></div>  -->
      <div class="container-fluid d-flex h-100 flex-column  ">
      <div class="row flex-fill d-flex justify-content-start" id="background">
        <div class="col-3 bg-primary marg1" id="marg"><col-3></div>
        <div class="col-6" id="mid">
          <div id="whiteDiv">     
          <!-- <p id="familyLabel" style="text-align:center;">{{dieFamilie}}</p>     -->
            <div class="form-inline well" style=" margin-left: 1em; ">
                <label for="fam1" style="font-size: large; text-align:center; " ><strong>Select family:</strong></label>
                <select class="form-control" id="fam1" style="position: relative; width: 300px; margin-left:10px; text-align:center; " >
                <option value="0">None</option>
                   
                </select>
               
              </div>
              
              <form id="form2" class="form-inline">
                
                <div class="col-sm-12" id="listItem2"> <div id="list1" class="mt-2" >
                  <!-- <h3 id="listname" style="right: 0.5em; position: absolute; color: rgba(109, 109, 109, 0.89);">List 1</h3> -->
                  <input id="itemname" v-model="itemtobeAdded" class="form-control" type="text" aria-label="search" style="width: 16rem;" maxLength="30">
                  <button type="submit"   class="btn btn-success" id="buttonList3" style="width: 7rem; position:relative;   ">Add Item</button> </div>
    
                  
                </form>
                  <div class="dodo" style=" border-top: 1px solid rgba(41, 40, 40, 0.253); margin-top: 20px; ">
                    <table class="table" id="table1">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Item name</th>
                          <th scope="col" style="text-align: center;">Quantity</th>
                          <th scope="col"></th>
                        </tr>
                      
                      </thead>
                      <tbody id="tbid0">
                      

                      <tr v-for="item in filterAtoBnonB"><td id='namet'>{{item.itemName}}</td><td style="text-align:center;"><input type='number' id='quan' class='quantity1' style='width: 50px; text-align: center;' value='1' ></td><td style='text-align: right;'><a href="#" class="btnBuyNow">Buy now</a>&nbsp|&nbsp
               <a href="#" class="btnRemove">Remove</a></td></tr>
               <tr v-if="itemtobeAdded"><td>{{itemtobeAdded}}</td><td style="text-align:center;"><input type='number' id='quan' class='quantity1' style='width: 50px; text-align: center;' value='1' ></td></tr>
                      </tbody>
                    </table>
                  </div>
                  <div id="border" class="contrainer" style="border-top: 1px solid rgba(0, 0, 0, 0.233); margin-top: 5cm; text-align: center;">
                    <span style="align-content: center; color: rgba(0, 0, 0, 0.5);">Purchased items</span>
                    <table id="table2" class="table table-hover" style="text-align: left; background-color: rgba(31, 218, 47, 0.308); margin-top: 7px;">
       
                      <tbody id="tbid2">
                        <tr v-for="item in filterAtoB"><td class="nameu">{{item.itemName}} x{{item.quan}}</td><td style='text-align: right;'><a href="#" class="btnUndo">Undo</a></td></tr>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>

            </div>








        <div class="col-3 bg-primary marg" id = "marg"></div>
      </div>
      </div>

   










    
      <!-- Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->

    <script>

      let boughtItems = [];
      let notboughtItems = [];

      var machine = new Vue({
          el:"#whiteDiv",
          data:{
            boughtitems: boughtItems,
            notboughtitems: notboughtItems,
            itemtobeAdded: ""
          },
          computed: {
            filterAtoB : function(event) {
              var self=this;
               return self.boughtitems.sort((a, b) => { return b.itemName - a.itemName;});
    },
          filterAtoBnonB : function(even) {
              var self=this;
               return self.notboughtitems.sort((a, b) => { return b.itemName - a.itemName;});
     }
          },
     methods:{

      
     
            updateArray: function(event) {
              var self=this;
               self.boughtitems = boughtItems;
               self.notboughtitems = notboughtItems;
  


        
    },
    updateAddition: function(event) {
              var self=this;
               this.itemtobeAdded = "";
  

    }
 
         
      }
          
          
        });
    




    $(document).ready(function(){
      let myFamilies = [];
      let selectedFamilyName = " ";
      


   

      getMyFamilies();

      var el = $("#buttonList3");
        var el1 = $("#itemname");
        el.hide();
        el1.hide();

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
              }
              addToFamilyList();
            },error: function(){
         
            }
          });}


          function addToFamilyList(){
            if(myFamilies.length != 0){
            
            for(var i=0;i<myFamilies.length ; i++){
              var name = myFamilies[i];
              $('#fam1').append($('<option>', {
                text: name
              }));
            }
          }
          }

          var win = $(window); //this = window
            if (win.width() >= 720) {
                $("#mid").removeAttr('class', "col-12");
                $("#mid").addClass("col-6");
                $("#marg").show();
            }
            if (win.width() < 720) {

                $("#mid").removeAttr('class', "col-6");
                $("#mid").addClass("col-12");
                $("#marg").hide();


            }

          $(window).on('resize', function() {
            var win = $(this); //this = window
            if (win.width() >= 720) {
                $("#mid").removeAttr('class', "col-12");
                $("#mid").addClass("col-6");
                $("#marg").show();
            }
            if (win.width() < 720) {

                $("#mid").removeAttr('class', "col-6");
                $("#mid").addClass("col-12");
                $("#marg").hide();


            }
        });


          

      $('#fam1').on('change', function() {


        selectedFamilyName = $("#fam1 option:selected").text();
        if(selectedFamilyName === 'None'){
            notboughtItems = [];
            boughtItems = [];
            var el = $("#buttonList3");
            var el1 = $("#itemname");
            el.hide();
            el1.hide();
            machine.updateArray(); 
        }else{
          notboughtItems = [];
          boughtItems = [];
          machine.updateArray();
          var el = $("#buttonList3");
          var el = $("#buttonList3");
          var el1 = $("#itemname");
          el.show();
          el1.show();

        $.ajax({
                    url: "http://localhost/hw1/API/itemsInFamilyList.php",
                    type: 'POST',
                    data: {
                        fname: selectedFamilyName,
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        var len = response.length;
                        for (var i = 0; i < len; i++) {
                            var name = response[i].itemName;
                            var state = response[i].states;
                            var quanti = response[i].quan;
                            if (state === "bought") {
                
                                var item = {itemName:name,quan:quanti,states:state};
                                boughtItems.push(item);


                            } else {
                                var item = {itemName:name};
                                notboughtItems.push(item);

                            }


                        }
                        machine.updateArray();

                    },
                    error: function() {
                    // do action
                }

                });




        }
      });


      $("#buttonList3").click(function(e){
        selectedFamilyName = $("#fam1 option:selected").text();
        e.preventDefault();
          if($('#itemname').val().length == 0){
            // put error here 
          }
          else {
            var sign = 0;
            var itemn = $('#itemname').val();
            for(var i = 0 ; i < boughtItems.length ; i++){
              if(boughtItems[i].itemName === itemn){
                sign = 1;
              }
            }
            for(var j = 0 ; j < notboughtItems.length ; j++){
              if(notboughtItems[j].itemName === itemn){
                sign = 1;
              }
            }

            if(sign == 1){

              document.getElementById("itemname").value = "";
              machine.updateAddition();

            }
            else{
              

              $.ajax({
                        url: "../API/addItemToFamilyList.php",
                        type: "POST",
                        datatype: "json",
                        data: {
                            fname:selectedFamilyName,
                            item: itemn
                        },
                        success: function(response) {
                          var newitem = {itemName:itemn};
                          notboughtItems.push(newitem);
                          $('#itemname').val('')
                          machine.updateArray();
                          machine.updateAddition();
                        },
                        error: function() {
                            // do action
                        }
                    });

            }
          }

         
      });
     
      $(document).on('click', '.btnRemove', function(e) {
            let itemname = $(this).parents("tr").find("td:first").html();
            selectedFamilyName = $("#fam1 option:selected").text();
            $.ajax({
                url: "http://localhost/hw1/API/removeItemFromfl.php",
                type: "POST",
                data: {
                    fname : selectedFamilyName,
                    itemName: itemname
                },
                success: function(response) {
                
                  for(i=0 ; i < notboughtItems.length;i++){
                  if(notboughtItems[i].itemName === itemname){
    
                    break;
                    
                    
                  }
                }
                notboughtItems.splice(i,1);
                
                machine.updateArray();
                },
                error: function() {

                }
            });

        })

      $(document).on('click', '.btnBuyNow', function(e) {


          selectedFamilyName = $("#fam1 option:selected").text();
          let rw = $(this).parents("tr");
          let itemname = $(this).parents("tr").find("td:first").text();
          let quanti = $(this).parents("tr").find("#quan").val();
          if(quanti == null){
              quanti = 1;
          }


          $.ajax({
              url: "http://localhost/hw1/API/updateItemInfl.php",
              type: "POST",
              datatype: "json",
              data: {
                  fname: selectedFamilyName,
                  item: itemname,
                  quan: quanti
              },
              success: function(response) {
                for(i=0 ; i < notboughtItems.length;i++){
                  if(notboughtItems[i].itemName === itemname){
                    
                    var item = {itemName:notboughtItems[i]['itemName'],quan:quanti};
                    boughtItems.push(item);
                    break;
                    
                    
                  }
                }
                notboughtItems.splice(i,1);
                
                machine.updateArray();
              },
              error: function() {

              }

            

          });
          machine.updateArray();
        })

            $(document).on('click', '.btnUndo', function(e) {

              selectedFamilyName = $("#fam1 option:selected").text();
            e.preventDefault();
            let str = $(this).parents("tr").find("td:first").html();

            let name = str.substring(0, str.lastIndexOf(" "));




            $.ajax({
                url: "http://localhost/hw1/API/unbuyItem.php",
                type: "POST",
                datatype: "json",
                data: {
                    fname:selectedFamilyName,
                    item: name
                },
                success: function(response) {
                  var i = 0;
                  for(i=0 ; i < boughtItems.length;i++){

                  if(boughtItems[i].itemName === name){
                    var item = {itemName:boughtItems[i]['itemName']};
                    notboughtItems.push(item);
                     break;
                  }
                    
                  }
                  boughtItems.splice(i,1);
                  machine.updateArray();

                },
                error: function() {

                }
            });
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
  <footer id="foot" class="page-footer font-small blue text-white static-bottom">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">©Copyright:
      Mohamad + Saleh : Web Based 2020
    </div>
    <!-- Copyright -->
  
  </footer>
          
          


        </html>