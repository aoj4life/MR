<?php 
  error_reporting(E_ALL ^ E_NOTICE);
   include 'head.php'; 
   include 'connect.php';
   include 'token.php';
   $email = $_SESSION['email']; 
   $yourname = $_SESSION['yourname']; 
   //$_SESSION['sum'] = $result;

   ?>



<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" type="text/css" href="style2.css">
<div class="content-wrapper">



   <!-- Content Header (Page header) -->
   <div style="background-color: #00ffcc; margin: 0; padding-bottom: 15px; border-radius: 20px;">
      <section class="content-header">
         <h1>
            Receive Donations.... Giving Precede Receiving!!!!<br>
            <i style="color: red"><strong> Up and Running...!!!</strong> </i>
         </h1>
         <ol class="breadcrumb">
            <li><a href="dash.php"><i class="fa fa-dashboard"></i> My Page</a></li>
            <!--li><a href="#">Examples</a></li-->
            <li class="active">Get Donations</li>
         </ol>
      </section>
   </div>
   <!-- Main content -->

      <?php 

              if (isset($_SESSION['errMsg45'])) {
               echo "<div id='error_msg' style='margin-top: 5px;  margin-bottom: 5px;'>".$_SESSION['errMsg45']."</div>";

               unset($_SESSION['errMsg45']);
             }
             if (isset($_SESSION['errMsg44'])) {
               echo "<div id='error_msg' style='margin-top: 5px;  margin-bottom: 5px;'>".$_SESSION['errMsg44']."</div>";

               unset($_SESSION['errMsg44']);
             }
           if (isset($_SESSION['errMsg77'])) {
               echo "<div id='error_smsg' style='margin-top: 5px;  margin-bottom: 5px;'>".$_SESSION['errMsg77']."</div>";

                 unset($_SESSION['errMsg77']);
             }

          ?>
   <section class="content">
      
      
         <div class="row">
           <div class="col-md-6"-->
      
      
        
          <!-- note-->
      <div class="pad margin no-print">
         <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            <!--div class="callout callout-success"-->
            <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4><u>To Receive Donations You Must Have Given Donations:</u></h4>
               <ul>
                  <li>
                     The  <strong> steps</strong> herein must be completed and understood:
                     <ol>
                        <li><strong>Click the Get Donations{ Cash out} button.</strong></li>
                        <li><strong>All available total are display in the Availability View form.</strong></li>
                        <li><strong>Click on Donations Cashout button on the possible cashout form.</strong></li> 
                        <li><strong>Relax you will be matched pronto.</strong></li>
                     </ol>
                  </li>
                  <br>
                  <li><strong><i>Bit Bonus 5%.!!! You will be qualified for Bit Bonus if you make another pledge before you RD{cash out}. Donation remain with you untill callout . Take it. It a WIN WIN..</i></strong></li>
                  <li style="color: #ff0000;"><strong>It is not possible to withdraw only bonuses without matured donation(s). The platform is Designed to subsist.</strong></li>
                  <li><strong>When donation is received, you may give the system feedback by writing a letter of proof..</strong></li>
                   <li style="color: #000;"><strong>YOU MUST MAKE ANOTHER PLEDGE WITHIN 48HRS AFTER RECEIVING THIS DONATION. THANKS</strong>
                   <li style="color: #000;"><strong>Account degradation begins after 48hrs of receiving Donation without a recommitment. <u>Remember the strength of one is the strength of all</u>. Be good. THANKS</strong>
                   </li>
               </ul>
            </div>
         </div>
      </div>
      <!-- end note-->
          
          
          
         </div>
          
          
          
          
          
         <div class="col-md-6">

 <div style="margin-bottom: 20px; ">
            <form method="POST">
               <button style="height: 90px; border-radius: 40px; box-shadow: 0 8px 0 #1b383b; margin-bottom: 35px; margin-top: 30px; max-width:80%; margin-left: 10%; " type="submit"  name="gh" class="btn btn-block btn-danger btn-lg"><span>Get Donations {Cash out}.</span></button>
        
            </form>
            
