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
<button type="button" onClick="window.location.reload();">refresh page</button>
<p>update de laatste product</p>
    <table>
        <thead>
            <tr>
                <th>products</th>
                <th>prijs</th>
            </tr>
        </thead>
        <tbody id="products">
            

        </tbody>
    </table>

    
    <script>
        fetch("./product/search.php")
        .then((response) => response.json())
        .then((data) => {
        for (let i = 0; i < data.length; i++) {
            const table = document.getElementById("products");
            var row = table.insertRow(i);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = data[i].naam;
            cell2.innerHTML = data[i].prijs;
        }
        })
        .catch((error) => console.log("error is ", error));
    </script> 
</body>
</html>