#!/bin/bash
echo Adding tables and data to the DB
mysql csespn -h "localhost" -u "root" -p < "create_tables.sql"

echo Adding base data to the DB
mysql csespn -h "localhost" -u "root" -p < "seed_basedata.sql"

echo Sample data to the DB for development purposes
mysql csespn -h "localhost" -u "root" -p < "seed_sampledata.sql"