<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
</head>
<?php
include_once 'Function.inc.php';
$arrayToList = read_Contacts();

?>

<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                   </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Add Contact</a></li>
                <li><a href="#">List Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Cellular Phone</th>
                <th>Home PHone</th>
                <th>Office PHone</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach($arrayToList as $key=>$row) {
                echo "<tr>";
                foreach($row as $key2=>$row2){
                    echo "<td>" . $row2. "</td>";
                }
                echo "<td> <a href='editContact.php?prKey=$key'> Modify </a></td>";
                echo "<td> <a href=''> Delete </a></td>";

                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
