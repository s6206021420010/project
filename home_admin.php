<?php echo "Admin";
session_start();
include "navbar_admin.php";
include "header.php";
include "conn.php";
$sql = "SELECT * FROM `event` WHERE event_type=1";
$result = mysqli_query($conn,$sql);
 ?>
 <body>
   <!DOCTYPE html>
   <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
   <html lang="en" dir="ltr">
     <style media="screen">
       .btn-custom{
         margin-left: 9px !important;color:#28a745 !important; border-color: !important; border-radius:30px !important; box-shadow:0px 1px 4px #d6d6d6 !important;padding:13px 10px !important;
       }
       .btn-custom:hover{
         color:white !important; border-color:#28a745 !important; border-radius:30px !important; background:#28a745 !important;
       }
       .nav-link{
         color:#525252;
          font-size: 0.96em;
       }
       .nav-link:hover{
         color:#28a745;;
       }
       #bd{
         display:none;
       }
       body{
         font-family: 'Prompt', sans-serif;
         border-collapse: collapse;
       }
     </style>
   <div class="row-12">

         <nav class="navbar navbar-expand-lg navbar-light " style="position:fixed; z-index:0; width:100%; top:0px; background:#ffffff;">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <a style="margin-left:50px;"class="navbar-brand" href="home.php?user_id=<?php echo $user_id; ?>"><img style="width:3%; position:fixed; left:15px;"src="images/vote.png" alt="">รายการเลือกตั้ง</a>

       <d iv class="collapse navbar-collapse" id="navbarTogglerDemo03">
         <form class="form-inline my-2 my-lg-0" method="get" action="">
           <input  class="form-control mr-sm-2" type="text" name="txt_search" placeholder="Search" aria-label="Search">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         </form>

       <a href="logout.php"class="btn btn-success" style="position:fixed; right:1%; width:10%; height:9%; background:#ffffff00; color:#49915a;padding:10px;">ออกจากระบบ</a>
       </nav>
     <hr style="position: fixed;  z-index:0;width: 107%;top: 40px;height: 0px;">

     </div>
   <div class="row">
     <div class="col-2">
       <ul class="nav flex-column" style="z-index:0;position:fixed; top:58px; width:170px;background:#f4f4f4; height:100%;">
       <li class="nav-item">
         <a class="nav-link" href="show.php?user_id=<?php echo $user_id; ?>" style="left:0px; font-size: 1.1em; color:#525252; width:100%;" ><i class="fas fa-tasks"></i> รายการเลือกตั้ง</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="add_xcell.php?user_id=<?php echo $user_id; ?>" style="left:0px; font-size: 1.1em; color:#525252;" ><i class="fas fa-user-plus"></i> ข้อมูลสมาชิก</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="personal.php?user_id=<?php echo $user_id; ?>" style="left:0px; font-size: 1.1em; color:#525252;" ><i class="fas fa-users-cog"></i> ข้อมูลส่วนตัว</a>
       </li>
       </ul>
     </div>
     <div class="col-10" style="position:absolute;left:14%;top: 12%; z-index:1;">
       <h2>รายการเลือกตั้ง</h2>
       <table class="table table-hover">
         <th>รูปการเลือกตั้ง</th>
         <th>ชื่อการเลือกตั้ง</th>
         <th>รายละเอียดการเลือกตั้ง</th>
         <th>เวลาเปิด</th>
         <th>อนุมัติการเลือกตั้ง</th>

       <?php
       if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
           ?>
           <tr>
             <td><img style="width:100px; object-fit:cover; height:50px; border-radius:3px;"src="images/<?php echo $row["image"]; ?>"></td>
             <td><?php echo $row["event_name"]; ?></td>
             <td><?php echo $row["event_detail"]; ?></td>
             <td><?php echo $row["date_time"]; ?></td>
             <td> <input style="width:100px; height:20px; margin-top:13px;z-index:2; position:absolute;"type="checkbox" name="" value=""></td>
           </tr>

           <?php
       }
     }
        ?>
      </table>
      <input style="width:100px; height:20px;margin-top:1%;z-index:2;right:31%;position:absolute;"type="checkbox" name="เลือกทั้งหมด" value="เลือกทั้งหมด"><h5 style="width:150px; height:20px; margin-top:1%;z-index:2;right:20%;position:absolute;">เลือกทั้งหมด</h5>
      <a href="chang_status.php" style="margin-left:80%; margin-bottom:10%;"  class="btn btn-success"name="">อนุมัติ</a>
      <a href="" style=" margin-bottom:10%;" class="btn btn-danger"name="" >ไม่อนุมัติ</a>

     </div>
   </div>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js">
     </script>
   </html>
