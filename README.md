## Statamic add-on modifiers : last_folder

### Description

This is a very basic modifier used in conjunction with the statamic ```{{_folder}}```  variable that is available inside the ```{{entries:listing}}```tag. ```{{_folder}}``` variable returns the full the path to the folder of the entry being output on that loop iteration. 

This modifier strips all but the last foldername from that path.  

The modifier is used as a pipe that modifies the content handed to it. 

### Installation

Drop the folder *last_folder* in the add-ons folder in your Statamic project. Inside this folder is the modifier mod.last_folder.php file. 


### Usage

Typical use inside a template might look like this:


```
{{entries:listing folder="topfolder/events|topfolder/link-posts|topfolder/posts|topfolder/articles" sort_dir="desc"}}
	
	<a href="{{url}}"><h3>{{title}}</h3></a>
	
	<h4>entry type: {{_folder|last_folder}}</h4>

	<p>{{content|pluck|widont}}</p>

{{/entries:listing}}


So if I had folder organization like this:

/---
    /topfolder--
                /events/
                   - entryA
                /posts/
                   - entryB
                   - entryC
                /link-posts/
                   - entryD
                /articles/
                   - entryE


```

		

The modifier could output an 'events' label for entryA, a 'posts' label for entryB and entryC, and a 'link-posts' label for entryD and so on.


### Use case

In creating my site, I wanted to separate different types of non-page content into types - sort of a roll-your-own equivalent of a *channel* in Expression Engine-speak. 

In master listings and archives that mix up all types of content, I wanted the site user to be able to determine the type of content for each entry, In other words was the listing entry for a regular post, a link post, or an event? 

With some semi-informative folder-naming conventions, this will allow you to grab the name of the folder enclosing the content and display it as an output that can be formatted to your liking.

### Caveats and Do you need this?

Note that Statamic modifiers should have **NO** spaces before or after the pipe ```'|'```!

Why use this plugin? If you have a site that has more than one type of entry (or posts) type content, this modifier could prove useful for grabbing the name of an entries enclosing folder. 










