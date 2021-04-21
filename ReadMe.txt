Table Names
admin, customer, Restaurants, orders, food.



Table
admin{
	Id
	First Name
	Last Name
	Password
}

customer {
	Id
	First Name
	Last Name
	Password
	Address
}

order{
	id_order,
	id_food,
	customer_ID
	Restaurant_ID
	Total
}

food {
	Food_Id
	title
	description
	price
	image
}

restaurants {
	id_restaurant
	name
	street
	city
	parish
}


















CREATE TABLE `project`.`restaurants` (
  `id_restaurants` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `street` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `parish` VARCHAR(45) NULL,
  PRIMARY KEY (`id_restaurants`));

