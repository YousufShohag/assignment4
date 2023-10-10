CREATE TABLE customer_transfer (id int auto_increment primary key,
                    customer_id int(6),
                    transfer_name varchar(50),
                    transfer_email varchar(50),
                    transfer_amount float(50),
                    date datetime);