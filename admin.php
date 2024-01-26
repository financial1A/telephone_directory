<head>
<title>Be Caution</title>
</head>
<body style="margin-left:100px;margin-right:100px;">
<form id="loginForm">
    <input type="text" id="user" name="user" placeholder="Username">
    <input type="password" id="pass" name="pass" placeholder="Password">
    <input type="submit" value="Login" style="border-radius:5px;color:white;font-size:15px;background-color:#0099ff;border-color:white;">
</form>
<style>
button{margin:3px;}
body{background-color:rgb(173, 235, 235,0.1);}
</style>
<div id="content"></div>
<br>
<a onclick="update();"><button style="color:green;padding:10px;font-size:20px;background-color:rgb(255,255,0);border-radius:10px;">Edit</button></a>
<a onclick="update2()"><button style="color:green;padding:10px;font-size:20px;background-color:rgb(255,255,0);border-radius:10px;">Edit_Location</button></a>
<a onclick="update3()"><button style="color:green;padding:10px;font-size:20px;background-color:rgb(255,255,0);border-radius:10px;">Edit_Name_Ext_Mobile</button></a>
<a onclick="update4()"><button style="color:green;padding:10px;font-size:20px;background-color:rgb(255,255,0);border-radius:10px;">Edit_Ext_Mobile</button></a>
<a onclick="update5()"><button style="color:green;padding:10px;font-size:20px;background-color:rgb(255,255,0);border-radius:10px;">Edit_Ext</button></a>
<a onclick="update6()"><button style="color:green;padding:10px;font-size:20px;background-color:rgb(255,255,0);border-radius:10px;">Edit_Mobile</button></a>
<a onclick="update8()"><button style="color:green;padding:10px;font-size:20px;background-color:rgb(255,255,0);border-radius:10px;">Edit_Name</button></a>
<a onclick="update7()"><button style="color:green;padding:10px;font-size:20px;background-color:rgb(255,255,0);border-radius:10px;">View Message</button></a>
<a onclick="dele();"><button style="color:red;padding:10px;font-size:20px;background-color:rgb(255,255,0,0.3);border-radius:10px;">Delete</button></a>
<a onclick="logout();"><button style="border-radius:5px;color:white;font-size:15px;background-color:#0099ff;border-color:white;">Logout</button></a>
<br>
<div id="content2"></div><br>
<div id="operesult"></div>
<script>

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var user = document.getElementById('user').value;
    var pass = document.getElementById('pass').value;

    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `user=${user}&pass=${pass}`,
    })
    .then(response => response.json()) // Parse the response as JSON
    .then(data => {
        console.log(data);
        if (data.status === 'success') {
   	 	document.getElementById('content').innerText = 'Welcome, ' + user + '!';
    		localStorage.setItem('teletoken', data.token);
		let t = document.getElementById('content');
		t.style.color = 'green';
		document.getElementById('loginForm').remove();
		
		
	} else {
   		 document.getElementById('content').innerText = 'Login failed. Please try again.';
		let t = document.getElementById('content');
		t.style.color = 'red';
	}	

    })
    .catch((error) => {
        console.error('Error:', error);
    });
});

function update(){
    document.getElementById('content2').innerHTML='';
    let ran = Number(localStorage.getItem('teletoken'));
    fetch('update.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `token=${ran}`,
    })
    .then(response => response.text())
    .then(data => {document.getElementById('content2').innerHTML=data;})
    .catch((error) => {
        console.error('Error:', error);
    });
}

function dele(){
	document.getElementById('content2').innerHTML='';
    let ran = Number(localStorage.getItem('teletoken'));
    fetch('delete.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `token=${ran}`,
    })
    .then(response => response.text())
    .then(data => {document.getElementById('content2').innerHTML=data;})
    .catch((error) => {
        console.error('Error:', error);
    });
}

function update2(){
	document.getElementById('content2').innerHTML='';
    let ran = Number(localStorage.getItem('teletoken'));
    fetch('location.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `token=${ran}`,
    })
    .then(response => response.text())
    .then(data => {document.getElementById('content2').innerHTML=data;})
    .catch((error) => {
        console.error('Error:', error);
    });
}