<!-- call out start here -->
            <?php

               $sql_query="SELECT * FROM getdonations WHERE email='$email' AND status='pending cashout' ORDER by time DESC limit 7";
               $result_set=mysqli_query($con,$sql_query);
               while($row=mysqli_fetch_row($result_set))
               {
               
                $date = $row[7];
                $money = number_format($row[5], 0, '.', ',');
                $name = $row[3];
                    echo "
                    <table>
                    <tr>
                      <td>
                      
                      <!--div class=\"col-md-5\"-->
                        <div class=\"box box-default\" style=\"height:250px;\">
                          <div class=\"box-header with-border\">
                            <i class=\"fa fa-bullhorn\"></i>
               
                            <h3 class=\"box-title\">Callouts</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class=\"box-body\" >
                            <div class=\"callout callout-warning\" style=\"height:185px;\">
                              <h4>Donation Request</h4>
               
                              <p>Participant: <strong>$name</strong><br>
                              Amount:<strong> $money <span>NGN</span> </strong><br>
                              Date: <strong>$date </strong><br>
                              Status: Your request has been received. Wait patiently to be matched with other participants for Expected reward. </p>
                            </div>
                           
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      <!--/div-->
                     
                      </td>
                      </tr>
                      </table>
                         ";
                    ?>
            <?php
               }
               ?>
            <!--end form-->

         </div>
  <?php
  $i=1;
 if(isset($_POST['gh']))

