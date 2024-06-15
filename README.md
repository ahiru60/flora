## Flora E-commerce Website

This project is an E-commerce website for a flower shop built using PHP and MySQL. The website includes features for product management, user management, shopping cart, and order processing.

### Features

- User Authentication
- Admin Authentication
- Product Management
- User Management
- Shopping Cart
- Order Checkout

### Installation

#### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx server
- Composer

#### Steps

1. **Clone the Repository**

   ```bash
   git clone https://github.com/ahiru60/flora.git
   cd flora
   ```

2. **Install Dependencies**

   ```bash
   composer install
   ```

3. **Database Setup**

   - Import the `loginsystem.sql` file located in the `DATABASE` directory into your MySQL database.
   - Update the `dbCon.php` file with your database credentials.

     ```php
     $con = mysqli_connect("localhost", "your_username", "your_password", "your_database");
     ```

4. **Configure the Web Server**

   - Ensure your server's document root is set to the `flora` directory.
   - Restart the server to apply changes.

5. **Run the Application**

   Open your web browser and navigate to `http://localhost`.

### Project Structure

```plaintext
flora/
├── DATABASE/
│   └── loginsystem.sql
├── assets/
│   ├── css/
│   ├── fonts/
│   ├── images/
│   └── js/
├── includes/
│   ├── admin_authSession.php
│   ├── admin_header.php
│   ├── admin_delete-user.php
│   ├── admin_product-details.php
│   ├── admin_products.php
│   ├── admin_users.php
│   ├── authSession.php
│   ├── dbCon.php
│   ├── footer.php
│   ├── header.php
│   ├── login.php
│   ├── logout.php
│   └── save-product.php
├── index.php
├── about-us.php
├── add-product.php
├── add_to_cart.php
├── cart.php
├── checkout.php
├── contact-us.php
├── countdown-product-details.php
├── delete-product.php
├── product-details.php
└── shop.php
```

### Code Snippets

#### `dbCon.php`

```php
<?php
$con = mysqli_connect("localhost", "root", "", "loginSystem");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
```

#### `add_to_cart.php`

```php
<?php
include('dbCon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['user_id'] == 'null') {
        header("Location: login.php?redirect=" . $_POST['product_id']);
    } else {
        $user_id = $_POST['user_id'] ?? null;
        $product_id = $_POST['product_id'] ?? null;
        $quantity = $_POST['quantity'] ?? null;
        $image = $_POST['image'] ?? null;

        $query = "SELECT * FROM `cart` WHERE user_id = '$user_id' AND product_id = '$product_id'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0 && isset($user_id)) {
            $query = "UPDATE `cart` SET quantity = quantity + $quantity WHERE user_id = '$user_id' AND product_id = '$product_id'";
            mysqli_query($con, $query);
            header("Location: product-details.php?product_id=$product_id");
        } else if (mysqli_num_rows($result) < 1 && isset($user_id)) {
            $query = "INSERT INTO `cart` (user_id, product_id, quantity, img) VALUES ('$user_id', '$product_id', '$quantity', '$image')";
            mysqli_query($con, $query);
            header("Location: product-details.php?product_id=$product_id");
        }
    }
} else {
    echo "error inserting data";
}
?>
```

### Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

### License

This project is licensed under the [MIT License](LICENSE).

