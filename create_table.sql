CREATE TABLE products (
		id int NOT NULL auto_increment, 
		name varchar(255) NOT NULL, 
		price int NOT NULL, 
		description varchar(255) NOT NULL, 
		category varchar(255) NOT NULL, 
		calories int NOT NULL, 
		fat int NOT NULL, 
		carbs int NOT NULL, 
		protein int NOT NULL, 
		sugar int NOT NULL, 
		date_added date NOT NULL,
		PRIMARY KEY(id), 
		UNIQUE KEY name(name)
		);

CREATE TABLE users
  (
      user_id     int(11)      NOT NULL		AUTO_INCREMENT,
      fname		varchar(20)		NOT NULL,
      lname		varchar(20)		NOT NULL,
      phone		varchar(20)		NOT NULL,
      email		varchar(20)		NOT NULL,
      CONSTRAINT pk_user PRIMARY KEY (user_id)
  );

CREATE TABLE accounts
  (
      account_id     	int(11)      		NOT NULL		AUTO_INCREMENT,
      user_id		int(11)			NOT NULL,
      username		varchar(20)		NOT NULL,
      password		varchar(20)		NOT NULL,
      last_login DATE      			NOT NULL,
      CONSTRAINT pk_account PRIMARY KEY (account_id),
      CONSTRAINT account_user_fk
      	FOREIGN KEY (user_id)
      	REFERENCES users (user_id),
      unique(username)
  );

CREATE TABLE guest
  (
      guest_id      int(11)      NOT NULL	AUTO_INCREMENT,
      user_id     	int(11)      NOT NULL,
      CONSTRAINT pk_orders PRIMARY KEY (guest_id,user_id),
	  CONSTRAINT guest_users_fk
      FOREIGN KEY (user_id)
      	REFERENCES users (user_id)
  );

CREATE TABLE orders
  (
      order_num		int(11)		NOT NULL 	AUTO_INCREMENT,
      user_id       int(11)      NOT NULL,
      order_date	DATE NOT NULL,
      instruction	varchar(100),
      order_time  varchar(10),
      order_type varchar(10),
      card_num varchar(20) NOT NULL,
      card_month varchar(10) NOT NULL,
      card_year varchar (5) NOT NULL,
      card_security varchar (7) NOT NULL,
      CONSTRAINT pk_orders PRIMARY KEY (order_num),
      CONSTRAINT order_user_fk
      	FOREIGN KEY (user_id)
      	REFERENCES users (user_id)
  );

CREATE TABLE orderline
  (
      order_num	  int(11)		NOT NULL,
      prod_id     int(11)      NOT NULL,
      quantity    int(11)      NOT NULL,
      CONSTRAINT pk_orders PRIMARY KEY (order_num,prod_id),
      CONSTRAINT orderline_order_fk
      FOREIGN KEY (order_num)
      	REFERENCES orders (order_num),
      CONSTRAINT orderline_product_fk
      FOREIGN KEY (prod_id)
      	REFERENCES products (id)
  );

CREATE TABLE address
  (
      order_num		int(11)      		NOT NULL,
      fname varchar(20)	NOT NULL,
      lname varchar(20)	NOT NULL,
      user_id		int(11)			NOT NULL,
      address_type		varchar(20)		NOT NULL,
      street_number_name		varchar(20)		NOT NULL,
      city 		varchar(20)		NOT NULL,
      state		varchar(20)		NOT NULL,
      zipcode		varchar(20)		NOT NULL,
      country		varchar(20)		NOT NULL,
      CONSTRAINT pk_address PRIMARY KEY (order_num,address_type),
      CONSTRAINT address_user_fk
      	FOREIGN KEY (user_id)
      	REFERENCES users (user_id),
      CONSTRAINT address_order_fk
      	FOREIGN KEY (order_num)
      	REFERENCES orders (order_num)
  );

