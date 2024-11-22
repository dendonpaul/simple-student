<?php
//database connection
$dbuser = "denny";
$dbpass = "password";
$servername = "localhost";
$dbname = "SchoolDB";

$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

//Check form submission and gather the input details
//Create Data
if (isset($_POST['add'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $grade = isset($_POST['grade']) ? $_POST['grade'] : "";
    $age = isset($_POST['age']) ? $_POST['age'] : "";

    //$sql = "INSERT INTO Students(name,age,grade) VALUES('$name','$age','$grade')";
    // $conn->query($sql);
    $sql = "INSERT INTO Students(name,age,grade) VALUES(?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sis', $name, $age, $grade);
    $stmt->execute();
    $stmt->close();
}

//delete and updatedata
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Delete
    if (isset($_POST['actionB']) && $_POST['actionB'] == 'delete') {
        $id = $_POST['id'];

        // $sql = "DELETE from Students where id=$id";
        // $conn->query($sql);

        $sql = "DELETE from Students WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

    //Update
    if (isset($_POST['actionB']) && $_POST['actionB'] == 'update') {
        $id = $_POST['id'];
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $grade = isset($_POST['grade']) ? $_POST['grade'] : "";
        $age = isset($_POST['age']) ? $_POST['age'] : "";

        // $sql = "UPDATE Students SET name='$name', age='$age', grade='$grade' WHERE id='$id'";
        // $conn->query($sql);

        $sql = "UPDATE Students SET name=?, age=?, grade=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sisi', $name, $age, $grade, $id);
        $stmt->execute();
        $stmt->close();
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Details CRUD Application</title>

    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        form {
            display: block;
        }

        .result-title {
            text-align: center;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center;">Student Management</h2>

    <!-- Add Record Form -->
    <form action="" method="POST" style="text-align: center; margin-bottom: 20px;">
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="text" name="grade" placeholder="Grade" required>
        <button type="submit" name="add">Add Student</button>
    </form>

    <!-- Display Records -->
    <br><br><br>

    <h2 class="result-title">Students</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultSql = "SELECT * from Students";
            $result = $conn->query($resultSql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <form method="post" action="" id="<?php echo 'form' . $row['id'] ?>">
                            <input type="hidden" name="id" id="<?php echo 'id' . $row['id'] ?>" value="<?php echo $row['id'] ?>" />
                            <input type="hidden" name="actionB" id="<?php echo 'actionB' . $row['id'] ?>" value="" />
                            <td><input type="text" name="name" id="<?php echo 'name' . $row['id'] ?>" value="<?php echo $row['name'] ?>" disabled /></td>
                            <td><input type="text" name="age" id="<?php echo 'age' . $row['id'] ?>" value="<?php echo $row['age'] ?>" disabled /></td>
                            <td><input type="text" name="grade" id="<?php echo 'grade' . $row['id'] ?>" value="<?php echo $row['grade'] ?>" disabled /></td>

                        </form>

                        <td>
                            <button name="edit" id="<?php echo 'edit' . $row['id'] ?>" onclick="edit(<?php echo $row['id']; ?>)">Edit</button>
                            <button style="color:blue" name="update" id="<?php echo 'update' . $row['id'] ?>" onclick="update(<?php echo $row['id']; ?>)" disabled>Update</button>
                            <button style=" color:red" name="delete" id="<?php echo 'delete' . $row['id'] ?>" onclick="deleteData(<?php echo $row['id']; ?>)" disabled>Delete</button>
                        </td>
                    </tr>
            <?php
                }
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>