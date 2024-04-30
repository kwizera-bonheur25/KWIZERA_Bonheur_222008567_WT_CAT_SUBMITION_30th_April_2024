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

    <div class="button"><a href="?page=add-prison">ADD NEW PRISON</a></div>
        
        <h1>Prison List</h1>
        <table>
            <thead>
                <tr>
                    <th>Prison Name</th>
                    <th>District</th>
                    <th>Sector</th>
                    <th>DELETE</th>
                    <th>UPDATE</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection file
                require 'config.php';

                // SQL query to retrieve prisoners
                $sql = "SELECT * FROM prisons";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {	
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['prison_name']}</td>";
                        echo "<td>{$row['prison_district']}</td>";
                        echo "<td>{$row['prison_sector']}</td>";
                        echo "<td><a href='../delete-inmate.php?id={$row['prison_id']}'>Delete</a></td>";
                        echo "<td><a href='?id={$row['prison_id']}&page=update-inmate'>Update</a></td>";  
                                  
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
