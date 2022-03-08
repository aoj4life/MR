  <?php 
  include 'connect.php';
  session_start();
   $email = $_SESSION['email']; 
   $yourname = $_SESSION['yourname']; 

 if(isset($_POST['submit1'])){
   //run/execute mysql query
 $sql = "SELECT SUM(amount), FROM givedonations WHERE email='$email' AND status='unconfirmed'";
 $result = mysqli_query($con, $sql);
   //$_SESSION['sum'] = $result;
 while($row1=mysqli_fetch_array($result))
 {

    $mark=$row1['SUM(amount)'];
    $mark1=$row1['maturedate']; 
 }
    
 
echo "
     <table>
                    <tr>
                      <td>

<div class=\"form-group\">
                           <label for=\"bankname\" class=\"col-sm-2 control-label\">Matured Donations</label>
                           <div class=\"col-sm-10\">
                              <input type=\"number\" name=\"accnumber\" class=\"form-control\" id=\"amount2\" placeholder=\"Matured Amount\" value=\"$mark\" />
                           </div>
                        </div>

              </td>
                      </tr>
                      </table>


";
 }

?>


