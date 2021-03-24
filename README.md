### [Facebook/Google API | Login with Facebook/Google accounts in PHP][link] - [nvanha][website] 👋

## Introduce
- `Facebook/Google API`
- Form login with `Facebook/Google accounts` in `PHP`
- Clase redes Servidor `HTTP` con `XAMPP`
- How to enable `SSL (HTTPS protocol)` with `XAMPP` in a local `PHP` project

## Installation
Set up config in `modules/connect_db.php`:
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
Create Virtual Host Name:
- Step 1: Access to `C:\xampp\apache\conf\httpd.conf`, and search for the code below, remove comment at line 2 if it is available
```php
# Virtual hosts
# Include conf/extra/httpd-vhosts.conf
```
- Step 2: Access to `C:\xampp\apache\conf\extra\httpd-vhosts.conf`, and add the code below
```VirtualHost
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/api_login"
    ServerName api_login.com
</VirtualHost>
```
*Note, DocumentRoot is path to the project directory and ServerName is the link that leads you want to put on the website*
- Step 3: Access to `C:\Windows\System32\drivers\etc\hosts`, and add your host
```php
127.0.0.1 api_login.com
```
*Note, host must have the same name as ServerName above*

---
Configuring SSL HTTPS in XAMPP:
- Step 1: Create `crt` directory in `C:\xampp\apache\`, then copy `cert.conf`, `document.txt` and `make-cert.bat` in the `SSL` directory of Project, and paste in there
- Step 2: Open `cert.conf`, and correct the lines below
```php
...
commonName_default          = api_login.com
...
DNS.1       = api_login.com
```
- Step 3: Run `make-cert.bat`, then enter your domain, and press the enter key until the end

*Note, folder "api_login.com" will be created*
- Step 4: Run `server` in the `api_login.com` directory, and follow these steps below
```php
Install Certificate -> Local Machine -> Next -> Place all certificates in the following store -> Browse -> Trusted Root Certification Authorities -> OK -> Next -> Finish -> OK
```
- Step 5: Copy the content of `document.txt`, and paste into `C:\xampp\apache\conf\extra\httpd-vhosts.conf`
```VirtualHost
 <VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/api_login"
    ServerName api_login.com
    ServerAlias *.api_login.com
 </VirtualHost>
 <VirtualHost *:443>
    DocumentRoot "C:/xampp/htdocs/api_login"
    ServerName api_login.com
    ServerAlias *.api_login.com
    SSLEngine on
    SSLCertificateFile "crt/api_login.com/server.crt"
    SSLCertificateKeyFile "crt/api_login.com/server.key"
 </VirtualHost>
```
- Step 5: Restart `Apache` and `MySQL` in `XAMPP`
---
Create a `Facebook login project`:
- Step 1: Visit [Developers Facebook][dev_fb] to create an account, then create a `facebook login application`
- Step 2: Paste the path to your website created above into fields `Privacy Policy URL` and `Site URL`
- Step 3: Paste the path of `fb_callback.php` into filed `Valid OAuth Redirect URIs` in settings of your products
- Step 4: Once done, go to settings and copy the `App ID`, `App Secret` and `API Version`, then paste into `fb_config.php` in `modules/fb_config.php` as below
```php
<?php
    $fb = new Facebook\Facebook([
        'app_id' => '012345678987654',
        'app_secret' => 'password',
        'default_graph_version' => 'v10.0'
    ]);
?>
```
---
Create a `Google login project`:
- Step 1: Visit [Google Cloud Platform][dev_gg] to create an account, then create a `google login application`
- Step 2: Once done, go to credentials and copy the `Client ID` and `Client secret`, then paste into `gg_source.php` in `modules/gg_source.php` as below
```php
<?php
    ...
    $client_id = '12312312-v2131938712093791';
    $client_secret = 'kj1231298casdjkh1';
    $redirect_uri = 'https://api_login.com';
    ...
?>
```
## Path

Index:
```path
https://api_login.com/
```

### Connect with me:

[<img align="left" alt="nvanha.com" width="22px" src="https://raw.githubusercontent.com/iconic/open-iconic/master/svg/globe.svg" />][website]
[<img align="left" alt="nvanha | Facebook" width="22px" src="https://cdn.jsdelivr.net/npm/simple-icons@v3/icons/facebook.svg" />][facebook]
[<img align="left" alt="nvanha | Instagram" width="22px" src="https://cdn.jsdelivr.net/npm/simple-icons@v3/icons/instagram.svg" />][instagram]

[website]: https://nvanha.github.io/myweb
[instagram]: https://www.instagram.com/_haa_nguyen
[facebook]: https://www.facebook.com/nvh1120
[link]: https://github.com/nvanha/facebook_google_api_login
[dev_fb]: https://developers.facebook.com/apps/
[dev_gg]: https://console.cloud.google.com/getting-started