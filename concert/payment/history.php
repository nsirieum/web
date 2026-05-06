<?php
include "../db_connect.php";
session_start();

// เช็ค user
// query user
// แสดงตั๋วsql
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}else{
    header('Location: ../user-login-re/login.php');
}

// ดึง  user_id
$u_sql = "SELECT * FROM users WHERE username= '$username' ";
$u_result = mysqli_query($conn,$u_sql);
$u_row = mysqli_fetch_array($u_result);
$user_id = $u_row['user_id'];

// ดึง order
$his_sql = "SELECT * FROM orders WHERE user_id = '$user_id' ";
$his_result = mysqli_query($conn,$his_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
</head>
<body>
    
    <div class="History-Container">
        <a href="../ListConcert/showing.php" class="btn-showing">Buy ticket</a>
        <h1>My Order History</h1>
             
        <?php while($his_row = mysqli_fetch_assoc($his_result)) { ?>
            <div class="ticket-item">
                <p>Concert: <?php echo $his_row['cc_name'];?> &nbsp;&nbsp;&nbsp;</p>
                <a href="E_ticket.php?order_id=<?php echo $his_row['order_id']; ?>">View Details</a>
                <hr>
            </div>
        <?php } ?>
        
        <?php if(mysqli_num_rows($his_result) == 0) {
            echo "No purchase history."; }?>
    </div>
    
</body>

<style>
@import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap');

    body {
        font-family: 'Kanit', sans-serif;
        background-color: #0b0b0b;
        color: #e0e0e0;
        margin: 0;
        padding: 40px 20px;
    }

    .History-Container {
        text-align: right;
        max-width: 800px;
        margin: 0 auto;
    }

    h1 {
        text-align: center;
        color: #ff3e3e;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 40px;
        font-size: 2rem;
    }


    .ticket-item {
        background: #1a1a1a;
        border: 1px solid #333;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: transform 0.3s ease, border-color 0.3s ease;
    }

    .ticket-item:hover {
        transform: translateY(-5px);
        border-color: #ff3e3e;
        box-shadow: 0 10px 20px rgba(255, 62, 62, 0.1);
    }

    /* ข้อมูลตั๋ว */
    .ticket-info {
        flex: 2;
    }

    .ticket-info p {
        margin: 5px 0;
    }

    .concert-name {
        font-size: 1.3rem;
        font-weight: 600;
        color: #ffffff;
    }

    .ticket-qty {
        color: #888;
        font-size: 0.9rem;
    }

    /* ปุ่ม View Details */
    .view-link {
        flex: 1;
        text-align: right;
    }

    .btn-view {
        display: inline-block;
        padding: 10px 25px;
        background: transparent;
        border: 1px solid #ff3e3e;
        color: #ff3e3e;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-view:hover {
        background: #ff3e3e;
        color: #fff;
        box-shadow: 0 0 15px rgba(255, 62, 62, 0.4);
    }

    .no-history {
        text-align: center;
        padding: 50px;
        color: #555;
        font-size: 1.2rem;
        border: 2px dashed #333;
        border-radius: 15px;
    }

    .btn-showing {
        display: inline-block;
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
</style>
</html>







