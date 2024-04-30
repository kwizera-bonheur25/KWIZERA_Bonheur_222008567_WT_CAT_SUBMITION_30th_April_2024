<!DOCTYPE html>
<html>
    <head>
        <title>Admin dashboard</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://fonts.google.com/specimen/Open+Sans?query=open+sans">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <style>
        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 550px;
            margin-left: 25%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    </head>
    <body>
                <form action="../add_inmate.php" method="POST">
                    <h2>INMATES FORM</h2>
                    
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" required>
                    
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" required>
                    
                    <label for="id_number">ID Number:</label>
                    <input type="text" id="id_number" name="id_number" required>
                    
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="">--Select--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                    
                    <label for="marital_status">Marital Status:</label>
                    <select id="marital_status" name="marital_status" required>
                        <option value="">--Select--</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                    
                    <label for="admission_date">Admission Date:</label>
                    <input type="date" id="admission_date" name="admission_date" required>
                    
                    <label for="release_date">Release Date:</label>
                    <input type="date" id="release_date" name="release_date" required>
            
                    <label for="prison_name">Prison:</label>
                    <select id="prison_id" name="prison_id" required>
                    <?php
                        require 'config.php';
            
                        $query = "SELECT prison_id, prison_name FROM prisons";
                        $result = $mysqli->query($query);
            
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['prison_id'] . '">' . $row['prison_name'] . '</option>';
                            }
                        } else {
                            echo '<option disabled>Error loading prisons</option>';
                        }
                        ?>
                    </select>
                    
                    <input type="submit" name="add" value="ADD">
                </form>
        </div>
    </body>
</html>