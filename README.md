# Email_comics_php

This is a php project where a user can login and get a free XKCD comic image every 5mins in there mail.
In this project we have 4 major parts 
* Login/Signup
* Creating a email verification 
* Sending XKCD image mail as attachment and inline image for every 5 mins
* Creating a Unsubscribe button to stop sending mail.

## Front end: HTML, CSS, Bootstrap:
In this project I have used HTML and for some basic styling I have used CSS and Bootstrap.

## Back end: PHP, MySQL,000webhost:
For Backend I have used PHP and PHP Mailer for sending mails, 000webhost as my web host and there database.

## How to create you own project:
1.First create a free account in 000webhost. <br /> 
2.After creating the account clone this repository. <br /> 
```
git clone https://github.com/karthikeyanthanigai/Email_comics_php.git
```
3.In 000webhost select file manager and inside file manager upload the zip file which you have cloned. <br /> 
4.Install unzipper by following this link: https://www.000webhost.com/forum/t/how-to-unzip-files-using-unzipper/51626  <br /> 
5.Now go to the 000webhost home page under tools select Database manager inside that create a database by given database name,database username,password and then after creating the database select manage->phpmyadmin. <br /> 
6.at phpmyadmin select the created database and export the usertable.sql file inside the cloned project. <br /> 
7.change the database details in home.php and connection.php. <br /> 
8.run the hosted project by < your-domain-name >/login-user.php. <br /> 
9.if this below error occurs just click the link and change your browser security. <br /> 
 ![](https://www.2-spyware.com/news/wp-content/uploads/virusai/deceptive-site-ahead_en-400x267.jpg)


## Demo:
Here is a working demo which I have made: https://ungraceful-galley.000webhostapp.com/login-user.php  
### Remember after Signup you will automatically receive mail from the give mail id so if you don't want to receive the mail click on the Unsubscribe button in the page or inside your mail you will find a link login and select the Unsubscribe button to turn off the mail notification.
