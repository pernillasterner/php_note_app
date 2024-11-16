# Mini Note App

A simple note application.

___

### Fetching data from db using `fetchAll` method

The `fetchAll` method retrieves all rows from a query result set and returns them as an array of associative arrays.

___

```php
$notes = $db->query('select * from notes where user_id = 1')->fetchAll();
```

#### Results

`fetchAll`: This method fetches all rows of a query result and returns them in a structured format.

```php
array(1) {
  [0]=>
  array(3) {
    ["id"]=>
    int(1)
    ["body"]=>
    string(31) "Let's go!"
    ["user_id"]=>
    int(1)
  }
}
```

___


### Status codes

- 403 Forbidden
- 404 Page Not Found


___



### Functions

Creating custom functions to simplify common tasks. 📁

This function checks condition if the user is authorized, and if the condition fails, it aborts the process with a given status code. 

```php
authorize($note['user_id'] !== $currentUserId);

// Make it possible to overwrite status code
function authorize($condition, $status = Response::FORBIDDEN)
{
    // Status code 403 - Forbidden
    if (! $condition) {
        abort($status);
    }
}
```


___



### POST and GET Methods

- `$_POST` = Use for sending sensitive information. Sends data behind the scenes.
- `$_GET` = Use for sharing or fetching data where visibility isn´t a problem. Sends data via query string in the URL.

___


### Simplifying Null Coalescing in PHP


##### Example 1: Traditional Ternary Operator
```php
// You can do this OR 
<?= isset($_POST['body']) ? $_POST['body'] : '' ?>
```

##### Example 2: Null Coalescing Operator (PHP 7+)
If $_POST['body'] exists and is not null, its value is returned; otherwise, an empty string is used.

```php
// You can do this PHP 7+
<?= $_POST['body'] ?? '' ?>
```