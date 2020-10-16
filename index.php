<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
        };
    </style>
</head>
<body>
<table>
        <thead>
            <tr>
                <th>products</th>
                <th>prijs</th>
                <th>beschrijving</th>
                <th>categorie id</th>
                <th>toevoegd op:</th>
                <th>gewijzigd op</th>
                <th>id</th>
            </tr>
        </thead>
        <tbody id="products">
            

        </tbody>
    </table>
    <button><a href="create.php" target="_blank">create.php</a></button>
    <button><a href="delete.php" target="_blank">delete.php</a></button>
    <button><a href="update.php" target="_blank">update.php</a></button>
    <button type="button" onClick="window.location.reload();">refresh page</button>
<script>
        fetch("./product/read.php")
        .then((response) => response.json())
        .then((data) => {
        for (let i = 0; i < data.length; i++) {
            const table = document.getElementById("products");
            var row = table.insertRow(i);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            cell1.innerHTML = data[i].naam;
            cell2.innerHTML = data[i].prijs;
            cell3.innerHTML = data[i].beschrijving;
            cell4.innerHTML = data[i].categorie;
            cell5.innerHTML = data[i].toegevoegd;
            cell6.innerHTML = data[i].update_datum;
            cell7.innerHTML = data[i].id;
        }
        })
        .catch((error) => console.log("error is ", error));
    </script> 
</body>
</html>
