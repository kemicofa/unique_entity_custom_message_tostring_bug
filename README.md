# Unique Entity Custom Message Bug

## To reproduce

```bash
git clone https://github.com/kemicofa/unique_entity_custom_message_tostring_bug.git
cd unique_entity_custom_message_tostring_bug
composer install
/** Important ! Update .env mysql connection information */
php bin/console doctrine:database:create
php bin/console d:s:u --force
//run tests
./bin/phpunit
```

## Expectation

Expected to produce a custom message error according to [documentation](https://symfony.com/doc/current/reference/constraints/UniqueEntity.html#message):

> message¶
 type: string default: This value is already used.
>
> The message that's displayed when this constraint fails. This message is always mapped to the first field causing the violation, even when using multiple fields in the constraint.
>
>Messages can include the {{ value }} placeholder to display a string representation of the invalid entity. If the entity doesn't define the __toString() method, the following generic value will be used: "Object of class __CLASS__ identified by <comma separated IDs>"

As can be seen in App\Entity\User the __toString() method is implemented but doesn't get called. Only the default string output is thrown.

