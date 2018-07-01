# Munch
## A lightweight, easy-to-use, open source template engine + PHP based framework to expedite site creation.

With munch, you get to create your own template system using PHP as the preprocessor, as PHP was intended to be used.   
Natively supports HTML/CSS/JS

See a live example at http://munch.chuckokere.com which is a munched version of of https://socialites.app

## How To Use:
### Edit `config.php`
Just open `config.php` and make sure to set what you'd like to use as your prefix and suffix for introducting your code    
Set your database settings here as well if you're doing any database work. Natively supports MySQL

### Edit `views/base.bite`
This file is the file is the base of your code. It carries over any of your CSS, js, includes, meta tags, etc. Make sure to update this with your information 

## How It Works: 
`index.php` is just a routing tool that loads the proper `.bite`. If there is no specified `.bite`, it defaults to look for `home.bite`.    

I've updated the source code to have an .htaccess that will handle routing through api.php   
Its the preliminary to a proper api.    
Routing now works like this: http://munch.chuckokere.com/thanks. This would navigate the user to the thank-you page at `views/thanks.bite`   
~~Routing works like this: http://munch.chuckokere.com/?route=thanks. This would navigate the user to the thank-you page at `views/thanks.bite`~~    

If you are just trying to load partials, place them in `views/partials/` Then make sure to call them in the respective `.bite` file using your delimiters (by default, its like this: `{{loadPartial partialName}}` ex: `{{loadPartial footer}}`). See `views/home.bite` for an example of how I generate a footer across pages.   
This way if you need to update the footer, you only need to do it in the single file `views/partials/footer.bite` and it carries over everywhere.   
If you want to create your own functions that will generate some bite code, you can create the function in `controllers/maincontroller.php` or you can create your own standalone controller.    
If you do create your own standalone controller, make sure to reference it in render.php using an `include`

## Folder Structure:   
```
assets/                 # Assets of the site, images go here   
├──favicons/            # Favicons on the tab   
│   ├──favicon.ico   
├──fonts/               # All fonts to load for the site   
│   ├──font.ttf   
├──someimage.png
├──anotherimage.png   
└──lastimage.png   


controllers/            # All controllers go here   
├──maincontroller.php   # Main controller   
└──render.php           # Renderer thats used by index.php   
   
views/                  # Directory for all your .bite route files   
├──partials/            # Directory for all your partial .bite files   
│   ├──footer.bite           
├──home.bite            # Default home .bite for fallback
└──base.bite            # Base file that carries CSS, js, includes, meta tags, etc   

actions/                # This is where you put your action files, and reference them in .bite with action="...php"    

config.php              # Config file for your delimiters and db info     
index.php               # Renderer    
styles.css              # Your CSS goes here    
```      
## More demos and examples coming soon
