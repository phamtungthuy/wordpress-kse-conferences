//Make accented characters/diacritics filterable by their non-accented equivalent.
$.extend( $.tablesorter.characterEquivalents, {
    "a" : "ÄÄƒĂ¡Ă Ă¢Ă£Ă¤Ä…Ă¥",
    "A" : "Ä€Ä‚ĂĂ€Ă‚ĂƒĂ„Ä„Ă…",
    "ae": "\u00e6", // expanding characters Ă¦ Ă†
    "AE": "\u00c6",
    "c" : "Ä‡Ä‰Ä‹ÄĂ§",
    "C" : "Ä†ÄˆÄÄŒĂ‡",
    "d" : "ÄÄ‘",
    "D" : "ÄÄ",
    "e" : "Ä“Ä•Ä—Ä™Ä›Ă©Ă¨ĂªĂ«",
    "E" : "Ä’Ä”Ä–Ä˜ÄĂ‰ĂˆĂĂ‹",
    "g" : "ÄÄŸÄ¡Ä£",
    "G" : "ÄœÄÄ Ä¢",
    "h" : "Ä¥Ä§",
    "H" : "Ä¤Ä¦",
    "i" : "Ä©Ä«Ä­Ä¯Ä±Ä³Ă­Ă¬iĂ®Ă¯",
    "I" : "Ä¨ÄªÄ¬Ä®Ä°Ä²ĂĂŒÄ°ĂĂ",
    "j" : "Äµ",
    "J" : "Ä´",
    "k" : "Ä·Ä¸",
    "K" : "Ä¶",
    "l" : "ÄºÄ¼Ä¾Å€Å‚",
    "L" : "Ä¹Ä»Ä½Ä¿Å",
    "n" : "Å„Å†ÅˆÅ‰Å‹",
    "N" : "ÅƒÅ…Å‡Å",
    "o" : "ÅÅÅ‘Å“Ă³Ă²Ă´ĂµĂ¶",
    "O" : "ÅŒÅÅÅ’Ă“Ă’Ă”Ă•Ă–",
    "oe": "\u00f6\u0153", // Å“ Å’
    "OE": "\u00d6\u0152",
    "r" : "Å•Å—Å™",
    "R" : "Å”Å–Å˜",
    "s" : "Å›ÅÅŸÅ¡Å¿",
    "S" : "ÅÅœÅÅ ",
    "ss": "\u00df",
    "SS": "\u1e9e",
    "t" : "Å£Å¥Å§",
    "T" : "Å¢Å¤Å¦",
    "u" : "Å©Å«Å­Å¯Å±Å³ĂºĂ¹Ă»Ă¼",
    "U" : "Å¨ÅªÅ¬Å®Å°Å²ĂĂ™Ă›Ăœ",
    "w" : "Åµ",
    "W" : "Å´",
    "y" : "Å·",
    "Y" : "Å¶Å¸",
    "z" : "ÅºÅ¼Å¾",
    "Z" : "Å¹Å»Å½"
    }); 
    
    $.tablesorter.themes.bootstrap = {
        // these classes are added to the table. To see other table classes
        // available,
        // look here: http://twitter.github.com/bootstrap/base-css.html#tables
        table      : "table table-bordered",
        caption      : 'caption',
        header     : "bootstrap-header", // give the header a gradient background
        footerRow  : "",
        footerCells: "",
        icons      : "", 
        iconSortNone   : "icon-resize-vertical glyphicon glyphicon-sort",
        iconSortAsc    : "icon-chevron-up glyphicon glyphicon-sort-by-attributes",     // includes
                                                                                    // classes
                                                                                    // for
                                                                                    // Bootstrap
                                                                                    // v2 &
                                                                                    // v3
        iconSortDesc   : "icon-chevron-down glyphicon glyphicon-sort-by-attributes-alt", // includes
                                                                                        // classes
                                                                                        // for
                                                                                        // Bootstrap
                                                                                        // v2 &
                                                                                        // v3
        active     : "", // applied when column is sorted
        hover      : "", // use custom css here - bootstrap class may not
                            // override it
        filterRow  : "", // filter row class
        even       : "", // odd row zebra striping
        odd        : ""  // even row zebra striping
      };
     
      function initTableSorter( elemId, pageSize ){
          
          var $table = $("#"+elemId).tablesorter({
            // this will apply the bootstrap theme if "uitheme" widget is included
            // the widgetOptions.uitheme is no longer required to be set
            theme : "bootstrap",
            
            //Accented characters will get replaced by their character equivalent when the sortLocaleCompare option is true.
            //We use the above included equivalence mapping
            sortLocaleCompare : true,
        
            widthFixed: true,
        
            headerTemplate : '{content} {icon}', // new in v2.7. Needed to add
                                                    // the bootstrap icon!
        
            // widget code contained in the jquery.tablesorter.widgets.js file
            // use the zebra stripe widget if you plan on hiding any rows (filter
            // widget)
            widgets : [ "uitheme", "filter", "zebra" ],
        
            widgetOptions : {
              // using the default zebra striping class name, so it actually isn't
                // included in the theme variable above
              // this is ONLY needed for bootstrap theming if you are using the
                // filter widget, because rows are hidden
              zebra : ["even", "odd"],		
          filter_external : $("#search" +elemId),
          // include column filters
          filter_columnFilters: true,
          filter_placeholder: { search : 'Search...' },
          filter_saveFilters : true,
          filter_reset: '.reset',
              
              filter_columnFilters: true,
              // extra css class name (string or array) added to the filter element (input or select)
              filter_cssFilter: "form-control",
            
              // set the uitheme widget to use the bootstrap theme class names
              // this is no longer required, if theme is set
              // ,uitheme : "bootstrap"
            
            }
          })
          .tablesorterPager({
        
            // target the pager markup - see the HTML block below
            container: $(".pager" + elemId),
        
            // target the pager page select dropdown - choose a page
            cssGoto  : ".pagenum",
        
            // remove rows from the table to speed up the sort of large tables.
            // setting this to false, only hides the non-visible rows; needed if you
            // plan to add/remove rows with the pager enabled.
            removeRows: false,
        
            // output string - default is '{page}/{totalPages}';
            // possible variables: {page}, {totalPages}, {filteredPages},
            // {startRow}, {endRow}, {filteredRows} and {totalRows}
            output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',
            
            size: pageSize			
          });		
    }
    