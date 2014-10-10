        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/organictabs.jquery.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/jquery.populate.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/jquery.timepicker.min.js"></script>
        <script src="js/jquery.rateit.min.js"></script>
        <script>
       		$(function() {
		    	$(document).tooltip();
		  	});
		  	
		  	function updateQueryString(key, value) {
		  		var uri = window.location.href;
		  		var newUri = uri;
			  	var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
			  	var separator = uri.indexOf('?') !== -1 ? "&" : "?";
                
                var paramStr = '';
                if(value instanceof Array) {
                    var newvalue = ''
                    for(var i=0; i < value.length; i++) {
                        newvalue = newvalue + '_' + value[i];
                    }
                    value = newvalue;
                } 
                
                paramStr = key + "=" + value;
                
			  	if (uri.match(re)) {
			    	newUri = uri.replace(re, '$1' + paramStr + '$2');
			  	} else {
			    	newUri = uri + separator + paramStr;
			  	}
			  	window.location.href = newUri;
			}
			
			var qs = (function(a) {
			    if (a == "") return {};
			    var b = {};
			    for (var i = 0; i < a.length; ++i)
			    {
			        var p=a[i].split('=');
			        if (p.length != 2) continue;
			        b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
			    }
			    return b;
			})(window.location.search.substr(1).split('&'));
        </script>