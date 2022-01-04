<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'Banking_db';
$var_1 = $_GET['transfer'];
$var_2 = $_GET['amount'];

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
// echo 'Connected successfully';

$sql = "SELECT * FROM customer_table WHERE NOT (name = '$var_1') ";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css_doc.css">
  <link rel="stylesheet" href="flexboxgrid.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  
  <title>Transactions</title>
</head>

<body>
  <div class="bank_continer">
    <!-- Header section Starts -->
    <div class="row">
          <div class="col-xs-12
                    col-sm-12
                    col-md-12
                    col-lg-12 ">
        <header>
          <div class="bank_head">
            Bbs.
          </div>

          <div class="bank_head_nav">
            <ul>
              <li style="padding-left:500px;">
                <a href="home_new.php">Home</a>
              </li>
              <li>
                <a href="customer_new.php">
                  Customers
                </a>
              </li>
              <li>
              <a href="transaction_history.php"> Transaction History</a>
              </li>
            </ul>
          </div>

        </header>
      </div>
       <!-- blank -->
      </div>
    </div>
    <!-- Header section ends -->

    <!-- Main content section Starts -->
    <div class="row">
     

      <div class="col-xs-12
                  col-sm-12
                  col-md-12
                  col-lg-12">
    <section>
          <div class="transfer_page">
              <div class="transfer_cust1" style="color:black;font-size:1.4rem;line-height:2rem;padding-top:15px;">
                <h1 style="padding-top:10px;">Transaction details</h1><br>
                Sender Name - <strong><?php echo $var_1; ?></strong><br>
                Balance Available - <strong><?php echo $var_2; ?> </strong><br>
              </div>
              <div class="transfer_cust2">
              <form action="tranfer_check.php?var1=<?php echo $var_1; ?>" method="post" >
                      <div class="cust_2" style="color:black;font-size:1.2rem;line-height:1.5rem;padding-top:48px;">
                       Receiver -
                                  <select name="somename2">
                                  <?php if ($result->num_rows > 0) {
                                      // output data of each row
                                      while (
                                          $rows = $result->fetch_assoc()
                                      ) { ?>
                                      <option value="<?php echo $rows[
                                          'name'
                                      ]; ?>"><?php echo $rows['name']; ?>
                                      </option>
                                      <?php }
                                  } ?>
                                  </select>
                      </div>
                      <div class="cust_2" style="color:black;font-size:1.2rem;line-height:1.5rem;">
                        Amount -
                        <input type="number" name="amount" autocomplete="off" style="position:relative;left:-15px;color:black;font-size:1.2rem;line-height:1.5rem;">

                      </div>
                      <input type="submit" class="transfer" value="Transfer"  style="color:black;font-size:1rem;line-height:1.5rem;">
              </form>
              </div>
          </div>
      </section>
    </div>
    <div class="col-md-1
                  col-lg-1">
      <!-- blank -->
    </div>
  </div>
  <!-- Main content section ends -->

  <!-- Footer section Starts -->
  <div class="row">
            <div class="col-xs-12
                  col-sm-12
                  col-md-12
                  col-lg-12">
        <footer>
          <div class="bank_foot" style="color: white;">
            Obs. <br>
            &copy; Private limited
          </div>

          <div class="bank_foot_li">

            <ul>
            <li>   
              <a href="#" class="fa fa-facebook"> </a>   
              </li>  
              <li>  
              <a href="#" class="fa fa-twitter"> </a>  
              </li>  
              <li>  
              <a href="#" class="fa fa-instagram"> </a>  
              </li>  
            </ul>
          </div>
        </footer>
      </div>
         </div>
   <!-- Footer section ends -->
  </div>
</body>

</html>
