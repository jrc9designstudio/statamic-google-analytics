# Google Analytics for Statamic 2    
Requirement: Statamic v2.x  
Version: 0.0.2  

### Version note
- 0.0.2 Dev: this addon is still in development and is not yet complete.

### What is this?
Add Google Analytics support to Statamic 2 and configure tracking from the Control Panel

### Installation
- Rename the folder `Ga` and copy it to your `site/addons` folder

### Usage
- Use the settings to configure your tracking id and other GA settings or create a settings file in `site/settings/addons/ga.yaml`
```
tracking_id: UA-*******-*
async: false
track_uid: false
beacon: false
display_features: false
link_id: false
```
- Manually add the tag to your theme layout file

```
  {{ ga }}
```
