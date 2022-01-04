<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css_doc.css">
  <link rel="stylesheet" href="flexboxgrid.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  
  <title>Customer Details</title>
</head>

<body>
  <div class="customer_continer">
    <!-- Header section Starts -->
    <div class="row">
          <div class="col-xs-12
                    col-sm-12
                    col-md-12
                    col-lg-12 ">
        <header>
          <div class="bank_head" style="color: white;">
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
      <div class="col-md-1
                  col-lg-1">
        <!-- blank -->
      </div>

      <div class="col-xs-12
                  col-sm-12
                  col-md-12
                  col-lg-12">
        <section>
          <table class="cust_table">
            <th width="24%;">
              Customer Name
            </th>
            <th width="32%;">
              Email
            </th>
            <th width="22%;">
              Current Balance
            </th>
            <th width="22%;">
              Transfer
            </th>
            <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $db = 'Banking_db';

            $conn = new mysqli($servername, $username, $password, $db);

            if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }
            // echo 'Connected successfully';

            $sql = 'SELECT * FROM customer_table';

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($rows = $result->fetch_assoc()) {
                    echo '<tr>';
                    // echo '<td>' . $rows['id'] . '</td>';
                    echo '<td>' . $rows['name'] . '</td>';
                    echo '<td>' . $rows['email'] . '</td>';
                    echo '<td>' . $rows['current_balance'] . '</td>';
                    echo '<td> <a href="transaction_new.php?transfer=' .
                        $rows['name'] .
                        '&amount=' .
                        $rows['current_balance'] .
                        '">Transfer</a></td>';
                    echo '</tr>';
                }
            }
            ?>          
          </table>
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