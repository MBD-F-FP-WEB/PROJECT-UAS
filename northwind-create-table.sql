CREATE TABLE region
(
	region_id int,
	region_description varchar(255),
	PRIMARY KEY (region_id)
);

CREATE TABLE territories
(
	territory_id varchar(255),
	territory_description varchar(255),
	region_id int,
	PRIMARY KEY (territory_id),
	CONSTRAINT fk_t_to_region 
		FOREIGN KEY (region_id) 
		REFERENCES region(region_id)
);

CREATE TABLE employee
(
	employee_id int,
	last_name varchar(255),
	first_name varchar(255),
	title varchar(255),
	title_of_courtesy varchar(255),
	birth_date date,
	hire_date date,
	address varchar(255),
	city varchar(255),
	region varchar(255),
	postal_code varchar(255),
	country varchar(255),
	home_phone varchar(255),
	extension varchar(255),
	photo bytea,
	notes varchar(255),
	reports_to int,
	photo_path varchar(255),

	PRIMARY KEY (employee_id),
	CONSTRAINT fk_e_to_employee 
		FOREIGN KEY (reports_to) 
		REFERENCES employee(employee_id)
);

CREATE TABLE employee_territories
(
  id int,
	employee_id int,
	territory_id varchar(255),
  PRIMARY KEY (id),
	CONSTRAINT fk_et_to_employee 
		FOREIGN KEY (employee_id) 
		REFERENCES employee(employee_id),
	CONSTRAINT fk_et_to_territory 
		FOREIGN KEY (territory_id) 
		REFERENCES territories(territory_id)
);

CREATE TABLE us_states
(
	state_id int,
	state_name varchar(255),
	state_abbr varchar(255),
	state_region varchar(255),
	PRIMARY KEY (state_id)
);

CREATE TABLE shippers
(
	shipper_id int,
	company_name varchar(255),
	phone varchar(255),
	PRIMARY KEY (shipper_id)
);

CREATE TABLE categories
(
	category_id int,
	category_name varchar(255),
	description varchar(255),
	picture bytea,
	PRIMARY KEY (category_id)
);

CREATE TABLE suppliers
(
	supplier_id int,
	company_name varchar(255),
	contact_name varchar(255),
	contact_title varchar(255),
	address varchar(255),
	city varchar(255),
	region varchar(255),
	postal_code varchar(255),
	country varchar(255),
	phone varchar(255),
	fax varchar(255),
	homepage varchar(255),
	PRIMARY KEY (supplier_id)
);

CREATE TABLE products
(
	product_id int,
	product_name varchar(255),
	supplier_id int,
	category_id int,
	quantity_per_unit varchar(255),
	unit_price int,
	units_in_stock int,
	units_on_order int,
	reorder_level int,
	discontined int,
	PRIMARY KEY (product_id),
	CONSTRAINT fk_p_to_suppliers 
		FOREIGN KEY (supplier_id) 
		REFERENCES suppliers(supplier_id),
	CONSTRAINT fk_p_to_categories 
		FOREIGN KEY (category_id) 
		REFERENCES categories(category_id)
);

CREATE TABLE customer_demographics
(
	customer_type_id varchar(255),
	customer_desc varchar(255),
	PRIMARY KEY (customer_type_id)
);

CREATE TABLE customers
(
	customer_id varchar(255),
	company_name varchar(255),
	contact_name varchar(255),
	contact_title varchar(255),
	address varchar(255),
	city varchar(255),
	region varchar(255),
	postal_code varchar(255),
	country varchar(255),
	phone varchar(255),
	fax varchar(255),
	PRIMARY KEY (customer_id)
);

CREATE TABLE customer_customer_demo
(
  id int,
	customer_id varchar(255),
	customer_type_id varchar(255),
  PRIMARY KEY (id),
	CONSTRAINT fk_ccd_to_customers 
		FOREIGN KEY (customer_id) 
		REFERENCES customers(customer_id),
	CONSTRAINT fk_ccd_to_customer_demographics 
		FOREIGN KEY (customer_type_id) 
		REFERENCES customer_demographics(customer_type_id)
);

CREATE TABLE orders
(
	order_id int,
	customer_id varchar(255),
	employee_id int,
	order_date date,
	required_date date,
	shipped_date date,
	ship_via int,
	freight int,
	ship_name varchar(255),
	ship_address varchar(255),
	ship_city varchar(255),
	ship_region varchar(255),
	ship_postal_code varchar(255),
	ship_country varchar(255),

	PRIMARY KEY (order_id),
	CONSTRAINT fk_o_to_customers 
		FOREIGN KEY (customer_id) 
		REFERENCES customers(customer_id),
	CONSTRAINT fk_o_to_employee 
		FOREIGN KEY (employee_id) 
		REFERENCES employee(employee_id),
	CONSTRAINT fk_o_to_shippers 
		FOREIGN KEY (ship_via) 
		REFERENCES shippers(shipper_id)
);

CREATE TABLE order_details
(
  id int,
	order_id int,
	product_id int,
	unit_price int,
	quantity int,
	discount int,
	PRIMARY KEY (id),
	CONSTRAINT fk_od_to_orders 
		FOREIGN KEY (order_id) 
		REFERENCES orders(order_id),
	CONSTRAINT fk_od_to_products 
		FOREIGN KEY (product_id) 
		REFERENCES products(product_id)
);