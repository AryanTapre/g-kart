# TryIt, StyleIt!Mobile Application

## Description
TryIt, StyleIt!is a virtual dressing room application for >= Android 6.0.

It allows users to see how an outfit will look on them by using image processing and a body pose estimation model.

<br/><br/>
## How does it work ?
### Add Outfit
TryIt, StyleIt! allows users to add their own outfit from gallery.<br/>
The selected outfit is processed according to a sensitivity rate given by the user.<br/>
User selects a category to store outfit.<br/>
The outfit stored in database.<br/><br/>

Image processing methods to extract outfit given below;
  * Add alpha channel to image
  * Boolean Masking (Binary Threshold)
  * Noise Removal (Gaussian Blur)
  * Generate mask to make background transparent
  * Apply generated mask
  * Find largest contour to remove unnecessary area
  * Crop largest contour

### Fit Outfit on Camera Preview
TryIt, StyleIt!  uses a tensorflow-lite model to estimate certain points on user's body during camera preview.<br/> 
By using these estimated points, the outfit is placed on screen by calculating its size and position.<br/><br/>


The model estimates 14 points on user's body;<br/> 
_Top, Neck, Left Shoulder, Left Elbow, Left Wrist, Right Shoulder, Right Elbow, Right Wrist, Left Hip, Left Knee, Left Ankle, Right Hip, Right Knee, Right Ankle._<br/><br/>


There are 4 outfit categories;<br/>
_"Top", "Long Wears", "Trousers", "Shorts and Skirts"_
<br/><br/>

According to its category, the outfit size and position are calculated by using;<br/>
* Top --> Left Shoulder, Right Shoulder, Left Hip
* Long Wears --> Left Shoulder, Right Shoulder, Left Knee
* Trousers --> Left Hip, Right Hip, Left Ankle
* Shorts and Skirts --> Left Hip, Right Hip, Left Knee


<br/><br/>
## Software and Tools
* Android Studio 3.2.1
* TensorFlow-Lite
* OpenCV 4.1
* SQLite


<br/><br/>
## Future Development
  ### Functional
  * Users will be allowed to create outfit combinations
  * Users will be allowed to take screenshot during preview with a button
  * Users will be able to connect this app with online shopping sites like Flipkart, Myntra etc for integration

  ### System
  * Semantic segmentation to extract outfit in a more efficient way
  * 3D modeling for a more realistic result
