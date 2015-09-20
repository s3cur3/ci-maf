<style>
body {
        padding: 0 5%;
    }
</style>

Documentation: The Modern Brewery Theme
=============================================

- **Theme creator**: [Tyler Young][] of [BrewSites][]
- **Email**: <tyler@conversioninsights.net>

Thanks for using my theme. If you have any questions that are beyond the scope of this help file, feel free to email me at <tyler@conversioninsights.net>.

If you need support, customization, or help with your brewery's Web marketing, [email me](mailto:tyler@conversioninsights.net) and I'll do my best to help.

### Table of Contents
- [Getting Started](#gettingstarted)
    + [Installing and activating the theme](#installingandactivatingthetheme)
    + [Installing recommended plugins](#installingrecommendedplugins)
    + [Importing sample content](#importingsamplecontent)
    + [Setting up Google Analytics](#settingupgoogleanalytics)
- [Creating the Home Page (A Tour of the Theme)](#creatingthehomepageatourofthetheme)
- [Image Sliders](#imagesliders)
- [Staff Profiles](#staffprofiles)
<!-- - [Notes on the Full-Width Layout](#notesonthefull-widthlayout) -->
- [Configuring the Menus and Navigation](#configuringthemenusandnavigation)
- [Setting Up the Sidebar](#settingupthesidebar)
- [Setting Up the Footer](#settingupthefooter)
- [Setting Up the Blog](#settinguptheblog)
- [Setting Up an Ecommerce Site](#settingupanecommercesite)
- [Creating the Contact Page](#creatingthecontactpage)
- [Creating Landing Pages for Ad Campaigns](#creatinglandingpagesforadcampaigns)
- [Creating a Privacy Policy](#creatingaprivacypolicy)
- [Customizing the Theme](#customizingthetheme)
    + [Using the WordPress admin menu](#usingthewordpressadminmenu)
    + [Using HTML & CSS](#usinghtmlcss)
    + [Using Javascript](#usingjavascript)
- [Getting Help and Support](#gettinghelpandsupport)
- [Updates to the Theme](#updatestothetheme)

Getting Started
------------------------------------------------------

### Installing and activating the theme
To install the theme, do the following:

1. Log in to the WordPress admin menu, typically found at `yoursitehere.com/wp-admin/`
2. Click **Appearance** in the left-hand menu. This will load the theme selection page.
3. Near the top of the page, just to the right of the word "Themes", click the **Add new** button.
4. In the search box, type the name of this theme.
5. Click the **Install Now** link below the theme you want to install.
6. When the installation finishes, click the **Activate** link that appears.
7. Immediately upon activating, WordPress will prompt you to make a number of changes (create a static front page, change permalink structure, and so on). **If you are creating a *new* site**, it is recommended that you say "yes" to each of these, then press the **Save Changes** button. If you are changing the theme of an existing site, you may not want to do this.
8. Finally, after activating the theme, there will be a number of "recommended plugins" displayed at the top of the administration pages. See the following section for help installing those plugins.

### Installing recommended plugins
After activating the theme, you'll receive a message at the top of each Admin page informing you of a number of recommended and required plugins.

![Recommended & required plugin notification](img/install-plugins.png)

Note that the theme *may not function correctly* without the required plugins.

Click the **Begin installing plugins** link to install these plugins. After installing the plugins, the installer will offer to **Return to Required Plugins Installer**. There, you can also activate all the plugins.

(Note that both steps---installing *and* activating---are necessary.)

### Importing sample content
**NOTE**: Before importing the sample content, it is important that you [install the recommended & required plugins](#installingrecommendedplugins). Failing to do so will cause some content *not* to be imported, making it more difficult for you to recreate the theme's demo.

With the plugins installed and activated, you can import the sample content by doing the following:

1. Log in to the WordPress admin menu, typically found at `yoursitehere.com/wp-admin/`
2. Hover your mouse over **Tools** in the left-hand menu, then click **Import**. Select the WordPress option.
3. You will be prompted to install the Wordpress Importer; simply click the **Install Now** button.
4. After the installation completes, click the **Activate Plugin & Run Importer** link.
5. Upload the "sample-content.xml" file included with this theme (found in the `docs` directory).
6. After the import is complete, visit the Pages section of the Admin menu to see the sample pages.

### Setting up Google Analytics
To set up Google Analytics tracking on all pages of the site, do the following:

1. Log in to the WordPress admin menu, typically found at `yoursitehere.com/wp-admin/`
2. Click Site Options in the left-hand sidebar.
3. Click the Basic tab near the top of the page.
4. In the text box labeled Google Analytics ID, type the ID that Analytics associates with this site. It will be in the format `UA-XXXXX-Y`.
    - For help finding your Google Analytics ID, see [Google's documentation on the topic](https://support.google.com/analytics/answer/1032385?hl=en)

Note that *only* accounts using "Universal Analytics" are supported. (Don't worry, though---it's easy to [upgrade a "Classic Analytics" account to the new Universal version](https://support.google.com/analytics/answer/3450662?hl=en).)


Creating the Home Page (A Tour of the Theme)
------------------------------------------------------

The home page in the demo consists of a number of different elements. Understanding how these elements are created will allow you to design your own home page (and, with little exception, the rest of your site as well).

![](img/home-0-annotated.jpg)
![](img/home-1-annotated.jpg)
![Elements of the home page](img/home-2-annotated.jpg)

1. Company name/logo
    - By default, this is a plain-text version of your site title (defined on your Settings > General page in the WordPress administration back-end).
    - Alternatively, you can use your own logo (an image file). Upload the image using the Theme Customizer (found by clicking Appearance > Customizer in the administration back-end). Note that the recommended image size is 360&times;50px.
2. Navigation menu
    - Like most themes, we use the WordPress menu system for navigation menus.
    - You can set up your menus using the Appearance > Menus page.
    - By default, the theme creates a Primary Navigation menu and assigns it to the Primary Navigation theme location (that is, the location at the top-right of the page).
3. Home page content 
    - The home page uses the "Fancy Landing Page" layout (which removes the white background from the page content to show off your full-screen image background). You can enable this by checking the box labeled **Make this a fancy landing page?** in the **Page-Specific Options** box when editing your page.
    - The solid-colored background on the text here comes from the `[bg]` shortcode. (Read more in [the shortcode reference](#shortcodereference).)
4. Beer list
    - You can create Beer pages individually just like you would a normal page on the site, and those beers can be inserted onto a specific page. The beer list here is spit out by our `[beers]` shortcode, as described in [the shortcode reference](#shortcodereference) below.
5. Text block
    - The `[container]` shortcode provides the white background to this block of text. (Read more in [the shortcode reference](#shortcodereference) below.)
6. Embedded Google Map
    - The demo site uses the [Widgets on Pages](https://wordpress.org/plugins/widgets-on-pages/) plugin to display the [Google Maps Widget](https://wordpress.org/plugins/google-maps-widget/) on the page.
7. Call-to-Action Button
    - When editing an individual page, you can press the button ![](img/btns/cta.png) ("Insert a call-to-a button") to insert a big call-to-action button.
8. Footer widgets
    - By default, the footer is divided into 4 columns. Content is added to the footer using the Appearance > Widgets page; simply drag and drop widgets from the left side of the screen to the **Footer** box on the right. Each widget you add will be treated as its own column.
    - In the Site Options page (found in the WordPress administration back-end), under the **Basics** tab, you can change the number of columns that the footer is divided into. Thus, if you only have 3 widgets (blocks of content), you can tell the theme to divide the footer into 3 instead of 4.
9. Bottom of page
    - The very bottom of the page has 2 blocks of content: an optional plain text box, and copyright information. You can use the **Footer** tab on the Site Options page to set your own text here. This is a good place to link to things like your privacy policy or terms of service.

Image Sliders
-------------------

This theme supports image sliders in two places: 

- at the top of the page (as seen on the [Sample Image Slider Page](http://cisandbox.mystagingwebsite.com/sample-image-slider-page/)), and
- within the page (seen on the [In-Page Image Slider Page](http://cisandbox.mystagingwebsite.com/in-page-image-slider/)).

There are 2 steps to setting up an image slider:

1. Creating the slides themselves, and
2. Telling a particular page to show a particular set of slides.

To do 1), go to the Slides page of the WordPress administration back-end. There, you can add, delete, or modify slides. The title of the slide, along with the content of the slide's "page" will be displayed in the image slider on top of the slide's Featured Image. Thus, the Featured Image is the slide background, while the title and content are the slide content.

Note that the recommended size for slide images depends on whether you're using the slides at the very top of the page or within it. (Slides at the very top of the page can be stretched much wider than the typical page.)

- For slides used at the top of the page, the recommended size is 1920&times;657px.
- For slides used within a page, the recommended dimensions are 1170&times;400px.

(In reality, the height of the images can be whatever you want, so long as it is consistent---you don't want to mix image sizes within the same slider.)

After slides are created, you must tell a particular page to use them. In this case, applying a Category to the slides you want to use can be very helpful---you'll be able to tell WordPress to use *only* the slides of that particular Category in your slider.

There are 2 ways to add a slider to a page:

1. Insert it within the page content, or
2. Insert it at the top of the page, above the rest of the content.

You can use the Insert Image Slider button (<img src="img/btns/photo.png" />) located above the page's content editor to add a slider anywhere on the page. You will be asked for the Category of the slides to use; leave this blank to show all slides, or type a category's *slug* to show only slides in that Category. (Note that the "slug" is like the URL: if you have a Category called "My Beer Photos", the slug will typically be "my-beer-photos".)

Alternatively, you can add the image slider at the top of the page, below the navigation bar and above the page content. To do so, do the following:

1. Edit the page as usual in the WordPress Admin interface.
2. Scroll down to the very bottom of the editing page, to the box labeled "Page-Specific Options."
3. Check the box labeled "Show giant image slider at top of page."
4. If you would like, you can type a Category's slug in the text box just below that. Or, leave the box empty to show all slides.
5. Update or publish the page as usual.


Staff Profiles
-------------------

Staff profiles in the theme are very similar to image sliders (see [the previous section](#imagesliders)). That is, you create the individual staff member's profiles (using the Staff section of the WordPress administration back-end), then insert those staff profiles onto a particular page [using a shortcode](#shortcodereference)---in this case, something like:

    [staff columns=4 number=4 length=0]

When inserting these profiles, you'll be able to choose how many columns to display them in (one staff member per column), and how much of their profile to display---that is, the maximum number of characters to show from their profile.

There is one more place you can display the staff profiles, though. You can use the "All Staff" template on a particular page. This is useful if you would like a page listing all staff members, with links to the individual staff members' pages. Thus, in the demo site, we have created an "[Our Staff](http://cisandbox.mystagingwebsite.com/our-staff/)" page that uses this template to list all the company's employees. (Note that this page is available *automatically* at `yoursitehere.com/staff/`. Using the "All Staff" template simply gives you a bit more control over the page: you can add some content above the staff profiles, for instance.)



<!--
Notes on the Full-Width Layout
------------------------------------------------------

This theme supports both a standard Web page layout and a full-width layout.

![A full-width layout (left) alongside the page layout (right) for the same content.](img/full-width-vs-paged.jpg)

When using the standard page layout (a.k.a. the "boxed" layout), you have the opportunity to use a background pattern or image. (For an example of what that looks like, [see the demo site](http://cisandbox.wpengine.com/home-page-3/?layout=normal&bg=image).)

With the full-width view, however, some content (like image sliders and colored bands) will stretch to the very edges of the screen. Text content, however, will *not* stretch to the edges of the screen. (To do so would be undesirable---when text columns become too wide, they become very difficult to read.)

For the most part, the two layouts are interchangeable---you could switch between them without issue. In fact, when using a sidebar on a particular page, the full-width layout will look just like the "boxed" layout (it will just have a white background instead of a pattern/image/etc.)

With that said, you may experience some weirdness when using full-width text content on pages without a sidebar. (Lists, blockquotes, and the like may be slightly off in their formatting.)

To correct this, simply put your full-width text content into a custom, single-column layout, by doing the following:

1. Open the WordPress editor for the full-width (no-sidebar) page in question.
2. Click the "Make columns" button <img src="img/btns/threecolumns.png" /> in the bank of editor buttons.
3. Tell it to create a 1 column layout (type the number 1 and press enter).
4. Replace the content that appears with your own.
-->

Configuring the Menus and Navigation
------------------------------------------------------

As discussed previously, this theme uses [the WordPress menu system](http://codex.wordpress.org/Appearance_Menus_SubPanel) for its navigation menus.

To edit the navigation menu, open the Appearance > Menus page in the WordPress administration back-end.

The navigation menu in the top right of the page is taken from the "Primary Navigation" theme location. Thus, to use a menu you have created in that position, you would simply:

1. Visit the Appearance > Menus page and edit the menu you wish to use.
2. Scroll down page to the section labeled "Menu Settings."
3. Check the box labeled "Primary Navigation" next to the "Theme Locations" label.

By default, when you activate the theme, it will create a Primary Navigation menu and assign it to the Primary Navigation theme location (that is, the location at the top-right of the page).


Setting Up the Sidebar
------------------------------------------------------

The sidebar in the theme demo is made up of 4 components, each configured as "[Widgets](http://codex.wordpress.org/Appearance_Widgets_SubPanel)" on the Appearance > Widgets page. To add any of these widgets to the sidebar, simply drag them from the left side of the Widgets screen into the box labeled "Primary" (the primary sidebar).

![The sidebar in the theme demo](img/shop-annotated.jpg)

1. Site search
    - This is the standard WordPress search widget.
2. Social media icons
    - These come courtesy of this theme's "Social Media Icons" widget. To use these icons, do the following:
        1. Drag the Social Media Icons widget to your sidebar.
        2. Visit the Site Options page in the WordPress administration back-end. There, click the Social Media Links tab.
        3. Add the URLs of your company's social media profiles there. (To hide an icon, simply leave the URL field blank.)
        4. Near the bottom of the menu, you can choose to either display the icons in full color or monochrome. (Note that when you hover over the monochrome icons, they gain their full color.) You can compare the two below:<br />
            ![The full-color social media icons vs. their monochrome counterparts](img/social-media.png)
3. Most recent beers list
    - These come from the theme's "Beers List" widget. To use it, simply drag the Beers List widget to your sidebar.
4. Plain Text
    - This is the standard WordPress text widget. We're using it to link to an attribution page for the various Creative Commons-licensed images we use across the site.


[sidebar]: #settingupthesidebar "Setting Up the Sidebar"

Setting Up the Footer
------------------------------------------------------
The footer, much like [the sidebar, described above][sidebar], is made up of a number of widgets. You can add or remove widgets from the footer using the Appearance > Widgets page. Simply drag and drop widgets from the left side of the screen to the **Footer** box on the right. 

By default, the footer is divided into 4 columns. Each widget you add will be treated as its own column. However, if you are using more or fewer widgets, you can change the number of column divisions.

To do so, 

1. Open the Site Options page in the WordPress administration back-end, and click the **Basics** tab.
2. There, under the **Footer Options** heading, you can change the number of columns that the footer is divided into. Thus, if you only have 3 widgets (blocks of content), you would use 3 columns instead of 4.

The footer is made up of the following elements:

![Content in the page footer](img/footer-annotated.jpg)

1. Contact information
    - This is the "Contact Information (vCard)" widget provided by this theme. You can use it to enter your address, hours, phone number, and email.
2. Google Maps
    - This is the Google Maps Widget provided by the recommended plugin, [Google Maps Widget](http://wordpress.org/plugins/google-maps-widget/).
3. Email signup
    - The newsletter signup widget comes courtesy of the recommended plugin, [Newsletter Sign-Up](http://wordpress.org/plugins/newsletter-sign-up/). This plugin works with email sending services like MailChimp, Constant Contact, AWeber, and so on.
4. Copyright and credits
    - This is standard text for the theme: a copyright for your company, and a link attributing the theme design to Conversion Insights. You can configure both of these in the Footer tab of the Site Options page.
5. (Not pictured:) Footer text
    - You can use the **Footer** tab on the Site Options page to add your own text just above the copyright & credits line). (You can use this for things like a link to your Privacy Policy or Terms of Service.)
    - If you leave the Site Options' Footer Text field blank, this will be hidden, as it is on the demo site.




Setting Up the Blog
------------------------------------------------------

To create a [blog page](http://cisandbox.mystagingwebsite.com/our-blog/) (a page listing all your blog posts), do the following:

1. Create a new Page using the Admin's Page editor.
2. In the "Page Attributes" box in the right-hand sidebar, find the Template field.
3. Select the Blog template.
4. Type any text you want to appear above the blog posts listings in the normal WordPress editor. Your most recent blog posts will appear beneath that.
5. By default, 10 blog posts will be displayed per page. (Users can click the "Previous posts" link near the bottom of the page to see more.) To change the number of posts per page:
    1. Visit the Settings > Reading page in the WordPress administration back-end.
    2. Change the "Blog pages show at most" field.
    3. Click **Save Changes*** in the lower left.

Creating the Contact Page
------------------------------------------------------

The [contact page](http://cisandbox.mystagingwebsite.com/contact-us/) in the demo theme uses the standard page template, but it relies on the recommended plugin "[Contact Form 7](http://wordpress.org/plugins/contact-form-7/)" (or some other contact form plugin) to work. The Contact Form 7 plugin simply provides a shortcode for displaying a previously created contact form on the page.


<!--
Creating Landing Pages for Ad Campaigns
------------------------------------------------------

A landing page is a stripped-down version of your normal Web site designed for one goal: to get a visitor to fill out your contact form. They typically have much less visual clutter, and fewer options for visitors. Whereas your home page may have 20 or 30 links to various things a visitor could check out, your landing page should have maybe 2.

Landing pages are a great way to make the most of traffic you get from online advertisements. Since you have a good idea of *exactly* why the visitor is coming to you, you can tailor the landing page to that goal. (For more help with your online marketing campaigns, you can sign up for my [free course on getting more clients from your Web site](http://conversioninsights.net/get-clients-for-law-firm/?utm_source=themeDocumentation&utm_medium=web&utm_campaign=moreClients).)

(HubSpot has [a nice guide to the basics of landing pages](http://blog.hubspot.com/marketing/what-is-a-landing-page-ht).)

To create a landing page with this theme, do the following:

1. Create a new Page using the Admin's Page editor.
2. In the "Page Attributes" box in the right-hand sidebar, find the Template field.
3. Select the "Landing page" template.
4. Type your page content in the WordPress editor as usual.
-->


Setting Up an Ecommerce Site
-----------------------------------------
**Please note**: Configuring ecommerce support for your site quite a bit more complicated than simply installing the plugin. Any time you collect credit cards on your site, you are subject to  PCI Compliance standards (government-mandated standards for ensuring personal information is processed in a secure way). Unfortunately, this is *not* something that can be automatically configured by the theme. For this reason, we recommend that *only* professional Web developers configure ecommerce support. (You can always set up the theme yourself, then pay a professional a relatively small amount to set up ecommerce support.)

Ecommerce support in the theme comes from the recommended "[WooCommerce](https://wordpress.org/plugins/woocommerce/)" plugin.

After installing the WooCommerce plugin, check the box labeled "Enable ecommerce support" in the Site Options page's Basic tab. This will add shopping cart support to the site.

Installing WooCommerce will give you two new sections in the WordPress administration back-end:

- WooCommerce (where you configure payments, shipping settings, etc.), and
- Products.

The Products section gives you a way to add new products for sale. This is a WordPress "Custom Post Type," similar to the Beers, Staff, or Slides post types bundled with the theme.

![An individual product page](img/product-annotated.jpg)

A product page is composed of:

1. The product title
2. A Featured Image of the product
3. (Optional:) Product Gallery images (configured right beneath the Featured Image when editing the Product's page)
4. A short description of the product (set using the "Product Description" box when editing the Product's page)
5. The full content of the product page

For information on configuring WooCommerce, see [the WooCommerce "Getting Started guide](http://docs.woothemes.com/documentation/plugins/woocommerce/getting-started/). (Note that we can't provide support for WooCommerce-specific issue like configuring your payment providers, setting up shipping, etc. However, support is available from WooThemes, the makers of WooCommerce.)


Creating a Privacy Policy
------------------------------------------------------

The theme includes a boilerplate privacy policy, to the effect that your site uses analytics and may use advertising technologies present in Google AdSense. This is included largely to satisfy Google, who *claims* to require this policy to be posted on your site if you're using Google Analytics or Google AdSense. (The reality, of course, is that [no one actually does this](http://searchengineland.com/how-many-google-privacy-policies-are-you-violating-50182), but hey---we made it easy to add the Google-approved verbiage to your site.)

To insert this boilerplate, simply create a new, blank page, and insert the following shortcode:

`[privacy /]`

...That's it!


Shortcode Reference
---------------------------------

This theme uses a handful of [shortcodes](http://codex.wordpress.org/Shortcode) for special functionality. These are as follows:

- `[bg]`---puts a solid-colored background on your text. This is primarily of use on the "[Fancy Landing Page](#creatingthehomepageatourofthetheme)."
    - Control the margin above or below this block using the properties `mt=`[top margin, in pixels] and  `mb=`[bottom margin, in pixels], respectively. For instance:
    
            [bg mt=10]This paragraph has a 10-pixel top margin.[/bg]
    - To change the background color to your fancy landing page's "highlight" color (as specified in the WordPress customizer, found in Appearance > Customize), add the `highlight` property, like this:

            [bg mt=10 highlight]This paragraph has the "highlight" background color with a 10-pixel top margin.[/bg]
- `[container]`---displays the block in a white container. This is really only useful for blocks of text on a Fancy Landing Page.
- `[beers]`---display your Beer pages. This can be configured with a number of parameters:
    - `columns=`[number of columns]---display the beers in columns (up to 12 columns). Defaults to 1.
    - `number=`[max number of beers to display]---limit the number of beers shown. Defaults to 100.
    - `length=`[max excerpt length]---limits the length (in characters) of the description shown beneath the beers. A value of 0 means no description will be shown. Defaults to 250.
    - `list`---display as a list of names only, with no description and no images.
    - Example:
    
            [beers columns=3 number=10 length=100]
- `[staff]`---just like `[beers]`, this displays your staff members. This can be configured with a number of parameters:
    - `columns=`[number of columns]---display the staff in columns (up to 12 columns). Defaults to 1.
    - `number=`[max number of staff members to display]---limit the number of staff members shown. Defaults to 100.
    - `length=`[max excerpt length]---limits the length (in characters) of the description shown beneath the staff members. A value of 0 means no description will be shown. Defaults to 250.
    - `list`---display as a list of names only, with no description and no images.
    - Example:
    
            [staff columns=4 number=4 length=0]
- `[slider]`---this inserts an image slider into the page. It takes one parameter: `category=`[some-category-here]. The category defines which images will appear (you might have many categories of Slides set up, allowing you to show many different combinations of images in your sliders). Note that the category you give must be the category *slug*, not the human-readable name. (The "slug" is like a URL: if you have a Category called "My Beer Photos", the slug will typically be "my-beer-photos".)
- `[visibleatsize]`---makes the content contained within this tag only visible at a particular size (or list of sizes). Size options include `lg`, `md`, `sm`, and `xs`. For instance:

        [visibleatsize lg md]

        This block of content will be visible on large and medium-sized screens, but *not* on small (tablet) or extra-small (phone) screens.

        [/visibleatsize]
- `[hiddenatsize]`---the opposite of `[visibleatsize]` above, this makes the content contained within this tag *hidden* at a particular size (or list of sizes). Size options include `lg`, `md`, `sm`, and `xs`. For instance:

        [hiddenatsize xs lg]

        This block of content will be hidden on both extra-small and large screens.

        [/hiddenatsize]
- `[privacy]`---this spits out a boilerplate, Google-satisfying privacy policy, as described in the section [Creating a Privacy Policy](#creatingaprivacypolicy).

Customizing the Theme
------------------------------------------------------

### Using the WordPress Admin menu

By far the simplest way to customize the theme is to use the WordPress Admin interface.

You can use the Appearance > Customize page to change things like your color scheme, your site title, and your navigation. Changing the color scheme will change the color of links, the background "highlight" color, and so on.

For more advanced visual customization, go to the Site Options page in the WordPress administration back-end and click on the "Appearance (advanced)" tab.

### Using HTML & CSS

If you'd like to get your hands dirty, you can edit the theme's HTML and CSS.

**IMPORTANT NOTE**: Simply editing the theme's HTML (PHP) and CSS is not a great idea, because any changes you make will be overwritten when you upgrade the theme to a newer version.

Instead, you should [create a Child Theme](http://codex.wordpress.org/Child_Themes) and modify *that* theme. This is the *only* way to ensure your modifications will remain when the theme is upgraded.

We've included a sample, very basic child theme in the `docs` directory for you to start with. See the `brewery-child-theme` directory you find there for a very detailed guide to using your child theme.

When making modifications, here's what you need to know:

#### PHP & HTML
The theme's PHP is built atop [the Roots theme framework][Roots]. Roots theme are much, much more organized than a typical theme, and there is much less code repetition. While this is great in the long run, it means things don't always appear where you expect. 

For instance, instead of your a typical page template looking like this:

    <?php get_header(); ?>
      <div class="wrap">
        <div class="content">
          <?php // Our page specific markup and loop goes here ?>
        </div>
        <?php get_sidebar(); ?>
      </div>
    <?php get_footer(); ?>

...it now looks like this:

    <?php // Our page specific markup and loop goes here ?>

(All other markup is inherited from `base.php` and the like. More info in [the Roots documentation on the theme wrapper](http://roots.io/an-introduction-to-the-roots-theme-wrapper/).)

Notwithstanding these atypical aspects of the theme, [the Roots documentation](http://roots.io/docs/) should get you up to speed on the changes without much trouble.

#### CSS
The theme's CSS is built on [the Twitter Bootstrap CSS framework][Bootstrap]. That means it has built-in support for fully responsive designs, plus common (and extremely useful) components like [forms](http://getbootstrap.com/css/#forms), [buttons](http://getbootstrap.com/css/#buttons), [dropdowns](http://getbootstrap.com/components/#dropdowns), [navigation tabs](http://getbootstrap.com/components/#nav), and more.

Bootstrap also provides fantastic Javascript functionality, including [modals (dialog boxes)](http://getbootstrap.com/javascript/#modals), [popovers](http://getbootstrap.com/javascript/#popovers), and [accordions](http://getbootstrap.com/javascript/#collapse).

Finally, we use [the FontAwesome icon font](http://fortawesome.github.io/Font-Awesome/) in parts of the site. This makes it easy to use over 350 great-looking (Retina-ready) icons in the theme. For examples of how to use these, see [the Examples documentation](http://fortawesome.github.io/Font-Awesome/examples/), or browse [the complete list of available icons](http://fortawesome.github.io/Font-Awesome/icons/)


### Using Javascript
When writing Javascript for this theme, there are two toolkits available to you: [jQuery][] and [Bootstrap][].

Once again, however:

**Note**: Simply editing the theme's Javascript is not a great idea, because any changes you make will be overwritten when you upgrade the theme to a newer version.

Instead, you should [create a Child Theme](http://codex.wordpress.org/Child_Themes) and modify *that* theme. This is the *only* way to ensure your modifications will remain when the theme is upgraded.


Getting Help and Support
------------------------------------------------------

Contact [Tyler Young][] (<tyler@conversioninsights.net>) of BrewSites for support.

For feature requests and bug fixes, email Tyler at . Once again, as this is a free theme, we can't make any promises, but we're happy to consider any requests.

For custom theme development, Web marketing services, or other consulting, email Tyler at <tyler@conversioninsights.net>.



Updates to the Theme
------------------------------------------------------

Here's what's been added to the theme through updates:

### Version 1.1
#### New features
- **Custom favicon**: added the ability to upload a custom favicon. To upload a favicon (and optionally an Apple Touch Icon), do the following:
    - Go to the Site Options page in the WordPress administration back-end
    - Click the **Appearance (advanced)** tab
    - Scroll to the bottom.
    - Upload a 16&times;16px favicon.ico to the "Favicon for Site" field.
- **Beers custom post type**: Created the Beers post type
- **Staff post type**: Added optional social media links for individual staff members (which appear both on the staff member's page and on the list of all staff members)
- **Image sliders**: Added the ability to use left- or right-aligned text in image sliders, as well as solid-colored backgrounds
- **vCard Widget**
    - Added Brewery Schema.org markup to the vCard widget
    - Turned phone number in vCard widget into a link (so mobile devices can click to call it)
- **Breadcrumbs support**: added support for Yoast SEO's breadcrumbs. To use them, all you have to do is install the Yoast SEO plugin, go to its Internal Links settings, and check the box labeled "Enable breadcrumbs."
- **Archive template**: created template for post archives

#### Bug fixes
- Fixed bug where Screen Options wouldn't actually appear when clicked on in the Admin menu

### Version 1.0
Initial release



[jQuery]: http://jquery.com/ "Documentation for the jQuery Javascript library"

[Bootstrap]: http://getbootstrap.com/ "Documentation for the Bootstrap CSS and Javascript framework"

[Roots]: http://roots.io/docs/ "Documentation for the Roots theme framework"

[BrewSites]: http://brewsites.net/?utm_source=themeDocumentation&utm_medium=web&utm_campaign=documentation "BrewSites: Web design for craft breweries, made easy"


[Tyler Young]: http://brewsites.net/tyler-young/?utm_source=themeDocumentation&utm_medium=web&utm_campaign=documentation "Tyler Young, of BrewSites"