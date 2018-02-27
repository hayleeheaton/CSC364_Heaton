CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `price` float NOT NULL DEFAULT '0',
  `picture` varchar(128) DEFAULT NULL,
  `sku` varchar(32) DEFAULT NULL,
  `qty_available` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `supplier_ID` int(11) DEFAULT NULL,
  `supplier_SKU` varchar(32) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `state` varchar(32) DEFAULT NULL,
  `zip` varchar(16) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `contact_name` varchar(128) DEFAULT NULL,
  `web_Site` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_ID` int(11) DEFAULT NULL,
  `order_number` varchar(64) NOT NULL,
  `shipping_address` varchar(128) DEFAULT NULL,
  `shipping_city` varchar(128) DEFAULT NULL,
  `shipping_state` varchar(32) DEFAULT NULL,
  `shipping_zip` varchar(16) DEFAULT NULL,
  `payment_method` varchar(128) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_ID` int(11) DEFAULT NULL,
  `product_ID` int(11) DEFAULT NULL,
  `fulfilled_by__ID` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` float DEFAULT NULL,  
  `ship_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,  
  `address` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `state` varchar(32) DEFAULT NULL,
  `zip` varchar(16) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,  
  `billing_address` varchar(128) DEFAULT NULL,
  `billing_city` varchar(128) DEFAULT NULL,
  `billing_state` varchar(32) DEFAULT NULL,
  `billing_zip` varchar(16) DEFAULT NULL,
  `mailing_list` bit DEFAULT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `view_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_ID` int(11) DEFAULT NULL,
  `product_ID` int(11) DEFAULT NULL,
  `date_viewed` date DEFAULT NULL,
  `product_purchased` bit DEFAULT NULL,
  `date_purchased` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