CREATE TABLE admins
  (
      admin_id     	int(11)      		NOT NULL		AUTO_INCREMENT,
      user_id		int(11)			NOT NULL,
      username		varchar(20)		NOT NULL,
      password		varchar(20)		NOT NULL,
      last_login DATE      			NOT NULL,
      CONSTRAINT pk_admin PRIMARY KEY (admin_id),
      CONSTRAINT admin_user_fk
      	FOREIGN KEY (user_id)
      	REFERENCES users (user_id),
      unique(username)
  );


INSERT INTO `products` VALUES (1,'Mushroom Pizza',10,'Our delicious thin crust with Mozzarella and Shiitake Mushrooms','Pizza',897,8,33,5,11,'2016-10-05'),(2,'Cheese Pizza',9,'Our delicious thin crust with Mozzarella cheese and marinara sauce','Pizza',855,7,32,6,10,'2016-10-05'),(3,'Pepperoni Pizza',10,'Our delicious thin crust with Mozzarella cheese, marinara sauce, and Pepperoni.','Pizza',865,9,34,9,12,'2016-10-05'),(4,'Hawaiian Pizza',12,'Our delicious thin crust with Mozzarella cheese, ham, and pineapple','Pizza',954,8,37,7,14,'2016-10-05'),(5,'BLT',9,'Bacon, lettuce, and tomato on a french roll','Sandwich',864,9,28,6,10,'2016-10-05'),(6,'Steak Sandwich',13,'Steak, grilled onions, jack cheese, on sour dough','Sandwich',975,9,31,12,9,'2016-10-05'),(7,'Breakfast Sandwich',7,'Egg, cheddar cheese, and ham on an english muffin','Sandwich',675,6,25,14,7,'2016-10-05'),(8,'Chicken Panini',10,'Grilled chicken breast, jack cheese, avocado, and tomatoes on white bread','Sandwich',1000,12,32,13,9,'2016-10-05'),(9,'Turkey Panini',10,'Turkey breast, jack cheese, mushrooms, pesto on wheat bread','Sandwich',989,9,34,14,6,'2016-10-05'),(10,'Cobb Salad',13,'Chopped salad greens, tomato, crisp bacon, boiled, grilled or roasted chicken breast, hard-boiled egg, avocado, chives','Salad',1200,13,15,11,7,'2016-10-05'),(11,'Ceaser Salad',12,'Romaine lettuce and croutons dressed with parmesan cheese, lemon juice, olive oil,','Salad',1134,9,10,6,10,'2016-10-05'),(12,'Peach Salad',13,'Mixed greens, feta cheese, peach, crutons, balsamic dressing','Salad',925,6,11,4,14,'2016-10-05'),(13,'Pear Salad',13,'Mixed greens, walnuts, cheese, pear, balsamic dressing','Salad',940,6,17,6,15,'2016-10-05'),(14,'Chicken Noodle',5,'Shredded chicken, carrots, celery, broth','Soup',625,5,10,14,13,'2016-10-05'),(15,'Tomato Basil',4,'Creamy tomato, basil puree with a toasted cruton','Soup',564,8,23,3,9,'2016-10-05'),(16,'Potato Cheese',5,'Potatoes, cheese, bacon, broccoli','Soup',530,9,40,7,6,'2016-10-05'),(17,'French Onion',4,'Meat stock and onions, and often served gratinéed with croutons and cheese on top','Soup',560,6,24,4,5,'2016-10-05'),(18,'Pesto Pasta',11,'Penne pasta with parmesan cheese and creamy pesto','Pasta',1156,6,41,7,9,'2016-10-05'),(19,'Mac n\' Cheese',9,'Elbow pasta with creamy cheddar cheese sauce','Pasta',979,9,44,4,11,'2016-10-05'),(20,'Tortellini',10,'Tortellini stuffed with five cheeses in an alfredo sauce','Pasta',1450,9,36,5,9,'2016-10-05'),(21,'Spaghetti',12,'Ground beef, mushrooms, onions, marinara sauce, spaghetti noodles','Pasta',1076,9,43,12,11,'2016-10-05');

INSERT INTO users  VALUES ('','first','last','714-12phone','email@fake.com');
INSERT INTO admins VALUES ('','1','username','password','2016-11-25');
