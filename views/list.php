<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="public/style.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body style="background-color: white">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                            <tr>
                                <th><span>User</span></th>
                                <th><span>Email</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($users as $user) {
                                echo '<tr>
                                    <td>
                                        <span class="user-subhead">'
                                . $user['username']
                                 .'</span>
                                    </td>
                                    <td>
                                        <a href="#">'. $user['email'] .'</a>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <dic class="col-lg-3">
                <a href="logout.php">Logout</a>
            </dic>
        </div>
    </div>
</body>
</html>