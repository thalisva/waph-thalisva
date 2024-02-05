# WAPH-Web Application Programming and Hacking


## Instructor_name: Dr.Phu_Phung

# Lab 1 - Foundations of the Web

## Student _information:
 
**Name**: Varsha Thalishetti

**Email**: thalisva@mail.uc.edu

![Phu's headshot](/images/image1.jpg)

#The Lab’s Overview
This lab looks into multiple aspects of web development and comprehension of the HTTP protocol. We cover topics like HTTP requests using telnet, Wireshark analysis, PHP web applications, CGI web applications, and analyzing GET and POST requests. The results include hands-on experience with telnet, CGI, and PHP web application programming, as well as practical knowledge with tools like Wireshark."
Repository's URL: [https://github.com/thalisva/waph-thalisva/labs/lab1]

#part 1: The Web and Http Protocol

##   Task-1. 

## Solution:

Wireshark Installation:
1)I began by installing Wireshark on my system using the command $sudo apt install wireshark-qt.
2)Launching Wireshark: After the installation, I initiated the Wireshark application using the command $sudo wireshark &. Subsequently, I executed the command $ telnet example 80 and initiated a request from my Mozilla Firefox browser.
3)Capturing Packets: Upon opening the network analyzer window, I selected the option that includes all interfaces and started capturing packets by clicking the "Start" button.
4)Filtering HTTP Packets: To focus on HTTP traffic, I applied a filter by typing "http" in the search bar. This allowed me to isolate and analyze the request and response messages, providing detailed insights into the packet data.

![C's headshot](/images/image2.png)

After installing wireshark it directly redirects to the wireshark web page and then we click on icon 4th to setup(see in the screenshop) and you will get some inputs click “any”  in the input and then click on Start and go back to the browser (Example chrome, firefox, etc) and enter example.com in the browser I used firefox for this and then stop the server in the wireshark we will get some packets search for Http request and response packets and take the screenshot this is screenshot of GET / HTTP/1.1 request.

![C's headshot](/images/Image3.png)

The screenshot above shows the response message to view the HTTP/1.1 200 response message
![C's headshot](/images/image4.png)

The screenshot above shows the “HTTP Stream”
RED:”HTTP request messages”
Blue: “HTTP response messages”

## Task-2 : Understanding HTTP using and telnet and Wireshark

## Solution:

![C's headshot](/images/imageX.png)

The screenshot shows HTTP with telnet we use the command “telnet example.com 80” Don’t enter in the terminal, go to Wireshark and click on start after that come to the terminal and enter “telnet example.com 80” It is used to connect to the web server at port 80 and we enter 
GET /HTTP/1.0
Host: example.com 
Go back to Wireshark stop the server and search for HTTP we will get request and response like 
GET / HTTP/1.0 and HTTP/1.0 200 OK

![C's headshot](/images/image5.png)

The above screenshot is about GET /HTTP/1.0 it shows the request message

### There are notable distinctions in the second HTTP request compared to the first. Key headers such as User-Agent, Accept, Accept-Language, Accept-Encoding, Cache-Control, Pragma, and Connection are absent in the second request. Additionally, the second request utilizes a different HTTP version (HTTP/1.0) in contrast to the first request.

![C's headshot](/images/image6.png)

The above screenshot is about GET /HTTP/1.0 it shows the request message

### The response messages in Task 1 and Task 2 showcase several differences. Notably, they diverge in HTTP versions, with Task 1 utilizing HTTP/1.1 and Task 2 opting for HTTP/1.0. Variances extend to server headers; Task 1 displays "Server: nginx," whereas Task 2 indicates "Server: ECS (cha/8094)." Cache-Control directives differ, with Task 1 featuring "public, must-revalidate, max-age=0, s-maxage=3600" and Task 2 specifying "max-age=604800." Content-Type headers vary, as Task 1 presents "Content-Type: text/html," while Task 2 includes "Content-Type: text/html; charset=UTF-8." Additional distinctions encompass Date, Etag, Expires, Last-Modified, X-Cache, and Content-Length headers, with Task 2 uniquely incorporating Etag, Expires, Last-Modified, and X-Cache headers. Task 1 lacks these, and Content-Length values differ, with Task 1 at a length of 90 and Task 2 with 1256.

![C's headshot](/images/image7.png)

HTTP Stream Screenshot it shows both request and response.

## Part II - Basic Web Application Programming

###   Task 1_CGI_Web_applications_in_C

## a) Solution:
1)Compiler Installation:
Initially, I installed the GCC compiler by executing $ sudo apt install gcc and utilized it as a standard binary program.
2)Text Editor Setup:
Subsequently, I employed Sublime Text editor by typing $ subl helloworld.c, where I entered the C program code for "helloworld" and saved the file.
3)Compilation and Execution:
After saving, I navigated to the terminal and compiled the program with $ gcc helloworld.c -o helloworld.cgi. The program was then executed using $ ./helloworld.cgi.
4)Apache Webserver Configuration:
To enable the Apache webserver, I executed $ sudo a2enmod cgid and restarted the Apache Server with $ sudo systemctl restart apache2.
5)CGI Program Deployment:
CGI programs are stored in /usr/lib/cgi-bin. To invoke them, I copied the "helloworld.cgi" program into this folder using $ sudo cp helloworld.cgi /usr/lib/cgi-bin.
6)Testing in Browser:
Finally, I opened a browser and entered http://localhost/cgi-bin/helloworld.cgi to test the CGI program.

![C's headshot](/images/image8.png)

The screenshot shows the execution of CGI program in the terminal

![C's headshot](/images/image9.png)

The Screenshot shows the program execution in the browser
## b) Solution
1)Text Editor Setup: Firstly, I used the command $ subl index.c to open the Sublime Text editor. Within the editor, I entered the C program code containing HTML and subsequently saved the file.
2)Compilation and Execution: After saving, I moved to the terminal and compiled the program with $ gcc index.c -o index.cgi. The program was then executed using $ ./index.cgi.
3) CGI Program Deployment: CGI programs are typically stored in the /usr/lib/cgi-bin folder and are invoked by Apache2 when requested. To facilitate this, I copied the "index.cgi" program into the specified folder with the command $ sudo cp index.cgi /usr/lib/cgi-bin.
4) Testing in Browser: To verify the functionality, I opened a browser and entered http://localhost/cgi-bin/index.cgi.
Here is the index.c program I have used.

