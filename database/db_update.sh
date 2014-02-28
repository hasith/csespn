#!/bin/bash          
echo Start Executing SQL commands
PWD="intel@123"
mysql -h "localhost" "csespn" < "csespn.sql"
