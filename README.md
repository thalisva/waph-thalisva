# WAPH-Web Application Programming and Hacking
## Instructor name: Dr.Phu Phung

## Student info: 
 
*Name*: Charan Sai Venaganti

*Email*: venagaci@mail.uc.edu

![Charan's headshot](/images/headshot.jpg)

## Repository information

Repository's URL: [https://github.com/venagaci/waph-venagaci]

# Lab 2 - Front-end Web Development 

### Task 1: Basic HTML with forms, and JavaScript 

####  a. HTML (5 pts) 

I developed a simple HTML file named waph-venagaci.html with basic tags , an image of my headshot and form.

Here is code included: 

html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <div id="top">
        <h1>Web Application Programming and Hacking</h1>
        <h2>Front-end Web Development Lab</h2>
        <h3>Instructor: Dr. Phu Phung</h3>
    </div>
    <div id="menubar">
        <h3>Student: Charan Sai</h3>
        <img src="/images/headshot.jpg" alt="My headshot" width="50">

        <div id="digital-clock"></div>
    </div>
    <div id="main">
        <p> A simple HTML page </p>
        Using the <a href="https://www.w3schools.com/html">W3Schools template</a>

        <hr>
        <b>Interactions with forms</b>
        <div>
            <i>Form with an HTTP GET Request</i>
            <form action="/echo.php" method="GET">
                Your input:<input name="data">
                <input type="submit" value="submit">
            </form>
        </div>
        <div>
            <i>Form with an HTTP POST Request</i>
            <form action="/echo.php" method="POST" name="echo_post">
                Your input:<input name="data" onkeypress="console.log('you have pressed a key')">
                <input type="submit" value="submit">
            </form>
        </div>        
    </div>
</body>
</html>



![Charan's headshot](images/T1indexhtmlpagess.png)

Caption: Screenshot with with basic tags, an image of your headshot, and a form.

####  b. Simple JavaScript (15 pts)

- Inline JavaScript code in HTML tags to display the current date/time
   
Here is the HTML code included;

html
<div>
    <b>Experiments with JavaScript code</b><br>
    <i>Inlined JavaScript</i>
    <div id="date" onclick="document.getElementById('date').innerHTML = Date()">Click here to show Date()</div>
</div>


![Charan's headshot](images/T1timeSS.png)
Caption: Screenshot displays the current date/time

- JavaScript code in a <script> tag to display a digital clock

Here is the HTML code included;

 html
<script type="text/javascript">
    function displayTime() {
        document.getElementById('digital-clock').innerHTML = "Current time: " + new Date();
    }
    setInterval(displayTime, 500);
</script>


![Charan's headshot](images/T1digitalclockSS.png)
Caption: Screenshot displays the digital clock




- JavaScript code in a JavaScript file and code in the HTML page to show/hide your email when clicked.

Here is the email.js code included;

email.js:

html


var shown = false;

function showhideEmail() {
    if (shown) {
        document.getElementById('email').innerHTML = "show my email";
        shown = false;
    } else {
        var myemail = "<a href='mailto:venagaci" + "@" + "mail.uc.edu'>venagaci" + "@" + "mail.uc.edu</a>";
        document.getElementById('email').innerHTML = myemail;
        shown = true;
    }
}




![Charan's headshot](images/T1beforeclickingemail.png)


Caption: Screenshot before clicking email



![Charan's headshot](images/T1afterclickingemail.png)
Caption: Screenshot after clicking email




- Display an analog clock using an external JavaScript code and code in your HTML page.

Here is the code included:

html
<div id="digital-clock"> </div>
<canvas id="analog-clock" width="150" height="150" style="background-color: #999"></canvas>
<script src="https://waph-uc.github.io/clock.js"></script>

<script>
    var canvas = document.getElementById("analog-clock");
    var ctx = canvas.getContext("2d");
    var radius = canvas.height / 2;
    ctx.translate(radius, radius);
    radius = radius * 0.90;
    setInterval(drawClock, 1000);

    function drawClock() {
        drawFace(ctx, radius);
        drawNumbers(ctx, radius);
        drawTime(ctx, radius);
    }
</script>



![Charan's headshot](images/T1clockouput.png)
Caption: Screenshot of clock output




### Task 2: Ajax, CSS, jQuery, and Web API integration

####  a. Ajax (7.5 pts) 

Here is the code included:

html
<div>
    <i>Ajax request</i>
    <br>
    " Your Input: "
    <input name="data" onkeypress="console.log('you have pressed a key')" id="data">
    <script type="text/javascript">
        function getEcho() {
            var input = document.getElementById("data").value;
            if (input.length == 0) {
                return;
            }
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("Received data =" + xhttp.responseText);
                    document.getElementById("response").innerHTML = "Response from server:" + xhttp.responseText;
                }
            }
            xhttp.open("GET", "echo.php?data=" + input, true);
            xhttp.send();
            document.getElementById("data").value = "";
        }
    </script>
</div>



![Charan's headshot](images/T2ajaxss.png)
Caption: Screenshot of Ajax testing



#### b. CSS (7.5 pts) Inline, Internal , External

Here is the html code included:

html
    <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://waph-uc.github.io/style1.css">
    <meta charset="utf-8">

    <style>
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .round {
            border-radius: 8px;
        }

        #response {
            background-color: #ff9800;
        }
    </style>
</head>
<body>
    <div id="top">
        <h1 style="color:blue";>Web Application Programming and Hacking</h1>
        <h2>Front-end Web Development Lab</h2>
        <h3>Instructor: Dr. Phu Phung</h3>
    </div>
</body>
</html>



![Charan's headshot](images/T2cssfirstSS.png)
Caption: Screenshot of CSS 



![Charan's headshot](images/T2csssecondSS.png)

Caption:  Screenshot of CSS 


####  c. jQuery (5 pts) 

*i.* and *ii.*

Here is the code included for *i.*   &     *ii.*

html

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div>
    <i>Ajax request</i>
    " Your Input: "
    <input name="data" onkeypress="console.log('you have pressed a key')" id="data">
    <input class="button round" type="button" value="Ajax Echo" onclick="getEcho()">
    <input class="button round" type="button" value="Ajax jQuery GET" onclick="jQueryAjax()">
    <input class="button round" type="button" value="Ajax jQuery POST" onclick="jQueryAjaxPost()">
    <script>
        function jQueryAjax() {
            var input = $("#data").val();
            if (input.length == 0) {
                return;
            }
            $.get("echo.php?data=" + input,
                function(result) {
                    $("#response").html("Response from server:" + result);
                });
            $("#data").val("");
        }

        function jQueryAjaxPost() {
            var input = $("#data").val();
            if (input.length == 0) return;
            $.post("echo.php", { data: input },
                function(result) {
                    $("#response").html("Response from server:" + result);
                }
            );
            $("#data").val("");
        }
    </script>
</div>



![Charan's headshot](images/T2jquerygetss.png)
Caption: Screenshot of jquery for GET

![Charan's headshot](images/T2jquerypostss.png)
Caption: Screenshot of jquery for POST




#### d. Web API integration (10 pts)

*i.*

Here is the Code included:

html

$.get("https://v2.jokeapi.dev/joke/Programming?type=single",
    function(result) {
        console.log("From jokeAPI: " + JSON.stringify(result));
        $("#response").html("A programming joke of the day: " + result.joke);
    });


![Charan's headshot](images/T2webapiconsoleSS.png)
Caption: Screenshot of WebApi console 


*ii.*

Here is the code included:

html

async function guessAge(name) {
    const response = await fetch("https://api.agify.io/?name=" + name);
    const result = await response.json();
    $("#response").html("Hi " + name + ", your age should be " + result.age);
}



![Charan's headshot](images/T2apifetchss.png)
Caption: Screenshot of API Fetch
