import logging
import os
import time

#custom imports
from food_detector import get_predicted_items
import database

FILE_PATH = '/mnt/nfs/image/image_stream.jpg'

def main():
	logging.basicConfig(format='%(asctime)s %(levelname)s:%(funcName)s:%(message)s', datefmt='%Y-%m-%d %I:%M:%S %p',
						level=logging.DEBUG)
	logging.info('Started logger.')

if __name__ == '__main__':
	#start logger
	main()
	while 1:
		while not os.path.exists(FILE_PATH):
			logging.debug("Waiting for changes...")
			time.sleep(1)

		if os.path.isfile(FILE_PATH):
			logging.debug("File exists.")
			# make sure a user is logged in 
			current_user = database.get_current_user()
			if current_user == 'None':
				logging.debug("Currently no user is logged on.")
			else:
				logging.info("User [{}] is currently logged on.".format(current_user))
				food_items, file_path = get_predicted_items()
				if food_items is not None:
					#add to item list database
					for k, v in food_items.items():
						database.add_to_item_list(current_user, k,file_path, v)
					try:
					    os.remove(FILE_PATH)
					    logging.debug("Removed file [{}].".format(FILE_PATH))
					except OSError as e:  ## if failed, report it back to the user ##
					    logging.error("Error: %s - %s." % (e.filename, e.strerror))
				logging.warning("Did not detect anything.")
				pass
		else:
			raise ValueError("%s isn't a file!" % FILE_PATH)
		
		#sleep for 5 seconds
		time.sleep(5)
