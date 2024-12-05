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

        .menu li {
            display: inline;
            margin-left: 10px;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center;">Student Management</h2>
    <br />
    <br />
    <div>
        <ul class="menu">
            <li><a href="./index.php?action=logout">Logout</a></li>
            <li><a href="./index.php?action=profile">Profile</a></li>
        </ul>

    </div>
    <br />
    <br />

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
            foreach ($users as $row) {
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
            ?>
        </tbody>
    </table>
    <script type=" text/javascript" src="./script.js"></script>
</body>

</html>