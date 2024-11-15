<?php

// Connect to the database, and execute a query
class Database
{
    public $connection;

    // When and instance is constructed. First thing to run
    public function __construct($config, $username = 'root', $password = '')
    {

        // Setup connection to the MySQL database using PDO (PHP Data Objects).
        // Data Source Name (DNS) specifies the connection details for MySQL: Like a connection string
        $dsn = 'mysql:' . http_build_query($config, '', ';'); // host=localhost;port=3306;dbname=myapp


        // Initialize the PDO instance to connect to the database
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {

        $statement = $this->connection->prepare($query);

        // Execute the code
        $statement->execute($params);

        // Fetch the results and remove duplicate array
        return $statement;
    }
}
