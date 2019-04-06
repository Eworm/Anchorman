After installing Anchorman you'll see a new menu-item in Tools called Syndication.

## Adding a new feed
Click the 'Create feed' button. You'll go to a new page which asks for 2 things: the feed url, and which collection new articles should be added to. Clicking save will create a new feed.

There is some additional info saved with the new feed. The feed title, copyright, language and permalink are also saved. Some settings are set to their standard:

* Feed updates are enabled.
* Scheduling is set to 60 minutes.
* New articles are set to publish and use the 'Blog' collection.
* The article title, description, content and authors are saved as defaults.

These settings are the most basic info a feed update needs. But you'll probably want to tweak the feed info more.

## About the from field/custom/disabled fieldtype
You'll see a lot of fieldtypes with a select input next to a text/suggest fieldtype. You can use these fieldtypes to map content from the feed items to your statamic entries. Since there's no way to check the feed for available content you'll just have to check the feed yourself to see which info you can work with.

## Edit feed settings
Clicking on a feed will go to the edit page. The settings are split up into different tabs to make it easier to manage the different settings.

### Settings
An overview of the general feed settings. You can also add custom queries here. These will be added to the feed url.

### Content
Choose what to do with the article title, description, content and permalink.

### Authors
What to with item authors? Anchorman can create a user for each new author, or assign all items to an existing user.

### Taxonomies
Feed items can contain categories, which can be mapped to Statamic terms. You can choose where to save the categories. You can also select a taxonomy and add custom terms to add to every new entry from this feed.

### Images
Choose what to do with item thumbnails. Enable 'Save thumbnails' to save the thumbnails to the chosen asset container. Anchorman uses cUrl to grab and save images.

## Updates
Anchorman uses the `php please anchorman:refresh` task to check feeds for new articles. You'll have to add the cron to your server if you want to automate this task. [More info on how to is here](https://docs.statamic.com/addons/classes/tasks).

You can also call the task manually from the command line (or press the 'Refresh all' button in the cp). Anchorman will only add new articles and will skip existing ones (same for terms, users and images). The pubdate of an item is used as the date to generate the filename.

## Events
Anchorman emits the `anchorman:init` event when updating a feed. The `raw_data` contains the rss data. This will return false when there aren't any new items in the feed.
