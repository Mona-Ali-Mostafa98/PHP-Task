<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
require "connection.php";
$query=$connection->prepare('Select * FROM users');
$query->execute();
$users=$query->fetchAll(PDO::FETCH_ASSOC);
$count=count($users);?>

<div class="container">
    <table class="table table-striped table-bordered my-4 text-center ">
        <thead class="table-dark">
            <tr>
                <td>Full Name</td>
                <td>UserName</td>
                <td>Passward</td>
                <td>Email</td>
                <td>Birthday</td>
                <td>City</td>
                <td>Manage</td>
            </tr>
        </thead>
        <?php
        for($i=0;$i<$count;$i++){?>
             <tr>
                <td><?=htmlspecialchars($users[$i]["full_name"])?></td>
                <td><?=htmlspecialchars($users[$i]["username"])?></td>
                <td><?=htmlspecialchars($users[$i]["password"])?></td>
                <td><?=htmlspecialchars($users[$i]["email"])?></td>
                <td><?=htmlspecialchars($users[$i]["birth_date"])?></td>
                <td><?=htmlspecialchars($users[$i]["city"])?></td>
                <td>
                <a href='edit.php?id=<?=$users[$i]["id"]?>' class='btn btn-success me-3'>Update</a>
                <a href='delete.php?id=<?=$users[$i]["id"]?>'class='btn btn-danger'>Delete</a>
                </td>
             </tr>
       <?php }?>
    </table>
</div>