function update3(){
	document.getElementById('content2').innerHTML='';
    let ran = Number(localStorage.getItem('teletoken'));
    fetch('nameandext.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `token=${ran}`,
    })
    .then(response => response.text())
    .then(data => {document.getElementById('content2').innerHTML=data;})
    .catch((error) => {
        console.error('Error:', error);
    });
}

function update4(){
	document.getElementById('content2').innerHTML='';
    let ran = Number(localStorage.getItem('teletoken'));
    fetch('mobileandext.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `token=${ran}`,
    })
    .then(response => response.text())
    .then(data => {document.getElementById('content2').innerHTML=data;})
    .catch((error) => {
        console.error('Error:', error);
    });
}

function update5(){
	document.getElementById('content2').innerHTML='';
    let ran = Number(localStorage.getItem('teletoken'));
    fetch('ext.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `token=${ran}`,
    })
    .then(response => response.text())
    .then(data => {document.getElementById('content2').innerHTML=data;})
    .catch((error) => {
        console.error('Error:', error);
    });
}

function update6(){
	document.getElementById('content2').innerHTML='';
    let ran = Number(localStorage.getItem('teletoken'));
    fetch('mobile.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `token=${ran}`,
    })
    .then(response => response.text())
    .then(data => {document.getElementById('content2').innerHTML=data;})
    .catch((error) => {
        console.error('Error:', error);
    });
}

function update7(){
	document.getElementById('content2').innerHTML='';
    let ran = Number(localStorage.getItem('teletoken'));
    fetch('messages.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `token=${ran}`,
    })
    .then(response => response.text())
    .then(data => {document.getElementById('content2').innerHTML=data;})
    .catch((error) => {
        console.error('Error:', error);
    });
}


function update8(){
	document.getElementById('content2').innerHTML='';
    let ran = Number(localStorage.getItem('teletoken'));
    fetch('name.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `token=${ran}`,
    })
    .then(response => response.text())
    .then(data => {document.getElementById('content2').innerHTML=data;})
    .catch((error) => {
        console.error('Error:', error);
    });
}

function logout(){
	localStorage.clear();
	document.getElementById('content2').innerText = '';document.getElementById('content').innerText = '';location.reload();
}
</script>

<br>
 Search by Name or Dept : <input type="text" name="search" id="search" oninput="this.value=this.value.toUpperCase()"><br>
  <br>

   <div id="suggestions"></div>
<script>
    var searchBox = document.getElementById('search');
    var suggestionsContainer = document.getElementById('suggestions');

    searchBox.addEventListener('input', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '3Copy.php?q=' + encodeURIComponent(searchBox.value), true);
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
    // Add custom headers
    var customHeaders = ['REFERENCE','NAME', 'EXT','MOBILE','DEP','LOCATION']; // replace with your headers
    customHeaders.forEach(function(header) {
        var th = document.createElement('th');
        th.textContent = header;
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
<script>
function deleteData() {
    var refValue = document.getElementById('ref').value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'deleteaction.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Success:', this.responseText);
			let t = document.getElementById('operesult');
			t.innerText = `Deleted User ${refValue}.`;
			t.style.color = 'red';
        } else if (xhr.readyState === 4) {
            console.error('Error:', this.status);
        }
    };

    xhr.send(`token=${refValue}`);
}


</script>

<script>
function updatet() {
            let ref = document.getElementById('ref').value;
            let ref1 = document.getElementById('ref1').value;
            let ref2 = document.getElementById('ref2').value;
            let ref3 = document.getElementById('ref3').value;
	    let ref4 = document.getElementById('ref4').value;
	    let ref5 = document.getElementById('ref5').value;

            let data = { ref: ref, ref1: ref1, ref2: ref2, ref3: ref3, ref4: ref4,ref5:ref5 };

            let xhr = new XMLHttpRequest();
            xhr.open("POST", 'updateaction.php', true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Success:', this.responseText);
			let t = document.getElementById('operesult');
			t.innerText = `Updated For User ${ref1}.`;
			t.style.color = 'green';
                } else if (xhr.readyState === 4) {
                    console.error('Error:', this.status);
                }
            };

            xhr.send(JSON.stringify(data));
        }



