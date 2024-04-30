<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prisoners List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.2);
        }
        th, td {
            padding: 8px;
            height: 45px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            width: fit-content;
            color:white;
        }
        th {
            background-color: rgba(51, 51, 51, 0.9);
            color: white;
        }
        tr:hover {
            background-color: rgba(51, 51, 51, 0.9);
        }
        .container {
            max-width: 100%;
            margin: auto;
            background-color: rgba(51, 51, 51, 0.8);
        }
        h1 {
            text-align: center;
        }
        .button{
            color:white;
            font-weight: bold;
            text-decoration:none;
            margin-top:3%;
            padding:17px;
            border-radius: 15px;
            background:rgb(51, 51, 51);
            border: 2px solid white;
            width: fit-content;
            top:15%;
            position:absolute;
        }
        .button a{
            color:white;
            text-decoration:none;
        }
        td a{
            color: white;
            font-weight:bold;
        }
    </style>
</head>
<body>
    <div class="container">

    <div class="button"><a href="?page=add-inmate">ADD NEW INMATE</a></div>
        
        <h1>Inmates List</h1>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>ID Number</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Marital Status</th>
                    <th>Admission Date</th>
                    <th>Release Date</th>
                    <th>Prison NAME</th>
                    <th>DELETE</th>
                    <th>UPDATE</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection file
                require 'config.php';

                // SQL query to retrieve prisoners
                $sql = "SELECT 
                prisoner_id,
                fname,
                lname,	
                id_number,	
                gender,	
                DoB,	
                martial_status,	
                admission_date,	
                release_date,	
                prison_name 
                FROM prisoners JOIN prisons ON prisoners.prison_id = prisons.prison_id ";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['fname']}</td>";
                        echo "<td>{$row['lname']}</td>";
                        echo "<td>{$row['id_number']}</td>";
                        echo "<td>{$row['gender']}</td>";
                        echo "<td>{$row['DoB']}</td>";
                        echo "<td>{$row['martial_status']}</td>";
                        echo "<td>{$row['admission_date']}</td>";
                        echo "<td>{$row['release_date']}</td>";
                        echo "<td>{$row['prison_name']}</td>";
                        echo "<td><a href='../delete-inmate.php?id={$row['prisoner_id']}'>Delete</a></td>";
                        echo "<td><a href='?id={$row['prisoner_id']}&page=update-inmate'>Update</a></td>";  
                                  
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No prisoners found</td></tr>";
                }

                // Close connection
                $mysqli->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
