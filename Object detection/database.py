import mysql.connector
from mysql.connector import errorcode
import logging

DATABASE_NAME = 'damfridge'

def connect_to_db():

	config = {
		'user':'admin',
		'password':'',
		'host': '127.0.0.1',
		'port':'3306',
		'database': DATABASE_NAME
	}

	try:
		dbConn = mysql.connector.connect(**config)
		logging.info("Sucessfully connected to database [{}].".format(DATABASE_NAME))
		return dbConn
	except mysql.connector.Error as err:
		if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
			logging.error("Something is wrong with your user name or password")
		elif err.errno == errorcode.ER_BAD_DB_ERROR:
			logging.error("Database does not exist")
		else:
			logging.error(err)
	else:
		dbConn.close()

def get_current_user():
	dbConn = connect_to_db()
	cursor = dbConn.cursor(dictionary=True)
	
	query = ("SELECT * FROM currentuser")
	
	cursor.execute(query)
	
	row = cursor.fetchall()

	user = row[0]['email']

	return user

def add_to_item_list(user, item, image_path, quantity):
	dbConn = connect_to_db()
	cursor = dbConn.cursor()
	add_food_item = ("INSERT INTO itemlist "
					  "(Email, Item, ItemPic, Quantity) "
					  "VALUES (%s, %s, %s, %s)")

	item_list_data = (user, item, image_path, quantity)

	cursor.execute(add_food_item, item_list_data)

	# Make sure data is committed to the database
	dbConn.commit()

def id_renumber():
	dbConn = connect_to_db()
	cursor = dbConn.cursor()
	i = 0
	query = ("UPDATE itemlist SET ID=(@%s:=@%s+1)")

	add = (i, i)

	cursor.execute(query, add)
	logging.info("Renumbered Primary index.")

if __name__ == '__main__':
	get_current_user();
	pass
	#id_renumber()

