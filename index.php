<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        fetch('./product/read.php')
        .then(response => response.json())
        .then(data => {
            for(let i=0; i<data.length; i++) {
                let div = document.createElement('div');
                let textnode = document.createTextNode(data[i].naam);
                div.appendChild(textnode);
                document.body.appendChild(div);
            }
        })
        .catch(error => console.log('error is ', error));
    </script>
</body>
</html>