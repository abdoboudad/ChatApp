<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src=" https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <title>Document</title>
</head>
<body>
   <!-- HTML -->
<input type="text" id="countryInput" placeholder="Enter country name">
<div id="flagContainer"></div>

<script>
      const apiUrl = `https://api.countryflags.io/v2/name/morocco?type=flat`;

      fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
          if (data.length > 0) {
            const flagUrl = data[0].flag;
            // flagContainer.innerHTML = `<img src="${flagUrl}" alt="${countryName} Flag">`;
            console.log(flagUrl);
          } else {
            // flagContainer.innerHTML = 'Flag not found';
            console.log('ops');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          flagContainer.innerHTML = 'Failed to fetch flag';
        });
</script>


</body>
</html>