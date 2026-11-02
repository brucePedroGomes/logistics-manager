# Bruce fast steps

Run the project on Linux, with no Apache.

## From scratch

```bash
# 1. Get the code
cd /home/bruce/Projects/unipar
git clone https://github.com/brucePedroGomes/logistics-manager.git
cd logistics-manager

# 2. Start the database
sudo /opt/lampp/lampp startmysql

# 3. Create the tables (first time only)
/opt/lampp/bin/mysql -u root < database/schema.sql

# 4. Start the site
/opt/lampp/bin/php -S localhost:8000 -t public
```

Open: http://localhost:8000/

Fill in the data in this order: Transportadores → Endereços → Produtos → Fretes.

## Next time

```bash
cd /home/bruce/Projects/unipar/logistics-manager
sudo /opt/lampp/lampp startmysql
/opt/lampp/bin/php -S localhost:8000 -t public
```

## Stop

- Site: `Ctrl+C`
- Database: `sudo /opt/lampp/lampp stopmysql`

## Empty the database (deletes all data)

```bash
/opt/lampp/bin/mysql -u root -e "DROP DATABASE logistics_manager"
/opt/lampp/bin/mysql -u root < database/schema.sql
```