function updatel() {
            let ref = document.getElementById('ref').value;
	    let ref4 = document.getElementById('ref4').value;

            let data = { ref: ref,ref4: ref4 };

            let xhr = new XMLHttpRequest();
            xhr.open("POST", 'locationaction.php', true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Success:', this.responseText);
			let t = document.getElementById('operesult');
			t.innerText = `Updated For Location ${ref4}.`;
			t.style.color = 'green';
                } else if (xhr.readyState === 4) {
                    console.error('Error:', this.status);
                }
            };

            xhr.send(JSON.stringify(data));
        }


function upnameext() {
            let ref = document.getElementById('ref').value;
	    let ref4 = document.getElementById('ref4').value;
 let ref5 = document.getElementById('ref5').value;
 let ref6 = document.getElementById('ref6').value;

            let data = { ref: ref,ref4: ref4 ,ref5:ref5,ref6:ref6};

            let xhr = new XMLHttpRequest();
            xhr.open("POST", 'nameextaction.php', true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Success:', this.responseText);
			let t = document.getElementById('operesult');
			t.innerText = `Updated For Name and Ext ${ref4} | ${ref5}.`;
			t.style.color = 'green';
                } else if (xhr.readyState === 4) {
                    console.error('Error:', this.status);
                }
            };

            xhr.send(JSON.stringify(data));
        }

function upmobileext() {
            let ref = document.getElementById('ref').value;
 let ref5 = document.getElementById('ref5').value;
 let ref6 = document.getElementById('ref6').value;

            let data = { ref: ref ,ref5:ref5,ref6:ref6};

            let xhr = new XMLHttpRequest();
            xhr.open("POST", 'mobileextaction.php', true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Success:', this.responseText);
			let t = document.getElementById('operesult');
			t.innerText = `Updated For Ext and Mobile ${ref5} | ${ref6}.`;
			t.style.color = 'green';
                } else if (xhr.readyState === 4) {
                    console.error('Error:', this.status);
                }
            };

            xhr.send(JSON.stringify(data));
        }

function ext() {
            let ref = document.getElementById('ref').value;
 let ref5 = document.getElementById('ref5').value;

            let data = { ref: ref ,ref5:ref5};

            let xhr = new XMLHttpRequest();
            xhr.open("POST", 'extaction.php', true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Success:', this.responseText);
			let t = document.getElementById('operesult');
			t.innerText = `Updated For Ext ${ref5}.`;
			t.style.color = 'green';
                } else if (xhr.readyState === 4) {
                    console.error('Error:', this.status);
                }
            };

            xhr.send(JSON.stringify(data));
        }


function mobile() {
            let ref = document.getElementById('ref').value;
 let ref5 = document.getElementById('ref5').value;

            let data = { ref: ref ,ref5:ref5};

            let xhr = new XMLHttpRequest();
            xhr.open("POST", 'mobileaction.php', true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Success:', this.responseText);
			let t = document.getElementById('operesult');
			t.innerText = `Updated For Mobile ${ref5}.`;
			t.style.color = 'green';
                } else if (xhr.readyState === 4) {
                    console.error('Error:', this.status);
                }
            };

            xhr.send(JSON.stringify(data));
        }


function name1() {
            let ref = document.getElementById('ref').value;
 let ref5 = document.getElementById('ref5').value;

            let data = { ref: ref ,ref5:ref5};

            let xhr = new XMLHttpRequest();
            xhr.open("POST", 'nameaction.php', true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Success:', this.responseText);
			let t = document.getElementById('operesult');
			t.innerText = `Updated For Name ${ref5}.`;
			t.style.color = 'green';
                } else if (xhr.readyState === 4) {
                    console.error('Error:', this.status);
                }
            };

            xhr.send(JSON.stringify(data));
        }
</script> </body>