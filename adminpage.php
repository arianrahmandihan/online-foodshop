<?php
    
session_start();

if(empty($_SESSION['admin_id'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Login Into Your Admin Account First'); 
            </script>";
        echo"<script>
                window.location = 'admin.php';
            </script>";
		}

?>


<html>
<title>Admin Page</title>

<link rel="stylesheet" type="text/css" href="/final/project/css/style_admin_page.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
    
<head>
    <style>
        .center1 {

            display: flex;
            justify-content: right;
            align-items: right;

        }

        #btn1 {
            border-radius: 20px;
            width: 100px;
            padding: 5px;
        }

    </style>
    <style>
        #flip,
        #flip1 {

            width: 200px;
            padding: 5px;
            text-align: center;
            background-color: #e5eecc;
            border: solid 1px #c3c3c3;
            margin-left: auto;
            margin-right: auto;
            border-radius: 20px;

        }

        #panel,
        #panel1 {

            padding: 20px;
            display: none;
        }

    </style>

    <script>
        $(document).ready(function() {
            $("#flip").click(function() {
                $("#panel").slideToggle(3000);
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            $("#flip1").click(function() {
                $("#panel1").slideToggle(3000);
            });
        });

    </script>
</head>

<body>
    <?php include('navi.php');?>
    <h2 align="center" class="glow"><i class="fas fa-user-cog"></i> Admin Panel</h2>



    <h2 align="right"><?php
             echo "Admin Id:". $_SESSION['admin_id'];
             echo "<br>";
             echo "Admin Password : ".$_SESSION['admin_pass'];
    ?></h2>






    <div class="center1">
        <button id="btn1" onclick="myFunction()">logout</button>
    </div>


    <script>
        function myFunction() {
            // when a user login ,if he/she want to logout then a confirmation massage will appera and a alert message will appera

            var r = confirm("Sure About Logout ?\nPress Ok For Yes");
            if (r == true) {
                alert("SuccessFully Logout");
                window.location = "admin_logout.php";
            } else {
                window.location = "admin.php";
            }
        }

    </script>



    <div id="flip">Click To Show Customer Details</div>
    <div id="panel">
        <table id="tb2" class="center">
            <tr>
                <td>Sl.</td>
                <td>Name</td>
                <td>Gender</td>
                <td>Phone</td>
                <td>Email</td>
                <td>DOB</td>
                <td>User Name</td>
                <td>Password</td>
                <td>Image</td>
                <td colspan="2">Oparetions</td>
            </tr>


            <?php
            $con = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($con, "onlinefoodshop");
            
        $query = "SELECT * FROM customer";
        $data = mysqli_query($con, $query);
        $total = mysqli_num_rows($data);
        
        if($total != 0){
            
            while($result = mysqli_fetch_assoc($data)){
                
                echo "<tr>
            <td>".$result['sl']."</td>
            <td>".$result['name']."</td>
            <td>".$result['gender']."</td>
            <td>".$result['phone']."</td>
            <td>".$result['email']."</td>
            <td>".$result['dob']."</td>
            <td>".$result['uname']."</td>
            <td>".$result['pass']."</td>
            <td>".$result['img']."</td>
            
            <td><a href='/final/project/model/update_admin_page.php?rn=$result[sl]& nm=$result[name]& gn=$result[gender]& phn=$result[phone]& em=$result[email]& db=$result[dob]& un=$result[uname]& ps=$result[pass]& img=$result[img] '><i class='fas fa-edit'></i></a></td>
            
            <td><a href='/final/project/model/delete_admin_page.php?sl=$result[sl]' onclick='return checkDelete()'><i class='fas fa-trash'></i></a></td>
            
            </tr>";
                
            }
            
        }else{
            echo"<script>
                alert('No Record Found'); 
            </script>";
        }
            
            mysqli_close($con);
            
        ?>



        </table>

    </div>


    <!--  2nd Table delivery man  -->

    <div id="flip1">Click To Show Deliveryman Details</div>
    <div id="panel1">
        <table id="tb2" class="center">
            <tr>
                <td>Sl.</td>
                <td>Phone</td>
                <td>Name</td>
                <td>Email</td>
                <td>Password</td>
                <td colspan="2">Oparetions</td>
            </tr>


            <?php
            $con = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($con, "onlinefoodshop");
            
        $query1 = "SELECT * FROM deliveryman";
        $data1 = mysqli_query($con, $query1);
        $total1 = mysqli_num_rows($data1);
        
        if($total1 != 0){
            
            while($result1 = mysqli_fetch_assoc($data1)){
                
                echo "<tr>
            <td>".$result1['sl']."</td>
            <td>".$result1['phone']."</td>
            <td>".$result1['name']."</td>
            <td>".$result1['email']."</td>
            <td>".$result1['password']."</td>
            
            
            <td><a href='/final/project/model/update_admin_page_deliveryman.php?dl=$result1[sl]& dphn=$result1[phone]& dnm=$result1[name]& dmail=$result1[email]& dpass=$result1[password] '><i class='fas fa-edit'></i></a></td>
            
            <td><a href='/final/project/model/delete_admin_page_deliveryman.php?dsl=$result1[sl]' onclick='return checkDelete()'><i class='fas fa-trash'></i></a></td>
            
            </tr>";
                
            }
            
        }else{
            echo "No Record Found!!!!";
        }
            
            mysqli_close($con);
            
        ?>



        </table>

    </div>

    <script>
        function checkDelete() {

            return confirm('Are You Sure? For Delete This Record ?');

        }

    </script>

</body>

</html>
<?php include('foot.php');?>
