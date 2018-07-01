# Vipwell
A fun little demo jewellery shop with PHP and MySQL. Created in 2007 as a graded university project for a PHP course together with Xingyuan Yang.
Can be seen in action [on my homepage](http://konradhoeffner.de/subprojects/vipwell).

## Deployment

1. Clone this repository.
2. Load `sql/vipwell_final_with_data.sql` into a SQL database (we use MySQL, compatibility with other SQL variants untested).
2. Copy `php/database.php.dist` to `php/database.php` and add the credentials.
3. Deploy to a PHP server.

## Known Issues and Lessons Learned

Does not protect against SQL injection attacks, as we spent most of our time on the photos. Our instructor emphasized how important that is and since then I always use prepared statements.
