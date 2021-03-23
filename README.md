### [Facebook/Google API | Login with Facebook/Google accounts in PHP][link] - [nvanha][website]

## Introduce
-
-
-

## Installation
Set config in `modules/connect_db.php` :
```php
$host = '';
$user_name = '';
$password = '';
$database = '';

$conn = mysqli_connect($host, $user_name, $password, $database);

if (!$conn) {
    echo "Connection failed: ".mysqli_connect_error();
}
```
---

---
Create Virtual Host Name
- Step 1: 
Access to `C:\xampp\apache\conf\httpd.conf`, and search for the code below, remove comment at line 2 if it is available
```php
# Virtual hosts
# Include conf/extra/httpd-vhosts.conf
```
- Step 2:
Access to `C:\xampp\apache\conf\extra\httpd-vhosts.conf`, and add the code below
```php
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/demo"
    ServerName demo.com
</VirtualHost>
```
*Note, DocumentRoot is path to the project directory and ServerName is the link that leads you want to put on the website*
- Step 3:
Access to `C:\Windows\System32\drivers\etc\hosts`, and add your host
```php
127.0.0.1 demo.com
```
*Note, host must have the same name as ServerName above*

---
Configuring SSL HTTPS in XAMPP
- Step 1: Create `crt` directory in `C:\xampp\apache\`, then copy `cert.conf`, `document.txt` and `make-cert.bat` in the `SSL` directory of Project, and paste in there
- Step 2:
Open `cert.conf`, and correct the lines below
```php
...
commonName_default          = demo.com
...
DNS.1       = demo.com
```
- Step 3: Run `make-cert.bat`, then enter your domain, and press the enter key until the end

*Note, folder "demo.com" will be created*
- Step 4: Run `server` in the `demo.com` directory, and follow these steps below
```php
Install Certificate -> Local Machine -> Next -> Place all certificates in the following store -> Browse -> Trusted Root Certification Authorities -> OK -> Next -> Finish -> OK
```
- Step 5: Copy the content of `document.txt`, and paste into `C:\xampp\apache\conf\extra\httpd-vhosts.conf`
```php
 <VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/demo"
    ServerName demo.com
    ServerAlias *.demo.com
 </VirtualHost>
 <VirtualHost *:443>
    DocumentRoot "C:/xampp/htdocs/demo"
    ServerName demo.com
    ServerAlias *.demo.com
    SSLEngine on
    SSLCertificateFile "crt/demo.com/server.crt"
    SSLCertificateKeyFile "crt/demo.com/server.key"
 </VirtualHost>
```
- Step 5: Restart `Apache` and `MySQL` in `XAMPP`
## Path
Index:
```php
demo.com
```

### Connect with me:

[<img align="left" alt="nvanha.com" width="22px" src="https://raw.githubusercontent.com/iconic/open-iconic/master/svg/globe.svg" />][website]
[<img align="left" alt="nvanha | Facebook" width="22px" src="https://cdn.jsdelivr.net/npm/simple-icons@v3/icons/facebook.svg" />][facebook]
[<img align="left" alt="nvanha | Instagram" width="22px" src="https://cdn.jsdelivr.net/npm/simple-icons@v3/icons/instagram.svg" />][instagram]

[website]: https://nvanha.github.io/myweb
[instagram]: https://www.instagram.com/_haa_nguyen
[facebook]: https://www.facebook.com/nvh1120
[link]: https://github.com/nvanha/api_login