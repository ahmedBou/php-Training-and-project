> Cookies


* The idea of cookies and sessions is that web servers need to know which of many browsers they are communicating with. What we've done so far is we really have a web server, a database server and a browser, all on the same computer and so it's all you. But in reality, you have a database server and a web server and like a thousand users and which of those browsers is it talking to? And we do this so much when we log in and it knows who we are and it knows what our shopping cart is. Cookies are part of the HTTP protocol, so they function here. They're not stored in the server, they're not stored in the database. And so the idea of a cookie is it's a bit of data that's stored in your browser. It's key value paired. It's almost like a PHP key value array that is stored in the browser. So, you can say X equals 2, except it's the server's data. So this is a bit of server data that's stored in the browser. Those are called cookies. And so the idea is that you start with nothing in the cookie and then it comes in, the request comes in.
* So it's just a way to say here's a key value bit of data and please send it back to me on every request. Okay. So this is a really simple concept and it solves the problem, as I mentioned of when you have a web server, that's talking literally to thousands of different people, all with different identities. Some have credit cards that might be a shopping cart, we might be ordering stuff and we need to mark the browsers. So that's what we're doing, we're marking the browsers and we're picking a random number and we're going to give them a mark. In the earliest of days, 1990, the request response cycle had no state and all browsers looked identical. But now, when we're going to log in, we're going to have identities. Facebook knows who you are. YouTube knows who you are. Cookies are the way that we do all that stuff.
* So, cookies are a piece of data that's chosen by the web server, the key and the value are set by the web server. Sent to the browser. Stored in the browser and then sent back. Now, cookies are not the same as sessions and they're not the same as being logged in. You will find that it's quite often that you visit a web page and they're going to set a cookie, long before you log in. It just often on the very first request.

## Multi users / multi browsers
- When a server interact with many different browsers at the same time, the server needs to know **wich** browser a 
particular request come from.
- Request / Response initially was statless - all browsers looked identical.

## Typical uses for cookies
- **To allow users to skip login and registration forms**,  that gather data like username, password, address, or credit card data.
- **to customize pages** that display information like weather reports, sport scores
- **to focus advertising** like banner ads that target the user's interests

## Description
* A common misconception is that cookies are harmful. Since cookies consist only of plain text, they cannot directly modify a user's computer, create a pop-up ads, generate spam, or steal files.
## Cookies in the browser
- Cookie are marked as to the web adress they come from. The browser only sends back cookies that were originally set by the same server.
- Cookie have an expiration date. Some last for years. Others are short-term and go away as soon as the browser is closed.
## How to set and get a cookie
- You will find that it's quite often that you visit a web page and they're going to set a cookie, long before you log in. It just often on the very first request, it's going to set a cookie.
- To create a cookie and set it in browser, you can use the **setcookie function**, to get the value of a cookie, you can use the autoglobal $_COOKIE variable. This variable is an **associative** **array**.
- if you set the $expire parameter to 0, the cookie only exists until the user close the browser, this is called **session cookies**, if you want , you can set the **$expire** parameter to a date in the future.In that case, the cookie stays in the browser until the expiration date. this is called a **persistent cookie**.
### 1st example : set a cookie in the broser
```php
$name ="userId";
$value = '87';
$expire = strtotime('+1 year');
$path = '/';
setcookie($name, $value, $expire, $path);
```
* in this example shows how to create a cookie with a name of **userid** and value og **87**. this cookie expires after one year and is available to any page in any directory on the web server. to create a timestamp for the expiration date, this code uses the **strtotime** function to get a timestamp that's one year from the current date.

### 2nd example: Gets the value of a cookie from the browser
```php
$userid = filter_input(INPUT_COOKIE, 'userid', FILTER_VALIDATE_INT); //87
```
* **filter_input** function get the value of the cookie named userid from $_COOKIE variable. As a result, if the browser has a cookie named userid, this code returns  the value. Otherwise, it returns a NULL value.

### 3rd example: DELETE a cookie from the browser
```php
$expire = strtotime('-1 year');
setcookie('userId', $expire, '/');
```
- how tod elete a cookie. To do that, you can use the setcookie function to set the $expire parameter of the cookie to a date in the past.
Here, the code sets the $expire parameter to one year in the past. In addition, you must set the $value parameter to an empty string, and you must set all remaining parameters to the same values that were used when the cookie was created.
## The syntax of the setcookie function
```php
setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
```
* **name** The name of the cookie.
* **$value** the value of the cookie. the default is an empty string.
* **$expire** The expiration date of cookie as a timestamp. if set to 0,the cookie expires when the user closes the browser. The default is 0
* **$path** The path in the server that the cookie is available to. if set to **'/'**, the cookie is available to all directories on the current server. The default is the directory of the PHP file that's setting the cookie.
* **$domain** The domain that the cookie is available to. The default is the name of the server that's setting the cookie.
* **$secure** If True, the cookie is available only if it is sent using HTTPS. The default is False
* **httponly** if true, the cookie is only made available through the HTTP protocol and not through client-side scripting languages such as Javascript. The default is FALSE.

## Description
* Once a cookie has been set, you can get it the next time the browser requests a page. To do that, You can use the **filter_input** fuction to get it from the superglobal **$_COOKIE** variable. This variable is an associative array where the cookie name is the key and the cookie value is the value.