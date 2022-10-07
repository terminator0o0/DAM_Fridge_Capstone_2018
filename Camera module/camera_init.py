from picamera import PiCamera
from time import sleep
import numpy as np
import cv2
import glob


img = np.zeros((512,512,3), np.uint8)
cv2.line(img, (0,0), (511, 511), (255,0,0), 5)
cv2.rectangle(img, (384,0), (510, 128), (0,255,0), 3)
cv2.circle(img, (447, 63), 63, (0,0,255), -1)
pts = np.array([[10,5], [20,30], [70,20]], np.int32)
pts = pts.reshape((-1,1,2))
cv2.polylines(img, [pts], True, (0,255,255))
font = cv2.FONT_HERSHEY_SIMPLEX
cv2.putText(img, 'DAM', (10, 500), font, 4, (255,255,255),2,cv2.LINE_AA)

img = cv2.imread('/home/pi/dev/DAM_Fridge_Capstone_2018/Camera module/images/image.jpg',cv2.IMREAD_GRAYSCALE)

cv2.imshow('image', img)
cv2.waitKey(0)
cv2.destroyAllWindows()

# # termination criteria
# criteria = (cv2.TERM_CRITERIA_EPS + cv2.TERM_CRITERIA_MAX_ITER, 30, 0.001)

# # prepare object points, like (0,0,0), (1,0,0), (2,0,0) ....,(6,5,0)
# objp = np.zeros((6*7,3), np.float32)
# objp[:,:2] = np.mgrid[0:7,0:6].T.reshape(-1,2)

# # Arrays to store object points and image points from all the images.
# objpoints = [] # 3d point in real world space
# imgpoints = [] # 2d points in image plane.

# images = glob.glob('*.jpg')

# for fname in images:
#     img = cv2.imread(fname)
#     gray = cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)

#     # Find the chess board corners
#     ret, corners = cv2.findChessboardCorners(gray, (7,6),None)

#     # If found, add object points, image points (after refining them)
#     if ret == True:
#         objpoints.append(objp)

#         corners2 = cv2.cornerSubPix(gray,corners,(11,11),(-1,-1),criteria)
#         imgpoints.append(corners2)

#         # Draw and display the corners
#         img = cv2.drawChessboardCorners(img, (7,6), corners2,ret)
#         cv2.imshow('img',img)
#         cv2.waitKey(500)

# cv2.destroyAllWindows()

# class CameraModule(object):
# 	"""docstring for CameraModule"""
# 	def __init__(self, resolution, quality, output,
# 					sharpness, contrast, brightness, saturation):
# 		super(CameraModule, self).__init__()
# 		self.resolution. = resolution
# 		self.quality = quality

# 	def cameraInit():

# face_cascade = cv2.CascadeClassifier('')	


#camera = PiCamera()
#camera.capture('/home/pi/dev/DAM_Fridge_Capstone_2018/Camera module/images/image.jpg')

#camera.start_preview()
#camera.vflip = False
#camera.hflip = True
#camera.brightness = 60

#sleep(30)

#for i in range(100):
#    camera.brightness = i
#    sleep(0.1)
    
#camera.stop_preview()
