## Test Case

Present app is predared to describe the interaction of three modules in Laravel:
user, his orders and products.

The number of routes should be 3-4 or more as desired.
Orders and sending email notifications are processed in queues.

The goal is to see how you can organize the work of modules,
what structures you use for the project,
how your modules receive data from each other.

## Handle queues

To handle queues in Laravel, you need to configure the queue driver
in the .env file and run the queue handler:

`QUEUE_CONNECTION=database`

## Run queues

Use command to run the queue handler:

`php artisan queue:work`
