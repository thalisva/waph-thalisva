#include <stdio.h>
int main(){
	printf("Content-type:text/html\r\n\r\n");
	printf("<!DOCTYPE html>\n");
	printf("<html>\n");
	printf("<head>\n");
	printf("<title>My CGI PAGE</title>\n");
	printf("</head>\n");
	printf("<body>\n");
	printf("<h1>Welcome to my CGI Page</h1>\n");
	printf("<p>This is a simple CGI Program installed in Apache.</p>\n");
	printf("</body>\n");
	printf("</html>\n");
	return 0;

}