# Google Analytics for Statamic 2    
Requirement: Statamic v2.x  
Version: 0.0.3  

### Version note
- 0.0.3 Dev: this addon is still in development and is not yet complete. 0.0.3 changes `{{ ga }}` to `{{ google_analytics }}` for consistency and clarity.

### What is this?
Add Google Analytics support to Statamic 2 and configure tracking from the Control Panel

### Installation
- Rename the folder `GoogleAnalytics` and copy it to your `site/addons` folder

### Usage
- Use the settings to configure your tracking id and other GA settings or create a settings file in `site/settings/addons/google_analytics.yaml`
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
  {{ google_analytics }}
```

### Environment Support
- Use Statamic's built in settings for environment overrides to specify different settings for Google Analytics in development or testing.
