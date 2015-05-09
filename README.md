# eHaat
Portal for selling/buying farm related items

* Create new `common/dbConnect.php` file
    
    ```php
    <?php
      $host = "localhost"; //hostname of the database server
      $port = 3306;
      $user = "root";
      $database = "eHaat";
      $password = ""; //appropriate password
      
      $link = new mysqli($host.":".$port, $user, $password, $database);
      if($link->connect_error) {
      	$error = $link->connect_error;
      }
    ?>
    ```
  
* All the codes should be directly inside the document root of the server inside the folder `eHaat` (which is obtained if you clone it)

* Import/Execute `sql/ehaat.sql` in your MySQL to create and configure all the tables for storing data. 

* Make sure you have public write permission on `resource/image` directory.
    * In Windows - **Everyone** user must have modify, read and write permission.
    * In Linux - use `chmod 777 resource/image` to provide the required permission
