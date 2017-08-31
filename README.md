# Boarding card sorter

This API that lets you sort this kind of list and present back a description of how to complete your journey.

## Usage of the API

1 . Run composer install and include autoload file
```php
    require '../vendor/autoload.php';
```

2 . Pass your boarding cards to Boarding class
    
```php
    
    $train = new Train(
        'Madrid',
        'Barcelona',
        '78A',
        '45B'
    );
    
    
    $bus = new Bus(
        'Barcelona',
        'Gerona'
    );
    
    $plane = new Plane(
        'Gerona',
        'Stockholm',
        'SK455',
        '45B',
        '3A',
        '344'
    );
    
    $boarding = new Boarding($train, $bus, $plane);

```

3 . Sort your bordering cards using CardSorter

```php
    $sorter = new CardSorter();
    $boarding->sortCards($sorter);
```


4 . Output sorted cards using toHtml method

```php
    echo $boarding->toHtml();
```