{
  // when going live change status to confirmed
   $sql = "SELECT box45, bitbonus FROM givedonations WHERE email='$email'  AND status='confirmed'";
   $result = mysqli_query($con, $sql);
   //$row1=mysqli_fetch_array($result);


    $sql_query="SELECT referralbonus FROM givedonations WHERE invite='$email'  AND status='confirmed' ORDER by time DESC";
    $results = mysqli_query($con, $sql_query);

    $sql3 = "SELECT COALESCE(sum(box45),0), COALESCE(sum(bitbonus),0) FROM givedonations WHERE email='$email'   AND status='confirmed'";
   $result3 = mysqli_query($con, $sql3);

    $sql_query4="SELECT COALESCE(sum(referralbonus),0) FROM givedonations WHERE invite='$email'  AND status='confirmed'";
    $results4 = mysqli_query($con, $sql_query4);

    $sql5 = "SELECT bbalance FROM bonuses_balance WHERE email='$email'";
   $result5 = mysqli_query($con, $sql5);
  // $row5=mysqli_fetch_array($result5);


   $sql6 = "SELECT COALESCE(sum(bbalance),0) FROM bonuses_balance WHERE email='$email'";
   $result6 = mysqli_query($con, $sql6);
   $row6 = mysqli_fetch_array($result6);

   echo "<div class=\"box-header with-border\" style=\"background-color: #3462F7; color: white;\">";
   echo "<h3 class=\"box-title\">Receive Donation. Availaibility View</h3>";
   echo "</div>";
  //$row1=mysqli_fetch_array($result);
  $row4=mysqli_fetch_array($results4);

   //$bitb=$row1["bitbonus"];
   //$amountgd=$row1["box45"];
                 
                  
   echo "<form action=\"ghvalue_view.php\" method=\"post\">";
   echo "<table id=\"myTable\" class=\"table table-striped\">";
   echo "<tr>";
   echo "<th width=\"60\">"; echo "S/N"; echo "</th>";
   echo "<th>"; echo "Bit Bonuses"; echo "</th>";
   echo "<th>"; echo "Referral Bonuses"; echo "</th>";
   echo "<th>"; echo "Other Bonuses"; echo "</th>";
   echo "<th>"; echo "Donation wallet"; echo "</th>";
   echo "</tr>";
while($row1=mysqli_fetch_array($result))
{
   echo "<tr>";
   echo "<th width=\"60\">"; echo $i++; echo "</th>";
   echo "<th>"; echo $row1['bitbonus']; echo "</th>";
   echo "<th>"; echo "-"; echo "</th>";
   echo "<th>"; echo "-"; echo "</th>";
   echo "<th>"; echo $row1['box45']; echo "</th>";
   echo "</tr>";



}


while($row=mysqli_fetch_array($results)){

    echo "<tr>";
    echo "<th width=\"60\">"; echo $i++; echo "</th>";
   echo "<th>"; echo "-"; echo "</th>";
   echo "<th>"; echo $row['referralbonus']; echo "</th>";
   echo "<th>"; echo "-"; echo "</th>";
   echo "<th>"; echo "-"; echo "</th>";
   echo "</tr>";

}

while($row5=mysqli_fetch_array($result5)){

    echo "<tr>";
    echo "<th width=\"60\">"; echo $i++; echo "</th>";
   echo "<th>"; echo "-"; echo "</th>";
   echo "<th>"; echo "-"; echo "</th>";
   echo "<th>"; echo $row5['bbalance']; echo "</th>";
   echo "<th>"; echo "-"; echo "</th>";
   echo "</tr>";

}

while($row3=mysqli_fetch_array($result3)){

echo "<tr>";
echo "<th style=\"background-color: green;\">"; echo "TOTAL"; echo "</th>";
echo "<th style=\"background-color: green;\">"; echo $row3['COALESCE(sum(bitbonus),0)']; echo "</th>";
echo "<th style=\"background-color: green;\">"; echo $row4['COALESCE(sum(referralbonus),0)']; echo "</th>";
echo "<th style=\"background-color: green;\">"; echo $row6['COALESCE(sum(bbalance),0)']; echo "</th>";
echo "<th style=\"background-color: green;\">"; echo  $row3['COALESCE(sum(box45),0)']; echo "</th>";

echo "</tr>";

$_SESSION['bit'] = $row3['COALESCE(sum(bitbonus),0)'];
$_SESSION['refer'] =  $row4['COALESCE(sum(referralbonus),0)'];
$_SESSION['box45'] = $row3['COALESCE(sum(box45),0)'];

$_SESSION['bbalance'] = $row6['COALESCE(sum(bbalance),0)'];
//$tbonuses = $bit+$re;
$_SESSION['tbonuses'] = $_SESSION['bit']+$_SESSION['refer']+$_SESSION['bbalance'];
$_SESSION['tgh'] = $_SESSION['tbonuses']+$_SESSION['box45'];
$bcon = 0.5*$_SESSION['tgh'];
   $tid = mt_rand(1,1000000). "-".rand(100,10000);
  //$amount = $_POST['ghvalue'];
  if ($_SESSION['tbonuses']>$bcon) {

    $_SESSION['bcontrol'] = $bcon; 
    $_SESSION['tgh'] = $_SESSION['bcontrol']+$_SESSION['box45'];
   

   $_SESSION['bonusb'] = $_SESSION['tbonuses']-$_SESSION['bcontrol'];

  


  }

  else
  {

    $_SESSION['bcontrol'] = $_SESSION['tbonuses'];
    $_SESSION['tgh'] = $_SESSION['tbonuses']+$_SESSION['box45'];
  }
  
  


}


echo "</table>";

echo "<div class=\"box-footer\">";
echo "<h5 style=\"color:red;\">Please Note:<em> Bonuses cannot be withdrawn indiscriminately; it a function of your donation commitment. This will be subjected to review M.O.M.<u> Committment check.</u></em></h5> <!--button type='submit' value='submit' name='submitgd' class='btn btn-info pull-right'>Receive Donations</button-->";
echo "</div>";




echo "</form>";


  if (!preg_match("/^[0-9]*$/", $_SESSION['bcontrol'])){
   
    $_SESSION['errMsg'] = "Only numbers are allowed in Bundle value!";
          header("Location: get_do.php");
            exit;


}

 if (!preg_match("/^[0-9]*$/", $_SESSION['box45'])){
   
    $_SESSION['errMsg'] = "Only numbers are allowed in Bundle value!";
          header("Location: get_do.php");
            exit;


}

 if (!preg_match("/^[0-9]*$/", $_SESSION['bonusb'])){
   
    $_SESSION['errMsg'] = "Only numbers are allowed in Bundle value!";
          header("Location: get_do.php");
            exit;


}





echo "   <div class=\"box-header with-border\" style=\"background-color: #3462F7; color: white;\">
         <h3 class=\"box-title\">Receive Donation. Possible Cashout</h3>
          </div>

     <form action=\"ghvalue_view.php\" method=\"POST\">
              <div class=\"box-body\">
                <div class=\"form-group\">
                  <label for=\"bonuses\">Total Bonuses</label>
                  <input type=\"text\" class=\"form-control\"  value=\"$_SESSION[bcontrol] \" readonly>
                </div>
                <div class=\"form-group\">
                  <label for=\"box45\">Bundle wallet</label>
                  <input type=\"text\" class=\"form-control\"  value=\"$_SESSION[box45]\" readonly>
                </div>

                <div class=\"form-group\">
                  <label for=\"box45\">Bonuses Balance</label>
                 
                  <input type=\"text\" class=\"form-control\" name=\"ghvalueb\" value=\"$_SESSION[bonusb]\" readonly>
                </div>

                <div class=\"form-group\">
                  <label for=\"box45\">Cashout wallet</label>
                 
                  <input type=\"text\" class=\"form-control\" name=\"ghvalue\" value=\"$_SESSION[box45]\" readonly>
                  <input type=\"hidden\" name=\"_token\" value=\"$_SESSION[_token]\">
                </div>

                
              
              </div>
              <!-- /.box-body -->

              <div class=\"box-footer\">
              <h4 style=\"color:red;\">Please Note:<em> You will get ZERO response if this form is submitted when your Bundle wallet is zero.<br>Bonuses withdrawal is not permitted without a matured donation value.<br><u> Committment check.</u></em></h4>
                     
                <button type=\"submit\" value=\"submit\" name=\"submitgd2\" class=\"btn btn-info pull-right\">Donations Cashout</button>

               
              </div>
            </form>";



 }

?>



  </div>
         
         <!-- end of form-->

   
      </div>
   </section>

</div>


<?php include 'footer.php'; ?>