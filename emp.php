<html>
<head>
<h1 style="text-align: center">Software Development Task</h1>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.23/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.23/datatables.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script defar src="all.js"></script>
</head>

<body>
<table class="table" id="tableEmployee" style="width:100%">
  <br><br>
  <br>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Arrival Time</th>
      <th scope="col">Departure time</th>
      <th scope="col">Reason</th>
      <th scope="col">createdAt</th>

    </tr>
  </thead>
</table>
<script type="text/Javascript">
    $(document).ready(function() {
        const url = 'edit.php';
        $('#tableEmployee').DataTable({
            "stripeClasses": [],
            "processing": true,
            "serverSide": true,
            "ajax": "./query.php",
            "columns": [
                { "data": "name" },
                { "data": "phone_number" },
                { "data": "arrival_time" },
                { "data": "departure_time" },
                { "data": "reason" },
                { "data": "createdAt" },
                
                {
                    "orderable": false,
                    "data": "emp_no",
                    "createdCell": function (td, cellData, rowData, row, col) {
                        $(td).text('');
                        var button = $(`<a href=${url}/${cellData}><i class='fas fa-user-edit' id='${cellData}'></i>`);
                        $(td).append(button);
                    },
                    "defaultContent": ""
                },
            ],
            "order": [[1, 'asc']]
        });
    });

</script>
    

</body>

</html>
