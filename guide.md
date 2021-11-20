# Requirement 
1. A PC / Server with Nginx / Apache / IIS running with PHP and enabled CURL PHP function that have the same network environment with the device you would like to watch.
2. Unifi TV user ID + Password

# First Part: Retrieve physicalDeviceID

Steps :
1. Go to [here](https://github.com/samleong123/unifi-tv-revived/raw/main/generate_unifi_playtv.php) to download the PHP script.
2. Go to [https://playtv.unifi.com.my](https://playtv.unifi.com.my)
![image](https://user-images.githubusercontent.com/58818070/142728562-1e8bef59-31e0-43d0-bc5f-d4aef3c937e8.png)
3. Press ```F12``` and navigate to ```Network```.
![image](https://user-images.githubusercontent.com/58818070/142728656-ab7e6d91-66be-4652-a24c-0159cd329c0b.png)
4. Now , press login , DO NOT CLOSE THE F12 NETWORK TAB WHEN YOU LOGIN.
5. After login , notice something called ```Authenticate``` at the ``` F12 - Network``` 
![image](https://user-images.githubusercontent.com/58818070/142728731-80b53902-bed2-450c-a6ee-35e04a80e746.png)
6. Press ```View Source``` , you should see a JSON data format like below :
``` 
{"authenticateBasic":{"userID":"XXXXXXXXXX","userType":"1","timeZone":"Asia/Brunei","isSupportWebpImgFormat":"0","clientPasswd":"XXXXXXXX","lang":"en"},"authenticateDevice":{"physicalDeviceID":"XXXXXX","terminalID":"XXXXXXXX,"deviceModel":"PC Web TV"},"authenticateTolerant":{"areaCode":"XXXX","templateName":"default","bossID":"","userGroup":"-1"}}
```
7. Find ```physicalDeviceID``` in the data , you should see a number after the ```physicalDeviceID```. 
Example : ```{"physicalDeviceID":"123456787887"}```
In this case , ```123456787887``` will be your physicalDeviceID , remember it , you will need this later.

8. Log out of unifi TV website.

# Second Part : Edit the PHP Script
1. Open the PHP Script that you downloaded just now at First Part with Notepad++ or any other editor.
2. Edit the ```userid``` as your unifiPlayTV username & ```password``` as your unifiPlayTV password & ```physicaldeviceid``` as the physicalDeviceID you retrieve just now at first part.
![image](https://user-images.githubusercontent.com/58818070/142728908-c37042be-53f4-4067-a371-f41e1356b3d3.png)
For example :
Your ```userid``` is 601234
```password``` is Siu1h1u1
```physicaldeviceid``` is 12345

You should edit it like this:
```
$userid = "601234"; /**Put ur registered phone number with unifiPlayTV start with 0**/
$password = "Siu1h1u1";/**Put ur unifiPlayTV password**/
$physicaldeviceid = "12345";/** Retrieve physicalDeviceID from F12 Network when login to playtv.unifi.com.my**/
```
3. After done edit , save it and place it into your PC / Server with Nginx / Apache / IIS running with PHP and enabled CURL PHP function that have the same network environment with the device you would like to watch.

# Third Part : Watching on the same network environment devices
1. Download / Install any supported IPTV Players and put the URL of this script (Depends where you place it into ur web server)
2. Wait for processing , you should able to watch now.

## Detailed Instructions
## Importing it into TiviMate (Live TV)
1. Once you installed TiviMate, you will see this screen:
![WIN_20210708_23_33_53_Pro](https://user-images.githubusercontent.com/37889443/124950759-4af70500-e045-11eb-8a8b-165ef35f8b4b.jpg)
Select "Add Playlist".
2. Select "M3U Playlist".
![WIN_20210708_23_33_57_Pro](https://user-images.githubusercontent.com/37889443/124950768-4cc0c880-e045-11eb-81b9-4be1da9c2ca9.jpg)
3. Select "Enter URL", then type / paste the URL that you've just made on the first part.
![WIN_20210708_23_34_04_Pro](https://user-images.githubusercontent.com/37889443/124950771-4d595f00-e045-11eb-9030-ad71728d6ed8.jpg)
4. After typing / pasting the URL, select "Next".
![WIN_20210708_23_34_46_Pro](https://user-images.githubusercontent.com/37889443/124950780-4e8a8c00-e045-11eb-8431-7b45e726bffc.jpg)
5. Select "Next" again.
![WIN_20210708_23_34_53_Pro](https://user-images.githubusercontent.com/37889443/124950786-4fbbb900-e045-11eb-8125-07d256170b0c.jpg)
6. Select "Done". If the "Enter URL" field on this part is blank, type / paste "https://unifiplaytv.samsam123.tk/epg".
![WIN_20210708_23_34_57_Pro](https://user-images.githubusercontent.com/37889443/124950790-50ece600-e045-11eb-8fc2-b89cdf6ad592.jpg)
7. You're ready to watch!
![WIN_20210708_23_35_38_Pro](https://user-images.githubusercontent.com/37889443/124950793-521e1300-e045-11eb-9cab-7459a3bff7b3.jpg)

## Importing it into OTT Navigator
### Importing the playlist
1. Once you installed OTT Navigator, you will see this screen:
![WIN_20210708_23_42_13_Pro](https://user-images.githubusercontent.com/37889443/124952544-eb99f480-e046-11eb-91ac-32dc10cbc476.jpg)
Select "Playlist".
2. Navigate to "URL Address", then select it, then type / paste your URL, then select "Apply".
![WIN_20210708_23_42_21_Pro](https://user-images.githubusercontent.com/37889443/124952554-edfc4e80-e046-11eb-92a6-47c89b0a92cf.jpg)
3. Once OTT Navigator had sucessfully parsed your playlist, select "Close".
![WIN_20210708_23_42_39_Pro](https://user-images.githubusercontent.com/37889443/124952561-efc61200-e046-11eb-8867-6c0f317e5c71.jpg)
### Sort channel by order of the playlist
4. Select "Settings".
![WIN_20210708_23_43_10_Pro](https://user-images.githubusercontent.com/37889443/124952566-f0f73f00-e046-11eb-8d7d-053b4c4ca54b.jpg)
5. Select "Lists Settings".
![WIN_20210708_23_43_16_Pro](https://user-images.githubusercontent.com/37889443/124952573-f3599900-e046-11eb-8fdb-64b4a981d97f.jpg)
6. Select "Select Sort Order".
![WIN_20210708_23_43_21_Pro](https://user-images.githubusercontent.com/37889443/124952580-f48ac600-e046-11eb-878a-a0fa6e61fd54.jpg)
7. Select "Sort Channels By".
![WIN_20210708_23_43_24_Pro](https://user-images.githubusercontent.com/37889443/124952593-f6548980-e046-11eb-9ae2-701dbdda422f.jpg)
8. Select "Order from Provider Playlist".
![WIN_20210708_23_43_29_Pro](https://user-images.githubusercontent.com/37889443/124952603-f81e4d00-e046-11eb-9a02-7b8d3399c9d5.jpg)
### Importing the EPG
9. Select "Settings".
![WIN_20210708_23_43_54_Pro](https://user-images.githubusercontent.com/37889443/124952608-f9e81080-e046-11eb-9e43-59bf95e27d6b.jpg)
10. Select "Providers".
![WIN_20210708_23_44_49_Pro](https://user-images.githubusercontent.com/37889443/124952635-feacc480-e046-11eb-97f7-3c5f99fdeb2d.jpg)
11. Select "unifiplaytv.samsam123.tk" or "my-iptv.herokuapp.com".
![WIN_20210708_23_44_52_Pro](https://user-images.githubusercontent.com/37889443/124952647-010f1e80-e047-11eb-8638-5861eac19279.jpg)
12. Select "Provider Properties". 
![WIN_20210708_23_45_00_Pro](https://user-images.githubusercontent.com/37889443/124952656-02404b80-e047-11eb-9d86-2204565ff33a.jpg)
13. Scroll down then select "EPG Source 1".
![WIN_20210708_23_45_52_Pro](https://user-images.githubusercontent.com/37889443/124952665-03717880-e047-11eb-97fe-eaf6ffe25857.jpg)
14. Type "https://weareblahs.github.io/epg/unifitv.xml" , then select "Apply".
![WIN_20210708_23_46_19_Pro](https://user-images.githubusercontent.com/37889443/124952677-053b3c00-e047-11eb-8ac5-198599196d88.jpg)
15. Go back, then select "EPG Teleguide".
![WIN_20210708_23_46_57_Pro](https://user-images.githubusercontent.com/37889443/124952684-066c6900-e047-11eb-9a19-ec8e93ac497a.jpg)
16. Select "Reload EPG Teleguide".
![WIN_20210708_23_47_02_Pro](https://user-images.githubusercontent.com/37889443/124952698-08cec300-e047-11eb-8e75-b55f2ecdf227.jpg)
17. Select "Close".
![WIN_20210708_23_47_09_Pro](https://user-images.githubusercontent.com/37889443/124952709-0a988680-e047-11eb-935a-77045a9a8088.jpg)
18. You're ready to watch!
![WIN_20210708_23_58_01_Pro](https://user-images.githubusercontent.com/37889443/124954134-5d267280-e048-11eb-98ad-68113409556b.jpg)
## Importing it into TVirl
**NOTE: TVirl can only be used on Android TV devices certified by Google, such as Smart TVs, Xiaomi Mi Box, Xiaomi Mi TV Stick, TiVo Stream 4K, Chromecast with Google TV, unifi Plus Box**
1. Once you've installed TVirl, you will see this screen:
![WIN_20210709_00_01_40_Pro](https://user-images.githubusercontent.com/37889443/124955210-78de4880-e049-11eb-9464-377fa261c293.jpg)
2. Select "Channels".
If this is your first time using Live Channels, press the "right" button for several times, then press "Get Started".
3. Select "TVirl".
![WIN_20210709_00_02_08_Pro](https://user-images.githubusercontent.com/37889443/124955224-7aa80c00-e049-11eb-87b8-6dbb4acfac42.jpg)
4. Select "Playlist URL".
![WIN_20210709_00_02_11_Pro](https://user-images.githubusercontent.com/37889443/124955234-7bd93900-e049-11eb-9ed6-3a81cb240139.jpg)
5. Type / paste your URL, then select "Continue".
![WIN_20210709_00_02_35_Pro](https://user-images.githubusercontent.com/37889443/124955239-7c71cf80-e049-11eb-9da6-ec13dbffe69d.jpg)
6. Select "Finish".
![WIN_20210709_00_02_44_Pro](https://user-images.githubusercontent.com/37889443/124955246-7e3b9300-e049-11eb-8928-5dd1d6cb0bc1.jpg)
7. Let TVirl process the playlist and EPG.
![WIN_20210709_00_03_01_Pro](https://user-images.githubusercontent.com/37889443/124955249-7f6cc000-e049-11eb-843b-a31b4986ec90.jpg)
8. Select "TV!"
![WIN_20210709_00_03_55_Pro](https://user-images.githubusercontent.com/37889443/124955253-809ded00-e049-11eb-9ac4-735e974259e4.jpg)
9. If this is your first time using Live Channels, press the "enter" button on your remote, then press "Up" to go to unifi TV (skipping Google Play Movies & TV Preview).
![WIN_20210709_00_04_06_Pro](https://user-images.githubusercontent.com/37889443/124955259-81368380-e049-11eb-977e-68d883ba84a8.jpg)
10. You're ready to watch!
![WIN_20210709_00_04_19_Pro](https://user-images.githubusercontent.com/37889443/124955263-81cf1a00-e049-11eb-8959-625282cb7d14.jpg)
### Additional steps: disabling Google Play Movies & TV Preview on Live Channels
1. Press "Enter", then press "Down", then select "Settings".
![WIN_20210709_00_06_35_Pro](https://user-images.githubusercontent.com/37889443/124956162-4d0f9280-e04a-11eb-8665-5475ef9bf530.jpg)
2. "Select "Customize Channels".
![WIN_20210709_00_06_37_Pro](https://user-images.githubusercontent.com/37889443/124956176-4f71ec80-e04a-11eb-9bad-2f61206fe718.jpg)
3. Untick the "Play Movies & TV" checkmark, then press "back" until you return to Live TV.
![WIN_20210709_00_06_43_Pro](https://user-images.githubusercontent.com/37889443/124956184-513bb000-e04a-11eb-96c7-a37c5199ed6f.jpg)