![C's headshot](/images/image10.png)
The screenshot shows the execution of the index.cgi program in the terminal

![C's headshot](/images/image11.png)
The Screenshot shows the program execution in the browser.It incudes title,heading and paragraph.

###  Task 2 

## a)Solution Steps:

1)PHP Installation and Configuration: I installed PHP and configured it to function with the Apache Web Server using the command: $ sudo apt-get install php libapache2-mod-php -y.
2)File Creation: Following the installation, I created a new file named "helloworld.php" in the "labs/lab1" folder within my private repository. The file contained content similar to that provided by the professor.
3)Code Deployment: Subsequently, I deployed the PHP code to the webserver using the command: $ sudo cp helloworld.php /var/www/html.
4)Testing in Browser:
To validate the implementation, I opened a browser and entered http://localhost/helloworld.php.

![C's headshot](/images/image12.png)
In the terminal the screenshot shows the sublime of helloworld.php 
![C's headshot](/images/image13.png)
The screenshot shows the output of helloworld.php in the browser

## b) Solution Steps:
1)File Creation and PHP Code:
I generated an "echo.php" file and entered the PHP code provided by the professor.
2)Code Deployment:
The PHP code was deployed to the root directory of the webserver using the command: $ sudo cp echo.php /var/www/html.
3)PHP Code Content:
The PHP code in "echo.php" is as follows:
php
Copy code
<?php
echo $_REQUEST["data"];
?>
4) Testing in Browser: To assess the functionality, I accessed the browser and entered the URL http://localhost/echo.php?data=Varsha%20Sai%20Thalishetti with input data included.
![C's headshot](/images/image14.png)
Here is the output of helloworld.php in the browser with my name
![C's headshot](/images/image15.png)
Here is the output of echo.php in the browser with my name.

#### Yes there are risks in this process:
There are inherent risks in this approach. The use of $_REQUEST[] in PHP for input retrieval poses security concerns due to potential vulnerabilities. This superglobal amalgamates data from various sources, including $_GET, $_POST, and $_COOKIE, making it challenging to discern the data's origin and heightening the risk of unintended overwriting. The inclusion of cookie data exposes the application to potential attacks, and the ambiguity of data sources creates opportunities for exploitation by malicious actors. Security best practices advise using $_GET for read-only requests and $_POST for data modification, but the use of $_REQUEST undermines this distinction. Furthermore, it elevates the risk of injection attacks if the data is employed in security-sensitive operations. Therefore, it is recommended to explicitly use $_GET or $_POST based on the request nature and implement robust input validation and sanitation practices to bolster security.

### Task 3- “Understanding_HTTP_GET_and_POST_requests.”

## a)solution:
1)Network Packet Analysis with Wireshark:
I employed Wireshark, a network packet analyzer, to capture and meticulously display network packets' detailed data.
2)URL Entry and Wireshark Capture Setup:
Prior to clicking "Enter" in the browser, I typed the URL http://localhost/echo.php?data=Varsha%20Thalishetti and initiated Wireshark to capture both the request and response.
3)Browser Process Initiation:
Upon typing the URL, I proceeded by clicking "Enter" in the browser, commencing the process.
4)Wireshark Filtering and Code Inspection:
Subsequently, within Wireshark, I filtered HTTP requests and responses related to "echo.php." By right-clicking on the request and response, I accessed and examined the underlying code.
![C's headshot](/images/image16.png)
The Screenshot above shows the request for the echo.php
![C's headshot](/images/image17.png)
The Screenshot above shows the response for the echo.php

## b)solution:
1)Curl Installation:
Prior to using curl, I installed it using the command: $ sudo apt-get install curl.
2)Request with Curl from Terminal:
Following the installation, I executed a curl request with input data from the terminal using the command: $ curl -X POST http://localhost/echo.php -d "data=Hello world, Varsha Thalishetti".
![C's headshot](/images/image18.png)
The Screenshot shows the curl command in the terminal which is executed 
![C's headshot](/images/image19.png)
The Screenshot shows the response in the Wireshark.

## c) Solution
When employing a GET request, the response is visible in the URL, making it susceptible to attacks as attackers can easily intercept and manipulate the information. On the contrary, utilizing a POST request conceals the response, reducing the likelihood of attacks, as the exchanged data is not exposed in the URL and is thus more secure against potential threats.


