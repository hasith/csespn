#!/bin/bash          

echo Creating fresh empty csespn DB
mysql -h "localhost" -u "root" -p < "create_new_db.sql"

echo Adding tables and data to the DB
mysql csespn -h "localhost" -u "root" -p < "create_tables.sql"

echo Adding base data to the DB
mysql csespn -h "localhost" -u "root" -p < "seed_basedata.sql"

echo Sample data to the DB for development purposes
mysql csespn -h "localhost" -u "root" -p < "seed_sampledata.sql"