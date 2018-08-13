Fix trailing / issue   
~~Finish building actionscript~~   
Add classing with proper routing like "Models_Contacts" will route to /models/contacts/   
and api.php to get info from mysql as json array    
munch.php/api/get/    
munch.php/api/post/    
munch.php/api/update/    
munch.php/api/delete/    

ex: munch.php/api/get/contacts/id/1    
returns: 
{"data":    
"contact":{    
	"firstname": "roger",    
	"lastname": "philips",    
...   
},
};
