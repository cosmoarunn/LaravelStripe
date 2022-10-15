import axios from 'axios';

export default {

//(function (cash) {
//    "use strict";
/*
 * isNumeric
 * @returns {random.m|Number|random.a|random.c}
 */
isNumeric : function (n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
},

/*
 * Parse query string
 * parse location.search by invoking without arguement
 * @returns {array} 
 
parseQueryString: function(qs) {
    var obj = {};
    function sliceUp(x) { x.replace('?', '').split('&').forEach(splitUp); }
    function splitUp(x) { var str = x.split('=');  obj[str[0]] = decodeURIComponent(str[1]); }
    try { (!qs ? sliceUp(location.search) : sliceUp(qs.trim())); } catch(e) {}
   return obj;
},*/
/* usage getUrlVars() 
var first = getUrlVars()["id"];
var second = getUrlVars()["page"];
 */
getUrlVars: function() {
  var vars = {};
  var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
      vars[key] = value;
  });
  return vars;
},

updateURLParameter: function(url, param, paramVal){
  var newAdditionalURL = "";
  var tempArray = url.split("?");
  var baseURL = tempArray[0];
  var additionalURL = tempArray[1];
  var temp = "";
  if (additionalURL) {
      tempArray = additionalURL.split("&");
      for (var i=0; i<tempArray.length; i++){
          if(tempArray[i].split('=')[0] != param){
              newAdditionalURL += temp + tempArray[i];
              temp = "&";
          }
      }
  }

  var rows_txt = temp + "" + param + "=" + paramVal;
  return baseURL + "?" + newAdditionalURL + rows_txt;
},
/*
 * Parse query string
 * parse location.search by invoking without arguement
 * @returns {array} 
 */
parseUrlSegments: function (qs) {
    var obj = {}; 
    let regEx = /^(https?|ftp|http):\/\//;
    
    if(!qs)  	qs = window.location.href.replace(window.location.search,'')
    else  	qs = qs.split('?')[0]
    function splitUp(x) { 
    	
      var test = regEx.exec(qs)
      var match = qs.match(regEx)
      
      if(test[1] == 'https')
      	qs = qs.replace('https://', '').split('/')
      else if(test[1] == 'http')
      	qs = qs.replace('http://', '').split('/')
      qs.shift()
      return qs 
      }
    try { 
    	obj =  (!qs ? splitUp(window.location.href.replace(window.location.search,'')) : splitUp(qs)); 
    } catch(e) { console.log(e.toString()); return {} }

    return obj;
},

/*
 * Object to Array
 * @param {type} r
 * @returns {obj2Arr.res|Array}
 */
obj2Arr : function(r) { 
	var res = [];
	for (var i = 0, len = r.length; i < len; i++) {
	    var re = r[i];
	    res.push({ name: re.name, id: re.id });
	}
	return(res);
},
/*
 * Implode a jscript array
 * @param {string} d delimiter
 * @param {string} s string
 * @returns {string} 
 */
implode: function(d,s,c) { 
    var r = []; if('undefined' === typeof c) { c = '+'; }
    $.each(s, function(i2,v2) {
         var st = i2 + c + v2;
            r.push(st);
        
    });
    return r.join(d);
},
/**
 * Delete a key=>value pair from jscript object by value of a single pair
 * @param {Object} obj Source Object
 * @param {val} s string
 * @returns {string}
 */
removeObjItemByValue: function(o, v) {
    return  (delete o[Object.keys(o).splice(Object.values(o).indexOf(v), 1)])?o:0;
}, 

/**
 * check if a value exists in array of objects
 * @param {Object} obj Source Object
 * @param {val} s string
 * @returns {string}
 */
existsInObj: function(o, v) {
    return  (o[Object.keys(o).splice(Object.values(o).indexOf(v), 1)] == v.trim())?1:0;
},

getMeta: function (metaName) {
  const metas = document.getElementsByTagName('meta');

  for (let i = 0; i < metas.length; i++) {
    if (metas[i].getAttribute('name') === metaName) {
      return metas[i].getAttribute('content');
    }
  }

  return '';
},

/**
 * check if a value exists in array of objects
 * @param {Object} obj Source Object
 * @param {val} s string
 * @returns {string}
 */
postServer : async function (url, params, delay) {
      return new Promise((resolve,reject) => { 
        if("undefined" == typeof params || "undefined" == typeof url  )
          reject({ success: false, msg: "either url or parameter is undefined. "});
        else {
          axios.post(url, {
            '_token': cash('#csrf_token').val(),
            'params': params,
          }).then((res) => { 
            if(!res.success) 
              reject(res)
            else  
              resolve(res)
          }).catch((e)=>{ reject(e); })
        }
      });

    },


    /**
         * 
         * @param {*} id 
         * @param {*} files 
         * @returns 
         */
     setUploadedFiles : async  (id, files) => { return false;
        if(!files.length) return;
        files.forEach(file => { 
            cash('.uploaded').append('<i data-loading-icon="puff" data-color="blue" class="svg-loader w-5 h-5 mx-auto"></i>').svgLoader()
            axios.post('/users/upload', {id: id, filename: file })
                .then(res => { 
                    cash('.uploaded').append(`<img class="w-10 h-10" src="${res.data}">`)
                    cash('.svg-loader').remove();
                })
            
        })

      },

      postcodeLookup : (api_key, number, postcode) => { 
        
    
          let address_1 =  '',address_2 = '',town =  '',county = '', pcode = '',region = '',country = '';
          //Get Address
          axios.get(`https://maps.googleapis.com/maps/api/geocode/json?address=${postcode}&sensor=false&key=${api_key}`, function (response) {
            console.log(response);
              // Format/Find Address Fields
              var address = response.data.results[0].address_components;
              // Loop through each of the address components to set the correct address field
              cash.each(address, function () {
                  var address_type = this.types[0];
                  switch (address_type) {
                      case 'route':
                          address_1 = number + ' ' + this.long_name;
                          break;
                      case 'locality':
                          address_2 = this.long_name;
                          break;
                      case 'postal_town':
                          town = this.long_name;
                          break;
                      case 'administrative_area_level_2':
                          county = this.long_name;
                          break;
                      case 'administrative_area_level_1':
                          region = this.long_name;
                          break;
                      case 'country':
                          country = this.long_name;
                          break;
                  }
              });
              // Sometimes the county is set to the postal town so set to empty if that is the case
              if (county === town) {
                  county = '';
              }
              return { 
                'line1' : address_1,
                'line2' : address_2,
                'city' : town,
                'region' : region,
                'country' : country
              }
          });
      },
      


};