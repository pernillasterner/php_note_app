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

### Status codes

- 403 Forbidden
- 404 Page Not Found
