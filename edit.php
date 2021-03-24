<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>

    <body>
    <?php
require_once("config.php");

$uri = $_SERVER['REQUEST_URI'];
$uriSplit = explode('/', $uri);
$emp_no = end($uriSplit);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM employees WHERE emp_no = {$emp_no} LIMIT 1";
$result = mysqli_query($conn, $sql);
if ($result){
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        $data = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
}

if (isset($_POST['cmd'])) {
    // edit employee
    $name = $_POST['name'];
    $phone_numbere = $_POST['phone_number'];
    $arrival_time = $_POST['arrival_time'];

    $departure_time = $_POST['departure_time'];
    $reason = $_POST['reason'];


    $createdAt = $_POST['createdAt'];
  

    
}

?>
    <div class="bottomAnim"></div>
        <div >
            <div class="row justify-content-center">
                <h3>Edit</h3>
            </div>

            <br>
            <br>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="cmd" value="save" />

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="name" value="<?php echo $data[0]['name']; ?>">
                    </div>
                </div>
                
                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="phone_number" value="<?php echo $data[0]['phone_number']; ?>">
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Arrival Time</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="arrival_time" value="<?php echo $data[0]['arrival_time']; ?>">
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Departure time</label>
                    <div class="col-sm-3">
                        <input type="date" name="departure_time" class="form-control" value="<?php echo $data[0]['departure_time']; ?>"></td>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Reason</label>
                    <div class="col-sm-3">
                        <input type="date" name="reason" class="form-control" value="<?php echo $data[0]['reason']; ?>">
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">createdAt</label>
                    <div class="col-sm-3">
                        <input type="" name="createdAt" class="form-control" value="<?php echo $data[0]['createdAt']; ?>">
                    </div>
                </div>

                <br>
                
                <div class="row justify-content-center">
                    <input type="submit" class="btn btn-outline-primary">
                </div>
            </form>

        </div>
    </body>
</html>

