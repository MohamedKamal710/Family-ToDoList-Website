<?php 

    function load(){

        $dbhost = "localhost";
        $dbuser = "root";
        $db = "petek";
        $conn = new mysqli($dbhost,$dbuser,"") or die("Connect failed: %s\n". $conn -> error);
        mysqli_select_db($conn,$db);

        $queries = "INSERT INTO users (email,password,verfied,vkey) VALUES
            ('test1@gmail.com','Aa123','1','Z6FB19KUVIGPSQ0RJCAAAA5YOHTNXM4L2DW'),
            ('test2@gmail.com','Aa123','1','123456789IGPSQ0RJCAAAA5YOHTNXM4L2DW'),
            ('test3@gmail.com','Aa123','0','Z6FB19BLIIGPSQ0RJCASS25YOHTXNM4JWSW');";
        $conn->query($queries);
        $queries = "INSERT INTO lists (email,listID) VALUES
            ('test1@gmail.com','1'),
            ('test1@gmail.com','2'),
            ('test1@gmail.com','3'),
            ('test2@gmail.com','1'),
            ('test2@gmail.com','2'),
            ('test2@gmail.com','3'),
            ('test2@gmail.com','4'),
            ('test2@gmail.com','5'),
            ('test3@gmail.com','1'),
            ('test3@gmail.com','2'),
            ('test3@gmail.com','3'),
            ('test3@gmail.com','5'),
            ('test3@gmail.com','4');";
        $conn->query($queries);
        $queries = "INSERT INTO items (email,listID,itemName,quantity,states) VALUES
            ('test1@gmail.com','1','Bamba',null,''),
            ('test1@gmail.com','2','Humous',null,''),
            ('test1@gmail.com','3','Potato',10,'bought'),
            ('test1@gmail.com','3','Chips',7,'bought'),
            ('test1@gmail.com','3','Shawarma',null,''),
            ('test1@gmail.com','3','Meat 5kg',null,''),
            ('test1@gmail.com','3','Chicken',null,''),
            ('test1@gmail.com','3','Cheese',5,'bought'),
            ('test1@gmail.com','3','Rice',10,'bought'),
            ('test2@gmail.com','4','Besli',15,'bought'),
            ('test2@gmail.com','4','Bannana',15,'bought'),
            ('test2@gmail.com','4','Avocado',null,''),
            ('test2@gmail.com','4','Cucambers',null,''),
            ('test2@gmail.com','4','Tomatos',null,''),
            ('test2@gmail.com','4','basil',20,'bought'),
            ('test2@gmail.com','4','berry',30,'bought'),
            ('test2@gmail.com','1','Sauce',15,'bought'),
            ('test2@gmail.com','1','Bannana',15,'bought'),
            ('test2@gmail.com','1','Milk',null,''),
            ('test2@gmail.com','1','Bats',null,''),
            ('test2@gmail.com','1','Onions',null,''),
            ('test2@gmail.com','1','Chedder',20,'bought'),
            ('test1@gmail.com','2','Pizza',30,'bought'),
            ('test1@gmail.com','2','Cornflakes',15,'bought'),
            ('test1@gmail.com','2','Shoko',15,'bought'),
            ('test1@gmail.com','2','Cottetge',null,''),
            ('test1@gmail.com','2','Fish',null,''),
            ('test1@gmail.com','2','Tuna',null,''),
            ('test1@gmail.com','2','Jalapeneo',20,'bought'),
            ('test1@gmail.com','2','Lobster',30,'bought');";
        $conn->query($queries);
        $queries = "INSERT INTO family (managerEmail,familyName) VALUES
            ('test2@gmail.com','Richardson'),
            ('test2@gmail.com','Jackson'),
            ('test2@gmail.com','Seid'),
            ('test2@gmail.com','Bezos'),
            ('test2@gmail.com','Jobs'),
            ('test1@gmail.com','Khali'),
            ('test1@gmail.com','Cena'),
            ('test1@gmail.com','Johnson'),
            ('test1@gmail.com','Buckbeek'),
            ('test2@gmail.com','Statham');";
        $conn->query($queries);
        $queries = "INSERT INTO memberIn (userEmail,familyName,managerEmail,ApproveStatus) VALUES 
            ('test1@gmail.com','Statham','test2@gmail.com','Y'),
            ('test1@gmail.com','Bezos','test2@gmail.com','Y'),
            ('test1@gmail.com','Jobs','test2@gmail.com','Y'),
            ('test2@gmail.com','Cena','test1@gmail.com','Y'),
            ('test2@gmail.com','Khali','test1@gmail.com','Y'),
            ('test2@gmail.com','Buckbeek','test1@gmail.com','Y');";
        $conn->query($queries);
        $queries = "INSERT INTO itemsInFamilyList (familyName,itemName,quantity,states) VALUES 
            ('Jobs','Lamb',20,'bought'),
            ('Jobs','Oreos',20,'bought'),
            ('Jobs','Tuna',20,'bought'),
            ('Jobs','Salamon',NULL,''),
            ('Jobs','Fish',25,'bought'),
            ('Jobs','Tesla',30,'bought'),
            ('Jobs','Steak',NULL,''),
            ('Buckbeek','Chips',NULL,''),
            ('Khali','KitKat',20,'bought'),
            ('Khali','Jam',20,'bought'),
            ('Khali','Grape Leaves',20,'bought'),
            ('Khali','Potato',NULL,''),
            ('Khali','Chicken',25,'bought'),
            ('Khali','Tesla',30,'bought'),
            ('Khali','Steak',NULL,''),
            ('Khali','Olives',null,'');";
            if(!$conn->query($queries)){
                echo ($conn->error);
                }

        $queries = "INSERT INTO loaded (checker) VALUES (1);";
        $conn->query($queries);
        

  
        

}








?>
