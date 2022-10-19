<h1 style="text-align: center">Shop program</h1>
<h2>Project description</h2>

---

A simple program that runs in terminal.

Using the app you can:

- Add, remove & update product stock at any time.
- Manage user cart by adding or removing products.
- Get cart subtotal, vat amount and total at any time, if there are products in cart.
- You cannot purchase more than there is in stock.

The program was created using the TDD approach.

Previously given interfaces were used for creating the models used by the application.

The program was built using PHP 8.0

---

<h2>Project requirements</h2>

---

- PHP >= 8.0
- composer >= 2.3.3

<h2>Installation</h2>

---

1. Installing PHP on the system. Installation guides for all systems can be found
   here: ```https://www.php.net/manual/en/install.php```

2. Downloading and installing composer. Command line:
   Download: ```php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"```
   Local install: ```php composer-setup.php```
   Global install: ```php composer-setup.php --install-dir=/usr/local/bin --filename=composer```
   Test: ```composer```
   Or use the installer from ```https://getcomposer.org/```

3. Copy the code from Github: ```git clone https://github.com/RaymondNalezitij/Shopping_program.git```

4. Go to the project directory and run ```composer update```

5. To test the models used by the project go to the project directory and run: ```./vendor/bin/pest```

6. To run the project in your terminal go to project directory and run: ```php index.php```
