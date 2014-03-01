#!/bin/bash          
echo Creating fresh empty csespn DB
mysql -h "localhost" -u "root" -p "csespn" < "create_new_db.sql"
echo Adding tables and data to the DB
mysql -h "localhost" -u "root" -p "csespn" < "csespn.sql"