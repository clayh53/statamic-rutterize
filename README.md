## Statamic add-on modifiers : rutterize

### Description

This modifier takes the content piped to it, and inserts some typographic tags in the content so that type nerds can style abbreviations, create non-breaking spaces between numbers and subsequent words and creates some basic span elements for kerning. All this stuff is lifted directly from the classic Richard Rutter website [The Elements of Typographic Style Applied to the Web](http://webtypography.net). 

The modifier is used as a pipe that modifies the content handed to it. 

### Installation

Drop the folder *rutterize* in the add-ons folder in your Statamic project. Inside this folder is the modifier mod.toc.php file. 


### Usage

Typical use inside a template might look like this:

```
<article>
	<h1>{{title}}</h1>
	{{content|rutterize}}
</article>
```	

### Basic example with some styling

This plugin inserts three types of html tags into the content that can then be styled. 

#### Abbreviations

The first thing the modifier does is scan for abbreviations such as *CIA* or *FBI* and wraps them in an ```<abbr> </abbr>``` tag. Target this with some special styles in the CSS. For example this changes the font-variant to small caps, reduces the size slightly and scrunches the letters closer together:

```
abbr {
	font-variant: small-caps;
	font-size: 0.95rem;
	letter-spacing: -0.05rem;
}
```

#### Non-breaking spaces in number-word sequences

The next action the add-on performs is a scan for sequences like *1 December* and *9 balloons* and it inserts a non-breaking ```&nbsp;``` entity between the number and the following letters so lines won't end with a lonely number.

It prevents this:

```
I am very happy to have on one occasion received 9
ballons.
```

and instead will produce this:

```
I am very happy to have on one occasion received 
9 ballons.
```

#### Adds some kerning pairs for capital/lowercase letter sequences

The final action the add-on performs is a scan for some typical sequences of capital and lowercase letters that could stand a little love with some kerning (letterspacing adjustments). The plugin wraps these sequences in a span of class 'kern' that can then be styled in the CSS. The two letter sequences that are targeted in this add-on are the combinations of a capital 'T' and lowercase 'o', and an uppercase 'W' with a lowercase 'a'. Feel free to add more pairs to the plugin body if your copy and font choice indicate that they are needed.

The CSS for these pairs is then targeted with something like this:

```
.kern {letter-spacing: -0.07em }
```

### Caveats and Do you need this?

Note that Statamic modifiers should have **NO** spaces between before or after the pipe ```'|'```!

Why use this plugin? If you are are a serious typography nerd and care about making your site look its absolute best, this modifier could prove useful. 

On the other hand, it may seem a little precious to even care. I am guessing that 90% of your website's users will not even notice that you give a shit. Your call.










