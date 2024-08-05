<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Latest Bootstrap CDN link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <title>Display</title>
    <style>
        body {
            background: #e5e5ea;
        }

        table {
            background: #ffe699;
        }

        .update,
        .delete {
            background-color: green;
            color: white;
            border: 0;
            outline: none;
            border-radius: 5px;
            height: 25px;
            width: 80px;
            font-weight: bold;
            cursor: pointer;
        }

        .delete {
            background-color: red;
        }

        .thheading {
            background-color: yellow;
        }

        .display {
            color: black;
            text-align: center;

        }
    </style>
</head>

<body>
    <?php
    include("connection.php");
    error_reporting(0);

    $query = "SELECT * FROM FORM";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);

    if ($total != 0) {
    ?>

        <h2 class="display">Display All Records</h2>
        <table align="center" border="1" cellspacing="7" width="100%">
            <tr class="thheading">
                <th width="6%"><input type="checkbox" id="select_all"></th>
                <th width="2%">Id</th>
                <th width="16%">Name</th>
                <th width="9%">Email</th>
                <th width="8%">Password</th>
                <th width="8%">Phone_No.</th>
                <th width="5%">Country</th>
                <th width="5%">State</th>
                <th width="5%">City</th>
                <th width="20%">Address</th>
                <th width="5%">Gender</th>
                <th width="5%">Qualification</th>
                <th width="6%">Operation</th>
            </tr>

            <?php
            while ($result = mysqli_fetch_assoc($data)) {
                echo "<tr>
                              <td><input type='checkbox' name='del_check[]' value='" . $result['id'] . "'></td>
                              <td>" . $result['id'] . "</td>
                              <td>" . $result['name'] . "</td>
                              <td>" . $result['email'] . "</td>
                              <td>" . $result['password'] . "</td>
                              <td>" . $result['phone'] . "</td>
                              <td>" . $result['country'] . "</td>
                              <td>" . $result['state'] . "</td>
                              <td>" . $result['city'] . "</td>
                              <td>" . $result['address'] . "</td>
                              <td>" . $result['gender'] . "</td>
                              <td>" . $result['qualification'] . "</td> 
                              <td>
                                <a href='update_design.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
                              </td> 
                        </tr>";
            }
            ?>
        </table>
        <input type="submit" name="del_multiple_data" class="delete" onclick='return checkdelete()' value='Delete'>
        </form>

        <script>
            function checkdelete() {
                return confirm('Are You sure you want delete this record?');
            }

            document.getElementById('select_all').addEventListener('click', function() {
                var checkboxes = document.getElementsByName('del_check[]');
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = this.checked;
                }
            });
        </script>

    <?php
    } else {
        echo "No record Found";
    }
    ?>

</body>

</html>