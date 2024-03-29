<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="logo.png">
</head>
<body>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
padding:5px;
}
input {
padding:5px;margin:10px;font-size:15px;
}


@keyframes changeBackground1 {
    0%   {background-color: #FFB6C1;} /* Light Pink */
    50%  {background-color: #FFFFE0;} /* Light Yellow */
    100% {background-color: #ADD8E6;} /* Light Blue */
}

@keyframes changeBackground2 {
    0%   {background-color: #ADD8E6;} /* Light Blue */
    50%  {background-color: #FFB6C1;} /* Light Pink */
    100% {background-color: #FFFFE0;} /* Light Yellow */
}

@keyframes changeBackground3 {
    0%   {background-color: #FFFFE0;} /* Light Yellow */
    50%  {background-color: #ADD8E6;} /* Light Blue */
    100% {background-color: #FFB6C1;} /* Light Pink */
}

table td:nth-child(1) {
    animation-name: changeBackground1;
    animation-duration: 4s;
    animation-iteration-count: infinite;
}

table td:nth-child(2) {
    animation-name: changeBackground2;
    animation-duration: 4s;
    animation-iteration-count: infinite;
}

table td:nth-child(3) {
    animation-name: changeBackground3;
    animation-duration: 4s;
    animation-iteration-count: infinite;
}

table th:nth-child(1) {
    animation-name: changeBackground1;
    animation-duration: 4s;
    animation-iteration-count: infinite;
}

table th:nth-child(2) {
    animation-name: changeBackground2;
    animation-duration: 4s;
    animation-iteration-count: infinite;
}

table th:nth-child(3) {
    animation-name: changeBackground3;
    animation-duration: 4s;
    animation-iteration-count: infinite;
}




body {
    background: url('https://th.bing.com/th/id/R.fb511cea59976a733bfbd0fe4dc94aba?rik=1vdOK5J9b0VbFQ&riu=http%3a%2f%2fgetwallpapers.com%2fwallpaper%2ffull%2fa%2f7%2f1%2f135897.jpg&ehk=Unj%2fZQzZlGicK6HcYyci2Ke7KjdJF0%2bvppX2Yh04sKw%3d&risl=&pid=ImgRaw&r=0') no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
	font-family:sans-serif;margin-left:20%;
margin-right:20%;
}

th { color: blue;}


</style>

<h1 style="color: #3498db; padding: 20px; margin: 20px; text-align: center; border: 2px solid #3498db; border-radius: 10px; box-shadow: 5px 10px #888888;">
     Search Records 
</h1>
<form action="1.php" method="post">
  Name or Dept : <input type="text" name="search" id="search" oninput="this.value=this.value.toUpperCase()"><br>

</form>
 <div id="suggestions"></div>
<script>
    var searchBox = document.getElementById('search');
    var suggestionsContainer = document.getElementById('suggestions');

    searchBox.addEventListener('input', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '1.php?q=' + encodeURIComponent(searchBox.value), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var suggestions = JSON.parse(xhr.responseText);
                // Clear the suggestions container
                suggestionsContainer.innerHTML = '';
                // Create a table
                var table = document.createElement('table');
                table.style.borderCollapse = 'collapse';
                table.style.width = '100%';
                // Add table headers
                var tr = document.createElement('tr');
                Object.keys(suggestions[0]).forEach(function(key) {
                    var th = document.createElement('th');
                    th.textContent = key;
                    th.style.border = '1px solid black';
                    th.style.padding = '8px';
                    tr.appendChild(th);
                });
                table.appendChild(tr);
                // Add each suggestion to the table
                suggestions.forEach(function(suggestion) {
                    var tr = document.createElement('tr');
                    Object.values(suggestion).forEach(function(value) {
                        var td = document.createElement('td');
                        td.textContent = value;
                        td.style.border = '1px solid black';
                        td.style.padding = '8px';
                        tr.appendChild(td);
                    });
                    table.appendChild(tr);
                });
                // Append the table to the suggestions container
                suggestionsContainer.appendChild(table);
            }
        };
        xhr.send();
    });
</script>
</body>
</html>
