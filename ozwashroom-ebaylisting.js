// Original design work, including graphics and all related scripts, Copyright (c) OCDesignsOnline.com, All Rights Reserved. Used with permission by OzWashroom.

jQuery(function($){

	//Define seller settings
	var UserID = "ozwashroom";
	var StoreID = "OzWashroom";
	var ImgURL = "http://ozwashroom.com.au/ebay/";
	var settings = {
		"UserID":UserID,
		"loadingClass": "loading",
		"serviceUrl": "http://ebay.sunandfuninoc.com/ebay.php"
	};
	
	//Store header
	var header = "\n\r<div id=\"x-head-wrap\"><div id=\"x-head\">" +
		"	<!-- head logo -->" +
		"	<a id=\"x-head-logo\" title=\""+StoreID+" eBay Store\" href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"\"><!-- sp --><\/a>" +
		
		"	<!-- head search -->" +
		"	<form id=\"x-head-srch\" method=\"get\" name=\"search\" action=\"http:\/\/stores.ebay.com.au\/"+StoreID+"\">" +
		"		 <input id=\"x-head-srch-bttn\" name=\"submit\" type=\"submit\" value=\"&nbsp\">" +
		"		 <input id=\"x-head-srch-sbox\" onblur=\"if (this.value == '') this.value = 'Search Our Products ...';\" onfocus=\"if (this.value == 'Search Our Products ...') this.value = '';\" value=\"Search Our Products ...\" maxlength=\"300\" name=\"_nkw\"  type=\"text\">" +
		"		 <p class=\"x-ckbx\"><input type=\"checkbox\" value=\"1\" checked=\"checked\"  id=\"descr\" name=\"LH_TitleDesc\"><label for=\"descr\">in titles &amp; descriptions<\/label><\/p>" +
		"	<\/form>" +
		
		"	<!-- head menu links -->" +
		"	<ul id=\"x-head-menu\">" +
		"		<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"\">Home<\/a><\/li>" +
		"		<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"\/About-Us\">About Us<\/a><\/li>" +
		"		<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"\/Special-Offer\">Special Offer<\/a><\/li>" +
		"		<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"\/Our-Clients\">Our Clients<\/a><\/li>" +
		"		<li><a href=\"http:\/\/contact.ebay.com.au\/ws\/eBayISAPI.dll?ContactUserNextGen&recipient="+UserID+"\">Contact Us<\/a><\/li>" +
		"	<\/ul>" +
		
		"<\/div><\/div>";
	if($(".x-bg").length > 0) { $("#x-head-pull").after(header); }
	
	//Store left column
	var left = "\n\r" +
		"	<!-- left categories menu -->" +
		"	<div id=\"x-side-cats\" class=\"x-tbar\"><div class=\"x-tmid\">" +
		"		 <ul class=\"lev1\">" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ235764015\">Hand Dryers<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ235765015\">Soap Dispensers<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ235766015\">Fragrance Dispensers<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ9370023015\">Paper Towel Dispensers<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ486430015\">Liquid Soap<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ5011501015\">Outdoor Ashtray<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ5011504015\">Toilet Roll Dispensers<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ8916450015\">Shower Seats<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ8916458015\">Mirrors<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ1\">Hooks<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ8824794015\">Toilet Braille Signs<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ5011507015\">Paper Towels<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ5011509015\">Rubbish Bin and Bags<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ8695552015\">Sanitary Bins<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ8824793015\">Baby Change Station<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ8692305015\">Jet Hand Dryers<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ8916449015\">Grab Rails<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ8916452015\">JD Macdonald<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ8916455015\">Koala Kare<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ8916456015\">Jumbo Dispensers<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ8916457015\">Gloves<\/a><\/li>" +
		"		 	<li><a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"_W0QQ_fsubZ9075417015\">Urinal Blocks<\/a><\/li>" +
		"		<\/ul>" +
		"	<\/div><div class=\"x-tbtm\"><!-- sp --></div><\/div>" +
		
		"	<!-- left newsletter text box -->" +
		"	<div id=\"x-side-news\" class=\"x-tbar\"><div class=\"x-tmid x-tins\">" +
		"		<p>Add <span>OzWashroom<\/span> to your favorite stores and receive our exclusive emails about new items and special promotions!<\/p>" +
		"		<p class=\"x-ckbx\"><input type=\"checkbox\" checked id=\"general\" name=\"nlchxbox\"><label for=\"general\">General Interest<\/label><\/p>" +
		"		<a target=\"_blank\" href=\"http:\/\/my.ebay.com.au\/ws\/eBayISAPI.dll?AcceptSavedSeller&amp;linkname=includenewsletter&amp;sellerid="+UserID+"\" id=\"x-side-news-bttn\" title=\"Sign Up\"><!-- sign up --><\/a>" +
		"	<\/div><\/div>" +
		
		"	<!-- left promo graphics -->" +
		"	<img src=\""+ImgURL+"images\/x-side-prom-ppal.png\" class=\"x-prom\" alt=\"We accept PayPal\">" +
		
		
		"";
	if($(".x-content").length > 0) { $("#x-left-pull").after(left); }
	
	//Store categories population
	if($("#x-side-cats").length > 0) { if($("#LeftPanel .lcat").length > 0) { $("#x-side-cats .x-tmid").html($("#LeftPanel .lcat").html()); } }
	
	//Footer
	var footer = "\n\r<div id=\"x-foot-wrap\"><div id=\"x-foot\">" +
		"	<!-- foot menu -->" +
		"	<div id=\"x-foot-subm\">" +
		"		<a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"\">Home<\/a> &nbsp;|&nbsp; " +
		"		<a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"\/About-Us\">About Us<\/a> &nbsp;|&nbsp; " +
		"		<a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"\/Special-Offer\">Special Offer<\/a> &nbsp;|&nbsp; " +
		"		<a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"\/Our-Clients\">Our Clients<\/a> &nbsp;|&nbsp; " +
		"		<a href=\"http:\/\/contact.ebay.com.au\/ws\/eBayISAPI.dll?ContactUserNextGen&recipient="+UserID+"\">Contact Us<\/a>" +
		"	<\/div>" +
		
		"	<!-- foot copyright -->" +
		"	<div id=\"x-foot-copy\">Copyright &copy; "+d.getFullYear()+" <a href=\"http:\/\/stores.ebay.com.au\/"+StoreID+"\">OzWashroom<\/a>. All rights reserved.<\/div>" +
		"<\/div><\/div>";
	if($(".x-content").length > 0) { $(".x-content").after(footer); }
	
	//Side featured items
	$("#x-side-feat-pull").loadFeatured( $.extend({}, settings, { "service": {
	// International sellers only, dollar sign currency
		"callback": function( list ){ var strNewString = $('#x-feat').html().replace(/ebay.com\//g,'ebay.com.au/'); $('#x-feat').html(strNewString); },
		"keyword": null,
		"category": "Featured",
		"num": 4,
		"operator": "AND"
	} }) );
	
	//Custom style additions
	if($("#x-head-menu").find("li").length > 0)						{ $("#x-head-menu").find("li:first").addClass("first"); }
	if($("#x-head-menu").find("li").length > 0)	  		  			{ $("#x-head-menu").find("li:last").addClass("last"); }
	if($("#LeftPanel ul.lev1").find("li").length > 0) 					{ $("#LeftPanel ul.lev1").find("li:first").addClass("first"); }
	if($("#LeftPanel ul.lev1").find("li").length > 0)	  				{ $("#LeftPanel ul.lev1").find("li:last").addClass("last"); }
	if($(".x-fp table.fixed").find("tr").length > 0)						{ $(".x-fp table.fixed").find("tr:first td:first").addClass("x-hide"); }
	if($("#x-feat .x-test table.fixed").find("tr").length > 0)		{ $("#x-feat .x-test table.fixed").find("tr:first td:first").removeClass("x-hide"); }
	if($("#x-main-tabs").length > 0)					  					{ $("#x-main-tabs").find("a:first img").addClass("first"); }
	if($("#x-main-tabs").length > 0)										{ $("#x-main-tabs").find("a:last img").addClass("last"); }
	if($("#x-spec").find("table").length > 0)							{ $("#x-spec").find("table tr:last").addClass("last"); }
	//if($(".x-content").length > 0)										{ $(".x-content").find("tr td[width=13]").addClass("x-hide"); }
	
});