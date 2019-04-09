After installing Anchorman you'll see a new menu-item in Tools called Syndication.

## Adding a new feed
Click the 'Add a feed' button. Add the necessary info and click save.

There is some additional info saved with the new feed. The feed title, copyright, language and permalink are also saved. Some settings are set to as a standard value:

* Feed updates are enabled.
* Scheduling is set to 60 minutes.
* New articles are set to publish and use the 'Blog' collection.
* The article title, description, content and authors are saved as defaults.

These settings are the most basic info a feed update needs. But you really should tweak the feed settings more.

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
Anchorman fires the `Anchorman:beforecreate` event right before creating an entry, and gives you the entry data, the collection and the option to cancel creating the entry. This is an example of the array:

```
{
    "collection": "newsdesk",
    "entry": {
        "title": "Anchorman Ron Burgundy writes 'tell all autobiography",
        "item_pubdate": "14 August 2013, 2:06 pm",
        "sub_title": "<p>Anchorman star Ron Burgundy, the alter-ego of comedian Will Ferrell, is to release an "autobiography" in November.<\/p>",
        "content": "<p>Let Me Off At The Top: My Classy Life and Other Musings promises to "tell all" about his rise to the top. A statement issued on behalf Ron Burgundy said he was "too close to the work" to tell if it is "the greatest autobiography ever written". "I will tell you this much: The first time I sat down and read this thing... I cried like a goddamn baby," he added. And you can take that to the bank.<\/p>",
        "author": "721ca039-4244-47e8-b738-2a343da580a5",
        "intro_image": 'ron_burgundy.jpg'
    },
    "create": true
}
```

Instead of filters in the control panel you can use this to change the collection, content or disable creating the entry by setting `create: false`;
