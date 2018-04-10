/*

Copyright (c) 2007 Travis Hensgen, http://mondea.com.au

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.

*/

var Jel = Base.extend
(
    {},
    {
        version:    1.0
    }
);/*

Class: Jel.Lang
    *Language Resources* for the Jel library which allow it to be internationalised.
    
*/

Jel.Lang = 
{
    KEY:                            "en.us", 
    DATE_FORMAT:                    "m/d/Y",
    DATE_12_FORMAT:                 "m/d/Y g:i A"
};

Jel.Lang.String = 
{
    PLURAL_SPECIAL:
    {
        "datum":            "data",
        "sheep":            "sheep",
        "deer":             "deer",
        "foot":             "feet",
        "tooth":            "teeth",
        "person":           "people",
        "crisis":           "crises",
        "child":            "children",
        "woman":            "women",
        "man":              "man",
        "stimulus":         "simuli",
        "fungus":           "fungii",
        "half":             "halves",
        "knife":            "knives",
        "life":             "lives",
        "lead":             "leaves",
        "calf":             "calves",
        "kilo":             "kilos",
        "piano":            "pianos",
        "radio":            "radios",
        "index":            "indices",
        "fish":             "fish",
        "passer-by":        "passers-by",
        "formula":          "formulae"       
    },
    
    PLURAL_SUFFIX_REPLACE:
    {
        "y":        "ies",
        "o":        "oes",
        "s":        "ses",
        "sh":       "shes",
        "ss":       "sses",
        "z":        "zes",
        "x":        "xes",
        "ch":       "ches",
        "in-law":   "s-in-law" 
    }
};


/*

Class: Jel.Lang.Date
    Language resources for <Jel.Date>
    
*/


/* 
    Property: DAYS 
        an *array* of *long day name* string constants for the current language build. e.g. for English ["Sunday", ..., "Saturday"]. These are also used by <Jel.Date.format> and <Jel.Date.parse>.
    
    Example: 
        > Jel.Lang.Date.DAYS[4]; // Thursday
        > Jel.Lang.Date.DAYS[1]; // Monday
*/

/* 
    Property: DAYS_SHORT
        an *array* of *short day name* string constants for the current language build. e.g. for English ["Sun", ..., "Sat"]. These are also used by <Jel.Date.format> and <Jel.Date.parse>.
    
    Example: 
        > Jel.Lang.Date.DAYS_SHORT[4]; // Thu
        > Jel.Lang.Date.DAYS_SHORT[1]; // Mon
*/

/* 
    Property: MONTHS
        an *array* of *long month names* string constants for the current language build. e.g. for English ["January", ..., "December"]. These are also used by <Jel.Date.format> and <Jel.Date.parse>.
    
    Example: 
        > Jel.Lang.Date.MONTHS[4]; // May
        > Jel.Lang.Date.MONTHS[1]; // Februrary
*/

/* 
    Property: MONTHS_SHORT
        an array of *short month names* string constants for the current language build. e.g. for English ["Jan", ..., "Dec"]. These are also used by <Jel.Date.format> and <Jel.Date.parse>.

    Example: 
        > Jel.Lang.Date.MONTHS_SHORT[4]; // May
        > Jel.Lang.Date.MONTHS_SHORT[1]; // Feb
*/



Jel.Lang.Date = 
{
    DAYS: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
    DAYS_SHORT: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    MONTHS: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    MONTHS_SHORT: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    MONTHS_LCASE: ["january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december"],
    MONTHS_SHORT_LCASE: ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"]
};
  
  
Jel.Lang.FormValidator = 
{
    TERM_INCLUSIVE:             "inclusive",
    ERRORS_TITLE:               "Please correct the following errors:",
     
    TYPE_TEMPLATE:
    {
        INT:                    "whole number (no letters, symbols, commas, or decimal places)",
        INT_POSITIVE:           "positive whole number (no letters, symbols, commas, or decimal places)",
        INT_NEGATIVE:           "negative whole number (no letters, symbols, commas, or decimal places)",
        FLOAT:                  "number, including decimal places (no letters, symbols or commas)",
        FLOAT_POSITIVE:         "positive number, including decimal places (no letters, symbols or commas)",
        FLOAT_NEGATIVE:         "negative number, including decimal places (no letters, symbols or commas)",
        NUMERIC:                "number (no letters, symbols, or commas)",
        NUMERIC_POSITIVE:       "positive number (no letters, symbols, or commas)",
        NUMERIC_NEGATIVE:       "negative number (no letters, symbols, or commas)",
        DATE:                   "date",
        TIME:                   "time"
    },
    
    VALUE_TEMPLATE:
    {
        RANGE:              "between [lower] and [upper][inclusive]",
        EQ:                 "equal to [compare]",
        NEQ:                "different to [compare]",
        GT:                 "greater than [compare]",
        LT:                 "less than [compare]",
        GE:                 "greater than or equal to [compare]",
        LE:                 "less than or equal to [compare]"
    },
    
    VALUE_TEMPLATE_DATE:
    {
        RANGE:              "between [lower] and [upper][inclusive]",
        EQ:                 "equal to [compare]",
        NEQ:                "different to [compare]",
        GT:                 "after [compare]",
        LT:                 "before [compare]",
        GE:                 "after or on [compare]",
        LE:                 "before or on [compare]"
    },
    
    VALUE_TEMPLATE_TIME:
    {
        RANGE:              "between [lower] and [upper][inclusive]",
        EQ:                 "equal to [compare]",
        NEQ:                "different to [compare]",
        GT:                 "after [compare]",
        LT:                 "before [compare]",
        GE:                 "after or at [compare]",
        LE:                 "before on at [compare]"
    }
};
                              
Jel.Lang.FormValidator.ERRORS =             
{                           
    REQUIRED:               "[field_label]must be provided",
    REQUIRED_SELECT:        "[field_label]must be selected",
    REQUIRED_CHECKBOX:      "[field_label]must be indicated",
    REQUIRED_RADIO:         "[field_label]must be selected",
                                         
    LENGTH_GT:              "[field_label]must contain more than [compare] characters", 
    LENGTH_GE:              "[field_label]must contain at least [compare] characters", 
    LENGTH_LT:              "[field_label]must contain less than [compare] characters", 
    LENGTH_LE:              "[field_label]must contain no more than [compare] characters",
    LENGTH_EQ:              "[field_label]must contain exactly [compare] characters",
    LENGTH_EQ:              "[field_label]must not contain exactly [compare] characters",
    LENGTH_RANGE:           "[field_label]must contain between [lower] and [upper] characters [inclusive]",
                                         
    INT:                    "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.INT,
    INT_POSITIVE:           "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.INT_POSITIVE,
    INT_NEGATIVE:           "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.INT_NEGATIVE,
    FLOAT:                  "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.FLOAT,
    FLOAT_POSITIVE:         "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.FLOAT_POSITIVE,
    FLOAT_NEGATIVE:         "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.FLOAT_NEGATIVE,
    NUMERIC:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.NUMERIC,
    NUMERIC_POSITIVE:       "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.NUMERIC_POSITIVE,
    NUMERIC_NEGATIVE:       "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.NUMERIC_NEGATIVE,
    DATE:                   "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.DATE,

    RANGE:                  "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.RANGE + " (case sensitive)",
    EQ:                     "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.EQ + " (case sensitive)",
    NEQ:                    "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.NEQ + " (case sensitive)",
    GT:                     "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.GT + " (case sensitive)",
    LT:                     "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.LT + " (case sensitive)",
    GE:                     "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.GE + " (case sensitive)",
    LE:                     "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.LE + " (case sensitive)",

    RANGE_CI:               "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.RANGE,
    EQ_CI:                  "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.EQ,
    NEQ_CI:                 "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.NEQ,
    GT_CI:                  "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.GT,
    LT_CI:                  "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.LT,
    GE_CI:                  "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.GE,
    LE_CI:                  "[field_label]must be " + Jel.Lang.FormValidator.VALUE_TEMPLATE.LE,
                                         
    INT_RANGE:              "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.INT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.RANGE,
    INT_EQ:                 "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.INT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.EQ,    
    INT_NEQ:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.INT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.NEQ,    
    INT_GT:                 "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.INT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.GT,    
    INT_LT:                 "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.INT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.LT,    
    INT_GE:                 "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.INT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.GE,    
    INT_LE:                 "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.INT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.LE,    
                                         
    FLOAT_RANGE:            "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.FLOAT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.RANGE,
    FLOAT_EQ:               "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.FLOAT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.EQ,    
    FLOAT_NEQ:              "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.FLOAT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.NEQ,    
    FLOAT_GT:               "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.FLOAT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.GT,    
    FLOAT_LT:               "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.FLOAT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.LT,    
    FLOAT_GE:               "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.FLOAT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.GE,    
    FLOAT_LE:               "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.FLOAT + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.LE,    
                                         
    NUMERIC_RANGE:          "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.NUMERIC + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.RANGE,
    NUMERIC_EQ:             "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.NUMERIC + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.EQ,    
    NUMERIC_NEQ:            "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.NUMERIC + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.NEQ,    
    NUMERIC_GT:             "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.NUMERIC + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.GT,    
    NUMERIC_LT:             "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.NUMERIC + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.LT,    
    NUMERIC_GE:             "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.NUMERIC + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.GE,    
    NUMERIC_LE:             "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.NUMERIC + ", and " + Jel.Lang.FormValidator.VALUE_TEMPLATE.LE,    
                                         
    DATE_RANGE:             "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.DATE + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_DATE.RANGE + " in the format [format]",
    DATE_EQ:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.DATE + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_DATE.EQ + " in the format [format]",    
    DATE_NEQ:               "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.DATE + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_DATE.NEQ + " in the format [format]",    
    DATE_GT:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.DATE + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_DATE.GT + " in the format [format]",    
    DATE_LT:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.DATE + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_DATE.LT + " in the format [format]",    
    DATE_GE:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.DATE + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_DATE.GE + " in the format [format]",    
    DATE_LE:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.DATE + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_DATE.LE + " in the format [format]",
    DATE_FUTURE:            "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.DATE + " in the future, " + " in the format [format]",
    DATE_PAST:              "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.DATE + " in the past, " + " in the format [format]",

    TIME_RANGE:             "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.TIME + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_TIME.RANGE + " in the format [format]",
    TIME_EQ:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.TIME + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_TIME.EQ + " in the format [format]",    
    TIME_NEQ:               "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.TIME + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_TIME.NEQ + " in the format [format]",    
    TIME_GT:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.TIME + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_TIME.GT + " in the format [format]",    
    TIME_LT:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.TIME + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_TIME.LT + " in the format [format]",    
    TIME_GE:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.TIME + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_TIME.GE + " in the format [format]",    
    TIME_LE:                "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.TIME + " " + Jel.Lang.FormValidator.VALUE_TEMPLATE_TIME.LE + " in the format [format]",
    TIME_LATER:             "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.TIME + " later than the current time, " + " in the format [format]",
    TIME_EARLIER:           "[field_label]must be a " + Jel.Lang.FormValidator.TYPE_TEMPLATE.TIME + " earlier than the current time, " + " in the format [format]"
};/*

Class: Jel.CoreExtender
    Extends the core JavaScript classes (Date, String, and Number) and their prototypes with methods from <Jel.Date>, <Jel.String>, and <Jel.Number> respectively.
    To ensure maximum compatibility, Jel does NOT extend any core JavaScript classes by default, but this allows you to do so to make the API more convenient (at your disgression, since opinions are divided on whether this is a good idea).
    
*/

Jel.CoreExtender = Base.extend
({
    /* 
        Function: constructor
            Class constructor, which simply performs extension of the JavaScript built in objects String, Date, and Number. If you want to extend JavaScript, you'd generally call this wherever your application/site specific logic is contained.
            
        Arguments:
            allowOverride - boolean (false by default), if true, *allows the extender to override certain existing functions with new ones*. Presently only Date.parse is overridden, since the built in function isn't particularly useful. If this is false, alternative function names are used.
            
        Example:
            > new Jel.CoreExtender(true);
            > Date.parse("23/05/2007", "d/m/Y"); 
            > // Date object with properties day = 23, month = 4, year = 2007
            > 
            > "white space    ".trim(); // "white space"
        
        How JavaScript core is extended by Jel:
            Most functions in <Jel.String>, <Jel.Date>, and <Jel.Number> have as their first argument an object of the equivalent type, upon which the operation is performed. JavaScript
            prototype extensions simply call the the equivalent function in Jel, with "this" as the first argument, followed by any additional arguments passed to the prototype function. For example, here is the code for the String.prototype.right function:
            
            > String.prototype.right = function(length) { return Jel.String.right(this, length) };    
            
            This now allows us to call *right* on a string directly, which is definitely convenient...
            
            > "Maximus".right(3); // "mus"
            > // as opposed to Jel.String.right("Maximus", 3);
            
            Refer to the function mapping table below, to see the names of functions introduced to the core JavaScript objects. They follow the general rule above where the names of the functions match up, but with some exceptions (marked with *).     
        
        Function Mappings:
            > String.prototype.repeat(count)                         =>   Jel.String.repeat(str, count)
            > String.prototype.right(length)                         =>   Jel.String.right(str, length)
            > String.prototype.left(length)                          =>   Jel.String.left(str, length)
            > String.prototype.trim()                                =>   Jel.String.trim(str, length)
            > String.prototype.ltrim()                               =>   Jel.String.ltrim(str)                 
            > String.prototype.rtrim()                               =>   Jel.String.rtrim(str)                 
            > String.prototype.toFloat()                             =>   Jel.String.toFloat(str)                 
            > String.prototype.toInt()                               =>   Jel.String.toInt(str)                 
            > String.prototype.extractInt()                          =>   Jel.String.extractInt()                 
            > String.prototype.eq(strCompare, ignoreCase)         =>   Jel.String.eq(str, strCompare, ignoreCase)                 
            > String.prototype.startsWith(strCompare, ignoreCase) =>   Jel.String.startsWith(str, strCompare, ignoreCase)                 
            > String.prototype.endsWith(strCompare, ignoreCase)   =>   Jel.String.endsWith(str, strCompare, ignoreCase)
            > String.prototype.decamelize(delimiter)                 =>   Jel.String.decamelize(str, delimiter)                 
            > String.prototype.camelize(delimiter)                   =>   Jel.String.camelize(str, delimiter)                 
            > String.prototype.titleCase()                           =>   Jel.String.titleCase(str)                 
            > String.prototype.normalize()                           =>   Jel.String.normalize(str)                 
            > String.prototype.constant()                            =>   Jel.String.constant(str)                 
            >
            > String.prototype.parseDate(format) *                   =>   Jel.Date.parse(str, format)  
            > String.prototype.convertDate(fromFormat, toFormat) *   =>   Jel.Date.convert(str, fromFormat, toFormat) 
            >
            > Number.prototype.leadingZero(toLength)                 =>   Jel.Number.leadingZero(number, toLength)
            > Number.prototype.ordinalSuffix()                       =>   Jel.Number.ordinalSuffix(number)
            > Number.prototype.format(format)                        =>   Jel.Number.format(number, format)
            >
            > Date.parseDate(str, format) *                          =>   Jel.Date.parse(str, format) OR
            > Date.parse(str, format)                                =>   Jel.Date.parse(str, format) (allowOverride true)
            > Date.convert(str, fromFormat, toFormat)                =>   Jel.Date.convert(str, fromFormat, toFormat)
            >
            > Date.prototype.format(format)                          =>   Jel.Date.format(date, format)
            > Date.prototype.daysInMonth()                           =>   Jel.Date.daysInMonth(month)
            > Date.prototype.isLeapYear()                            =>   Jel.Date.isLeapYear(year)
            > Date.prototype.meridiem()                              =>   Jel.Date.meridiem(hour)
            > Date.prototype.ordinalSuffix()                         =>   Jel.Date.ordinalSuffix(day)
            > Date.prototype.fullYear()                              =>   Jel.Date.fullYear(date)
            > Date.prototype.dayOfYear()                             =>   Jel.Date.dayOfYear(date)
            > Date.prototype.internetBeat()                          =>   Jel.Date.internetBeat(date)
            >
            > ENGLISH SPECIFIC (if available)
            > String.prototype.an                                    =>   Jel.String.an(str)
            > String.prototype.plural(count)                         =>   Jel.String.plural(str, count)
            
    */
    
    constructor: function(allowOverride)
    {
        String.prototype.repeat         = function(count) { return Jel.String.repeat(this, count); };
        String.prototype.right          = function(length) { return Jel.String.right(this, length); };
        String.prototype.left           = function(length) { return Jel.String.left(this, length); };
        String.prototype.trim           = function() { return Jel.String.trim(this); };
        String.prototype.ltrim          = function() { return Jel.String.ltrim(this); };
        String.prototype.rtrim          = function() { return Jel.String.rtrim(this); };
        String.prototype.toFloat        = function() { return Jel.String.toFloat(this); };
        String.prototype.toInt          = function() { return Jel.String.toInt(this); };
        String.prototype.extractInt     = function() { return Jel.String.extractInt(this); };
        String.prototype.eq =             function(strCompare, ignoreCase) { return Jel.String.eq(this, strCompare, ignoreCase); };
        String.prototype.startsWith     = function(strCompare, ignoreCase) { return Jel.String.startsWith(this, strCompare, ignoreCase); };
        String.prototype.endsWith       = function(strCompare, ignoreCase) { return Jel.String.endsWith(this, strCompare, ignoreCase); };
        String.prototype.decamelize     = function(delimiter) { return Jel.String.decamelize(this, delimiter); };
        String.prototype.camelize       = function(delimiter) { return Jel.String.camelize(this, delimiter); };
        String.prototype.titleCase      = function() { return Jel.String.titleCase(this); };
        String.prototype.normalize      = function() { return Jel.String.normalize(this); };
        String.prototype.constant       = function() { return Jel.String.constant(this); };

        String.prototype.parseDate      = function(format) { return Jel.Date.parse(this, format); };
        String.prototype.convertDate    = function(fromFormat, toFormat) { return Jel.Date.convert(this, fromFormat, toFormat); };

        Number.prototype.leadingZero    = function(toLength) { return Jel.Number.leadingZero(this, toLength); };
        Number.prototype.ordinalSuffix  = function() { return Jel.Number.ordinalSuffix(this); };
        Number.prototype.format         = function(format) { return Jel.Number.format(this, format); };

        if (!allowOverride)
        {
            Date.parseDate              = function(str, format) { return Jel.Date.parse(str, format); };
        }
        else
        {
            Date.parse                  = function(str, format) { return Jel.Date.parse(str, format); };
        }
        
        Date.convert                    = function(str, fromFormat, toFormat) { return Jel.Date.convert(str, fromFormat, toFormat); };
        Date.prototype.format           = function(format) { return Jel.Date.parse(this, format); };

        Date.prototype.daysInMonth      = function() { return Jel.Date.daysInMonth(this.getDate()); };
        Date.prototype.isLeapYear       = function() { return Jel.Date.isLeapYear(Jel.Date.fullYear(this)); };
        Date.prototype.meridiem         = function() { return Jel.Date.meridiem(this.getHours()); };
        Date.prototype.ordinalSuffix    = function() { return Jel.Date.ordinalSuffix(this.getDate()); };
        Date.prototype.fullYear         = function() { return Jel.Date.fullYear(this); };
        Date.prototype.dayOfYear        = function() { return Jel.Date.dayOfYear(this); };
        Date.prototype.internetBeat     = function() { return Jel.Date.internetBeat(this); };
        
        if (Jel.String.plural)
            String.prototype.plural     = function(count) { return Jel.String.plural(this, count); };
        
        if (Jel.String.an)
            String.prototype.an         = function() { return Jel.String.an(this); };
            
    }
});/*
Class: Jel.String
    *Utility Methods* for manipulating JavaScript's *built-in String class*
*/

Jel.String = 
{
    /*
        Method: repeat
            gets the *repeat* of a string for a specified *count*

        Arguments:
            str - string, the string to repeat
            count - integer, the delimiter to use between words. If not specified, a dash ("-") is used
    
        Returns: 
            string
        
        Examples:
            > String.repeat("-", 5);     // "-----"
            > String.repeat("hello", 3); // "hellohellohello"
    */

    repeat: function(str, count)
    {
    	var ret = '';

    	for (var i=0; i<count; i++)
    		ret += str;
	
    	return ret;
    },
    
    wrapToLines: function(str, lineLength)
    {
        var lines = [];
        var line = '';
        var words = str.split(" ");
        var appended;
        var word;
        
        for (var i=0; i<words.length; i++)
        {
            word = words[i];
            appended = line + ( line.length == '' ? '' : ' ' ) + word;
            
            
            if ( appended.length > lineLength )
            {
                lines[lines.length] = appended;
                line = '';
            }
            else
            {
                line = appended;
            }
        }
        
        if (line != '')
            lines[lines.length] = appended;
        
        return lines;
    },

    /*
        Method: right
            gets the *specified number of characters from the end* of a given string
            
        Arguments:
            str - String, a given string 
            length - the number of characters to return
        
        Example:
            > Jel.String.right("wicked", 3); // "ked"
    */
            
    right: function(str, length)
    {
	    return str.substring(str.length - length, str.length);
	},

    /*
        Method: left
            gets the *specified number of characters from the beginning* of a given string
            
        Arguments:
            str - String, a given string 
            length - the number of characters to return
        
        Example:
            > Jel.String.left("wicked", 4); // "wick"
    */
	
	left: function(str, length)
    {
    	return str.substring(0, length);
    },
    
    /*
        Method: ltrim
            *removes whitespace* characters *from the beginning* of a given string

        Arguments:
            str - String, a given string 
        
        Examples:
            > Jel.String.lrim("  wicked");      // "wicked"
            > Jel.String.lrim("  wicked  ");    // "wicked  "
    */
	
    ltrim: function(str)
    {
    	return str.replace(/^\s+/,'');
    },

    /*
        Method: rtrim
            *removes whitespace* characters *from the end* of a given string

        Arguments:
            str - String, a given string 
        
        Examples:
            > Jel.String.rtrim("wicked");       // "wicked"
            > Jel.String.rtrim("  wicked  ");   // "  wicked"
    */
    
    rtrim: function(str)
    {
    	return str.replace(/\s+$/,'');
    },

    /*
        Method: trim
            *removes whitespace* characters *from the beginning and end* of a given string

        Arguments:
            str - String, a given string 
        
        Example:
            > Jel.String.trim("   wicked  "); // "wicked"
    */
    
    trim: function(str) 
    {
    	return Jel.String.ltrim(Jel.String.rtrim(str));
    },
    
    /*
        Method: toFloat
            *gets the float value* of a given string in manner *safe for arithmetic expressions*

        Arguments:
            str - String, a given string 
        
        Returns: 
            float - the float value of the string, if it can be converted into one 
            0.0 - if the string does not represent a float

        Examples:
            > Jel.String.toFloat("0.5");                                  // 0.5
            > Jel.String.toFloat("word");                                 // 0.0
            > Jel.String.toFloat("0.6") + Jel.String.toFloat("word");     // 0.6

    */
    
    toFloat: function(str)
    {
    	if (isNaN(str))
    		return 0.0;
    	else
    		if (Jel.String.trim(str) == '')
    			return 0.0;
    		else
    			return parseFloat(str);
    },

    /*
        Method: toInt
            *gets the integer value* of a given string in a manner that is *safe for arithmetic expressions*

        Arguments:
            str - String, a given string 
        
        Returns: 
            integer - the integer value of the string, if it can be converted into one 
            0 - if the string does not represent an integer

        Examples:
            > Jel.String.toInt("4");          // 4
            > Jel.String.toInt("word");       // 0
            > Jel.String.toInt(8 + "word");   // 8

    */
    
    toInt: function(str)
    {
    	if (isNaN(str))
    		return 0;
    	else
    	{
    		if (Jel.String.trim(str) == '')
    			return 0;
    		else
    			return parseInt(str);
    	}
    },

    /*
        Method: extractInt
            *extracts the digits in a given string*, returning the *integer value* of them *joined together in sequence*

        Arguments:
            str - String, a given string 
        
        Returns: 
            integer - the integer value of the all of the digits joined together in a given string, if any are present 
            0 - otherwise                           

        Examples:
            > Jel.String.extractInt("4jkbn45");   // 445
            > Jel.String.extractInt("word");      // 0
            > Jel.String.extractInt("ff88f999");  // 88999

    */
    
    extractInt: function(str)
    {
        var ret = "";

        var matches = str.match(/[0-9]+/ig);
    
        if (matches)
        {
            for (var i=0; i<matches.length; i++)
            {
                var part = "";
                
                for (var j=0; j<matches[i].length; j++)
                {
                    if (!(part.length == 0 && matches[i][j] == '0'))
                    {
                        // ignore leading zeros
                        part += matches[i][j];
                    }
                }
                
                ret += part;
            }
        }

        return ret == "" ? 0 : parseInt(ret);
    },

    /*
        Method: eq
            checks if a given string *is equal to another string*, with the *optional case-insensitive comparison*
        
        Arguments:
            str - String, a given string 
            strCompare - string, the string to compare to
            ignoreCase - boolean, whether the comparison is case sensitive or not
        
        Returns: 
            true - if they are equal 
            false - otherwise                           

        Examples:
            > Jel.String.equals("clay", "blah");        // false
            > Jel.String.equals("word", "WORD", true); // true
    */
    
    equals: function(str, strCompare, ignoreCase)
    {
        if (!ignoreCase)
            return str == strCompare;
        else
            return str.toLowerCase() == strCompare.toLowerCase();
    },
    
    /*
        Method: startsWith
            checks if a given string *begins with another string*, with the *optional case-insensitive comparison*

        Arguments:
            str - String, a given string 
            strCompare - string, the string to compare to
            ignoreCase - boolean, whether the comparison is case sensitive or not
        
        Returns: 
            true - if a given string begins with *str* 
            false - otherwise                    

        Examples:
            > Jel.String.startsWith("word", "w");                       // true
            > Jel.String.startsWith("field-container", "FIELD", false); // true
            > Jel.String.startsWith("word", "p");                       // false
    */

    startsWith: function(str, strCompare, ignoreCase)
    {   
        return Jel.String.equals(Jel.String.left(str, strCompare.length), strCompare, ignoreCase);
    },
 
    /*
        Method: endsWith
            checks if a given string *ends with another string*, with the option of a case-insensitive comparison

        Arguments:
            str - String, a given string 
            strCompare - string, the string to compare to
            ignoreCase - boolean, whether the comparison is case sensitive or not
        
        Returns: 
            true - if a given string ends with *str* 
            false - otherwise                    

        Examples:
            > Jel.String.endsWith("word", "w");                           // false
            > Jel.String.endsWith("field-container", "CONTAINER", false); // true
    */
    
    endsWith: function(str, strCompare, ignoreCase)
    {
        return Jel.String.equals(Jel.String.right(str, strCompare.length), strCompare, ignoreCase);
    },

    /*
        Method: decamelize
            *breaks a given string up into* a string of *lowercase delimited words*, where an uppercase letter in *a given string* denotes a new word (*camel case*)

        Arguments:
            str - String, the string to decamelize
            delimiter - String, the delimiter to use between words. If not specified, a dash ("-") is used
        
        Returns: 
            string - the final delimited words string
            
        Examples:
            > Jel.String.decamelize("fieldValidator");   // "field-validator"
            > Jel.String.decamelize("helloThere", " ");  // "hello there"
            > Jel.String.decamelize("getValue", "_");    // "get_value"
    */

    decamelize: function(str, delimiter)
    {
        var ret = str.replace(/([A-Z0-9])/g, (delimiter ? delimiter : '-') + '$1').toLowerCase();

        var re = new RegExp('([0-9])' + (delimiter ? delimiter : '-') + '([0-9])', 'g');

        while (ret.match(re))
        {
            ret = ret.replace(re, "$1$2");
        }

        return ret;    
    },

    /*
        Method: camelize
            converts a string of dash-delimited words into a camelized version

        Arguments:
            delimiter - the delimiter to use between words. If not specified, a dash ("-") is used
            
        Returns: 
            string - the final camel cased words string
        
        Credit:
            code taken from Prototype.js 1.5 (c) 2005-2007 Sam Stephenson
            
        Example:
            > Jel.String.camelize("field-validator"); // "fieldValidator"
    */
    
    camelize: function(str, delimiter) 
    {
        if (!delimiter)
            delimiter = '-';
            
        var parts = str.split(delimiter), len = parts.length;
        
        if (len == 1) 
            return parts[0];

        var camelized = str.charAt(0) == delimiter ? parts[0].charAt(0).toUpperCase() + parts[0].substring(1) : parts[0];

        for (var i = 1; i < len; i++)
        {
            camelized += parts[i].charAt(0).toUpperCase() + parts[i].substring(1);
        }

        return camelized;
    },

    /*
        Method: titleCase
            converts a string of words into the equivalent title cased word

        Arguments:
            str - String, the string of words to convert
            
        Returns: 
            string - the final title-cased words string
            
        Example:
            > Jel.String.titleCase("field validator"); // "Field Validator"
    */

    titleCase: function(str)
    {
        var words = str.split(" ");
        var titleWords = [];
        
        for (var i=0; i<words.length; i++)
        {
            titleWords[titleWords.length] = words[i].substr(0, 1).toUpperCase() + words[i].substr(1, words[i].length - 1);
        }
        
        return titleWords.join(" ");
    },
    
    /*
        Method: normalize
            converts a string of words which are camel-cased, dash-delimited, underscore delimted, or a combination into a string of dash-delimited words

        Arguments:
            str - String, the string of words to convert
            
        Returns: 
            string - the final dash-delimited words string
            
        Example:
            > Jel.String.normalize("fieldValidator_1"); // "field-validator-1"
    */
    
    normalize: function(str)
    {
        var ret = str;
        
        ret = ret.replace(/\_/g, "-");
        ret = Jel.String.camelize(ret);
        ret = Jel.String.decamelize(ret);
        
        return ret;
    },

    /*
        Method: constant
            converts a string of words which are camel-cased, dash-delimited, underscore delimted, or a combination into a style approprite for constant values, that is, a string of underscore-delimited uppercase words

        Arguments:
            str - String, the string of words to convert
            
        Returns: 
            string - the final uppercase underscore-delimited words string
            
        Example:
            > Jel.String.normalize("fieldValidator_1"); // "FIELD_VALIDATOR_1"
    */
    
    constant: function(str)
    {
        return Jel.String.normalize(str).toUpperCase().replace(/\-/g, "_");
    }
};/*

Class: Jel.Date
    *Utility Methods* for manipulating JavaScript's *built-in Date class*
*/

Jel.Date = {};

Jel.Date.DATE_NOW = "now";

Jel.Date.PARSE_REG_EXP_COMMON =
{
    LEADING_1_12:       "10|11|12|(?:0[1-9])",
    NO_LEADING_1_12:    "10|11|12|(?:[1-9])",
    BOTH_0_59:          "[0-5][0-9]" 
};

    
/* 
    Property: FORMAT 
        a *hash* collection of *common formatting string constants* to be used with <Jel.Date.format> and <Jel.Date.parse>
        
    Examples:
        > Jel.Date.format(Jel.Date.parse("23/02/2006", Jel.Date.FORMAT.UK), Jel.Date.FORMAT.US);
        > // "02/23/2006"
        >
        > Jel.Date.format(Jel.Date.parse("23/02/2006 11:50 PM", Jel.Date.FORMAT.UK_12), Jel.Date.FORMAT.UTC);
        > // "2006-23-02 23:50:00"

    Available constants:
        > T_12:                     'g:i A' 
        > T_24:                     'G:i' 
        > T_MILITARY:               'Gi'
        > UK:                       'd/m/Y'
        > US:                       'm/d/Y'
        > UK_12:                    'd/m/Y g:i A'
        > US_12:                    'm/d/Y g:i A'
        > UK_24:                    'd/m/Y G:i'
        > US_24:                    'm/d/Y G:i'
        > UK_12_SHORT:              'd/m/Y g A'
        > US_12_SHORT:              'm/d/Y g A'
        > UK_24_SHORT:              'd/m/Y G'
        > US_24_SHORT:              'm/d/Y G'
        > UK_12_LONG:               'd/m/Y g:i:s A'
        > US_12_LONG:               'm/d/Y g:i:s A'
        > UK_24_LONG:               'd/m/Y G:i:s'
        > US_24_LONG:               'm/d/Y G:i:s'
        > UTC:                      'Y-m-d G:i:s'
        > UTC_T:                    'Y-m-dTG:i:s'
        > UTC_Y:                    'Y'
        > UTC_YM:                   'Y-m'
        > UTC_YMD:                  'Y-m-d'
        > UTC_YMDHM:                'Y-m-d g:i'
        > UTC_YMDHMS:               'Y-m-d g:i:s'
        > SHORT_MONTH:              'd M Y',
        > SHORT_MONTH_12:           'd M Y g:i A'
        > SHORT_MONTH_24:           'd M Y G:i'
        > SHORT_MONTH_PHRASE:       'jS M Y'
        > SHORT_MONTH_PHRASE_12:    'jS M Y g:i A'
        > SHORT_MONTH_PHRASE_24:    'jS M Y G:i'

    See also:
        <http://www.w3.org/TR/NOTE-datetime> has more information about the UTC (Coordinated Universal Time) standard formats
*/

Jel.Date.FORMAT =
{ 
    T_12:           'g:i A', 
    T_24:           'G:i', 
    T_MILITARY:     'Gi',
    UK:             'd/m/Y',
    US:             'm/d/Y',
    UK_12:          'd/m/Y g:i A',
    US_12:          'm/d/Y g:i A',
    UK_24:          'd/m/Y G:i',
    US_24:          'm/d/Y G:i',
    UK_12_SHORT:    'd/m/Y g A',
    US_12_SHORT:    'm/d/Y g A',
    UK_24_SHORT:    'd/m/Y G',
    US_24_SHORT:    'm/d/Y G',
    UK_12_LONG:     'd/m/Y g:i:s A',
    US_12_LONG:     'm/d/Y g:i:s A',
    UK_24_LONG:     'd/m/Y G:i:s',
    US_24_LONG:     'm/d/Y G:i:s',
    UTC:            'Y-m-d G:i:s',
    UTC_T:          'Y-m-dTG:i:s',
    UTC_Y:          'Y',
    UTC_YM:         'Y-m',
    UTC_YMD:        'Y-m-d',
    UTC_YMDHM:      'Y-m-d g:i',
    UTC_YMDHMS:     'Y-m-d g:i:s',
    SHORT_MONTH:    "d M Y",
    SHORT_MONTH_12: "d M Y g:i A",
    SHORT_MONTH_24: "d M Y G:i",
    SHORT_MONTH_PHRASE: "jS M Y",
    SHORT_MONTH_PHRASE_12: "jS M Y g:i A",
    SHORT_MONTH_PHRASE_24: "jS M Y G:i"
};

/* 
    Property: HUMAN_FORMAT 
        a hash collection of *common date format string constants* as usually *expressed by humans*, with each constant being equivalent to those in <Jel.Date.FORMAT>

    Available constants:
        > T_12:                     'h:mm AM/PM' 
        > T_24:                     'hh:mm (24 hour)'
        > T_MILITARY:               'hmm (military time)' 
        > UK:                       'dd/mm/yyyy'
        > US:                       'mm/dd/yyyy'
        > UK_12:                    'dd/mm/yyyy h:mm AM/PM'
        > US_12:                    'mm/dd/yyyy h:mm AM/PM'
        > UK_24:                    'dd/mm/yyyy hh:mm (24 hour)'
        > US_24:                    'mm/dd/yyyy hh:mm (24 hour)'
        > UK_12_SHORT:              'dd/mm/yyyy h AM/PM'
        > US_12_SHORT:              'mm/dd/yyyy h AM/PM'
        > UK_24_SHORT:              'dd/mm/yyyy h (24 hour)'
        > US_24_SHORT:              'mm/dd/yyyy h (24 hour)'
        > UK_12_LONG:               'dd/mm/yyyy h:mm:ss AM/PM'
        > US_12_LONG:               'mm/dd/yyyy h:mm:ss AM/PM'
        > UK_24_LONG:               'dd/mm/yyyy h:mm:ss (24 hour)'
        > US_24_LONG:               'mm/dd/yyyy h:mm:ss (24 hour)'
        > UTC:                      'yyyy-mm-dd hh:mm:ss (24 hour)'
        > UTC:                      'yyyy-mm-dd hh:mm:ss (24 hour)'
        > UTC_T:                    'yyyy-mm-ssThh:mm:ss (24 hour)'
        > UTC_Y:                    'yyyy'
        > UTC_YM:                   'yyyy-mm'
        > UTC_YMD:                  'yyyy-mm-dd'
        > UTC_YMDHM:                'yyyy-mm-dd hh:mm (24 hour)'
        > UTC_YMDHMS:               'yyyy-mm-dd hh:mm:ss (24 hour)'
        > SHORT_MONTH:              "dd mmm yyyy"
        > SHORT_MONTH_12:           "dd mmm yyyy hh:mm AM/PM"
        > SHORT_MONTH_24:           "dd mmm yyyy hh:mm (24 hour)"
        > SHORT_MONTH_PHRASE:       "d(th) mmm yyyy"
        > SHORT_MONTH_PHRASE_12:    "d(th) mmm yyyy hh:mm AM/PM"
        > SHORT_MONTH_PHRASE_24:    "d(th) mmm yyyy hh:mm (24 hour)"

*/
    
Jel.Date.HUMAN_FORMAT = 
{
    T_12:           'h:mm AM/PM', 
    T_24:           'h:mm (24 hour)', 
    T_MILITARY:     'hmm (military time)',
    UK:             'dd/mm/yyyy',
    US:             'mm/dd/yyyy',
    UK_12:          'dd/mm/yyyy h:mm AM/PM',
    US_12:          'mm/dd/yyyy h:mm AM/PM',
    UK_24:          'dd/mm/yyyy hh:mm (24 hour)',
    US_24:          'mm/dd/yyyy hh:mm (24 hour)',
    UK_12_SHORT:    'dd/mm/yyyy h AM/PM',
    US_12_SHORT:    'mm/dd/yyyy h AM/PM',
    UK_24_SHORT:    'dd/mm/yyyy h (24 hour)',
    US_24_SHORT:    'mm/dd/yyyy h (24 hour)',
    UK_12_LONG:     'dd/mm/yyyy h:mm:ss AM/PM',
    US_12_LONG:     'mm/dd/yyyy h:mm:ss AM/PM',
    UK_24_LONG:     'dd/mm/yyyy h:mm:ss (24 hour)',
    US_24_LONG:     'mm/dd/yyyy h:mm:ss (24 hour)',
    UTC:            'yyyy-mm-dd hh:mm:ss (24 hour)',
    UTC:            'yyyy-mm-dd hh:mm:ss (24 hour)',
    UTC_T:          'yyyy-mm-ssThh:mm:ss (24 hour)',
    UTC_Y:          'yyyy',
    UTC_YM:         'yyyy-mm',
    UTC_YMD:        'yyyy-mm-dd',
    UTC_YMDHM:      'yyyy-mm-dd hh:mm (24 hour)',
    UTC_YMDHMS:     'yyyy-mm-dd hh:mm:ss (24 hour)',
    SHORT_MONTH:    "dd mmm yyyy",
    SHORT_MONTH_12: "dd mmm yyyy hh:mm AM/PM",
    SHORT_MONTH_24: "dd mmm yyyy hh:mm (24 hour)",
    SHORT_MONTH_PHRASE: "d(th) mmm yyyy",
    SHORT_MONTH_PHRASE_12: "d(th) mmm yyyy hh:mm AM/PM",
    SHORT_MONTH_PHRASE_24: "d(th) mmm yyyy hh:mm (24 hour)"
};

Jel.Date.PARSE_REG_EXP = 
{
    d: "30|31|(?:[0-2][0-9])",
    D: Jel.Lang.Date.DAYS_SHORT.join("|"),
    j: "30|31|(?:[12]?[0-9])",
    l: Jel.Lang.Date.DAYS.join("|"),
    N: "[1-7]",
    S: "st|nd|rd|th",
    W: "50|51|52|(?:[1234]?[0-9])",
    F: Jel.Lang.Date.MONTHS.join("|"),
    m: Jel.Date.PARSE_REG_EXP_COMMON.LEADING_1_12,
    M: Jel.Lang.Date.MONTHS_SHORT.join("|"),
    n: Jel.Date.PARSE_REG_EXP_COMMON.NO_LEADING_1_12,
    t: "28|29|30|31",
    Y: "[0-9]{4}",
    y: "[0-9]{2}",
    a: "am|pm",
    A: "AM|PM",
    B: "[0-9]{1,3}",
    g: Jel.Date.PARSE_REG_EXP_COMMON.NO_LEADING_1_12,
    G: "20|21|22|23|(?:[1]?[1-9])",
    h: Jel.Date.PARSE_REG_EXP_COMMON.LEADING_1_12,
    H: "20|21|22|23|(?:[01]?[1-9])",
    i: Jel.Date.PARSE_REG_EXP_COMMON.BOTH_0_59,
    s: Jel.Date.PARSE_REG_EXP_COMMON.BOTH_0_59
};

Jel.Date.PARSE_REG_EXP.c = Jel.Date.PARSE_REG_EXP.Y + "\-" + Jel.Date.PARSE_REG_EXP.m + "\-" + Jel.Date.PARSE_REG_EXP.d + "T" + Jel.Date.PARSE_REG_EXP.H + ":" + Jel.Date.PARSE_REG_EXP.i + ":" + Jel.Date.PARSE_REG_EXP.s;
        
/*
    Method: parse
        *parses a date string* into a JavaScript Date object *assuming a specified date format*.
        
    Arguments:
        str - string, the string to parse.
        format - string, describes the format of the input string.
                Note that this can contain any arbritrary characters except the reserved formatting characters listed below 
                (these characters are based on formatting characters used for in the *PHP date function*)
    
    Example:
        > Jel.Date.parse("23/04/2006", "d/m/Y");
        > // [Date object with day = 23, month = 3, year = 2006]
        >  
        > Jel.Date.parse("23 Feb 2006", "d/m/Y");
        > // false, not in expected format  
    
    Returns:
        Date object - if the date string is in the specified format, and it is a real date in the Gregorian calendar
        false - otherwise
        
    Formatting characters:
    >   d  Day of the month, 2 digits with leading zeros:                       01 - 31
    >   D  A textual representation of a day, three letters:                    Mon - Sun
    >   j  Day of the month without leading zeros:                              1 - 31
    >   l  A full textual representation of the day of the week:                Sunday - Saturday
    >   S  English ordinal suffix for the day of the month, 2 characters:       st, nd, rd or th.
    >   F  A full textual representation of a month, such as January or March:  January - December
    >   m  Numeric representation of a month, with leading zeros:               01 - 12
    >   M  A short textual representation of a month, three letters:            Jan - Dec
    >   n  Numeric representation of a month, without leading zeros:            1 - 12
    >   Y  A full numeric representation of a year, 4 digits: Examples:         1999 or 2003
    >   y  A two digit representation of a year:                                Examples:  99 or 03
    >   a  Lowercase Ante meridiem and Post meridiem:                           am / pm 
    >   A  Uppercase Ante meridiem and Post meridiem:                           AM / PM
    >   g  12-hour format of an hour without leading zeros:                     1 - 12
    >   G  24-hour format of an hour without leading zeros:                     0 - 23
    >   h  12-hour format of an hour with leading zeros:                        01 - 12 
    >   H  24-hour format of an hour with leading zeros:                        00 - 23 
    >   i  Minutes with leading zeros:                                          00 - 59 
    >   s  Seconds, with leading zeros:                                         00 - 59

    See also: 
        <Jel.Date.format>, <Jel.Date.FORMAT>
*/

Jel.Date.parse = function(str, format)
{
    // first task is to check that the date is formatted as specified in format
    // any deviations from this format will result in parse failure
    
    // build the equivalent regular expression pattern from the format string
    
    var matchIndices = new Object(); 
    
    var now = new Date();
    
    var day = now.getDate();
    var month = now.getMonth();
    var year = Jel.Date.fullYear(now);
    
    var hour = 0;
    var minute = 0;
    var second = 0;
    var meridiem = 'AM';
    
    var pattern = '';
    
    for (var i=0; i<format.length; i++)
    {
        var part = format.charAt(i);
        
        var matchKey = '';
        
        // record parts of the string that represent day, month, year, so that we can check combinational validity
        switch (part)
        {
            case 'd':
            {
            }
            case 'j':
            {
                matchKey = 'day';
                break;
            }
            case 'm':
            case 'F':
            case 'M':
            case 'n':
            {
                matchKey = 'month';
                break;
            }
            case 'y':
            case 'Y':
            {
                matchKey = 'year';
                break;
            }
            case 'g':
            case 'G':
            case 'h':
            case 'H':
            {
                matchKey = 'hour';
                break;
            }
            case 'i':
            {
                matchKey = 'minute';
                break;
            }
            case 's':
            {
                
                matchKey = 'second';
                break;
            }
            case 'a':
            case 'A':
            {
                matchKey = 'meridiem';
                break;
            }
            
        }

        //debugger;
        
        if (matchKey)
            matchIndices[matchKey] = { index: i + 1, format: part };
    
        var pre = Jel.Date.PARSE_REG_EXP[part];
    
        if (pre)
            pattern = pattern + "(" + pre + ")";
        else
            pattern = pattern + "(" + part + ")";
    }
    
    var matches = str.match(new RegExp(pattern, "i"));
    
        
    if (matches)
    {
        // only check further for a real date if our format appears correct
        
        if (matchIndices['day'] && matchIndices['month'] && matchIndices['year'])
        {
            // check that the date is valid by extracting all parts
            day = Jel.String.extractInt(matches[matchIndices['day'].index]);
            
            if (matchIndices['month'].format == 'F')
                month = Jel.Lang.Date.MONTHS_LCASE.indexOf(matches[matchIndices['month'].index].toLowerCase());
            else if (matchIndices['month'].format == 'M')
                month = Jel.Lang.Date.MONTHS_SHORT_LCASE.indexOf(matches[matchIndices['month'].index].toLowerCase());
            else
                month = Jel.String.extractInt(matches[matchIndices['month'].index]) - 1;
        
            if (matchIndices['year'].format == 'Y')
                year = Jel.String.extractInt(matches[matchIndices['year'].index]);
            else
            {
                var yearValue = Jel.String.extractInt(matches[matchIndices['year'].index]);
            
                if (yearValue >= 69)
                {
                    year = Jel.String.extractInt("19" + Jel.Number.leadingZero(yearValue));
                }
                else
                {
                    year = Jel.String.extractInt("20" + Jel.Number.leadingZero(yearValue));
                }
            }    

            if (!Jel.Date.validDayMonthYear(day, month, year))
                return false;
        }
        
        // now check for any time components
        
        if (matchIndices['meridiem'])
            meridiem = matches[matchIndices['meridiem'].index].toUpperCase();
        
        if (matchIndices['hour'])
        {
            hour = Jel.String.extractInt(matches[matchIndices['hour'].index]);

            if (matchIndices['hour'].format == 'g' || matchIndices['hour'].format == 'h')
            {
                // consider the meridiem
                
                if (meridiem == 'AM')
                {
                    if (hour == 12)
                        hour = 0;
                }
                else
                {
                    if (hour != 12)
                        hour = hour + 12;
                }
            }   
        }
        
        
        if (matchIndices['minute'])
            minute = Jel.String.extractInt(matches[matchIndices['minute'].index]);

        if (matchIndices['second'])
            second = Jel.String.extractInt(matches[matchIndices['second'].index]);
        
        return new Date(year, month, day, hour, minute, second);
    }

    return false; 
};

/*
    Method: format
        formats the given date as a string using the date format in *format*.
        
    Arguments:
        date   - Date, the date to format
        format - string, describes the format of the output string using the reserved formatting characters listed below. Any other
                characters present will simply appear in the output string in the same place. 
    
    Returns:
        string - containing the formatted date
    
    Example:
        > Jel.Date.format(new Date(2007, 2, 2), "d/m/Y"); // 02/03/2007  
        > Jel.Date.format(new Date(2007, 2, 2), "jS M Y"); // 2nd March 2007  
    
    Formatting characters (based on formatting characters used in the *PHP date function*):

    >   d	Day of the month, 2 digits with leading zeros:                      01 - 31
    >   D	A textual representation of a day, three letters:                   Mon - Sun
    >   j	Day of the month without leading zeros:                             1 - 31
    >   l   A full textual representation of the day of the week:               Sunday - Saturday
    >   N   ISO-8601 numeric representation of the day of the week:             1 (for Monday) - 7 (for Sunday)
    >   S	English ordinal suffix for the day of the month, 2 characters:      st, nd, rd or th.
    >   w	Numeric representation of the day of the week:                      0 (for Sunday) - 6 (for Saturday)
    >   z	The day of the year (starting from 0):                              0 - 365
    >   F	A full textual representation of a month:	                        January - December
    >   m	Numeric representation of a month, with leading zeros:              01 - 12
    >   M	A short textual representation of a month, three letters:           Jan - Dec
    >   n	Numeric representation of a month, without leading zeros:           1 - 12
    >   t	Number of days in the given month:                                  28 - 31
    >   L	Whether it's a leap year:                                           1 (leap year), 0 (otherwise). 
    >   Y	A full numeric representation of a year, 4 digits:                  Examples: 1999 or 2003
    >   y	A two digit representation of a year:                               Examples: 99 or 03
    >   a	Lowercase Ante meridiem and Post meridiem:                          am / pm 
    >   A	Uppercase Ante meridiem and Post meridiem:                          AM / PM
    >   B	Swatch Internet time:                                               000 through 999
    >   g	12-hour format of an hour without leading zeros:                    1 - 12
    >   G	24-hour format of an hour without leading zeros:                    0 - 23
    >   h	12-hour format of an hour with leading zeros:                       01 - 12 
    >   H	24-hour format of an hour with leading zeros:                       00 - 23 
    >   i	Minutes with leading zeros:                                         00 - 59 
    >   s	Seconds, with leading zeros:                                        00 - 59
    >   c	ISO 8601 date:                                                      Example: 2004-02-12T15:19:21+00:00 
    >   r	RFC 2822 formatted date:                                            Example - Thu, 21 Dec 2000 16:01:07 +0200

    See also: <Jel.Date.parse>, <Jel.Date.FORMAT>
*/

Jel.Date.format = function(date, format)
{
	var ret = '';
    
	for (var i=0; i<format.length; i++)
	{	
		var chr = format.charAt(i);

		switch (chr)
		{
			case 'd' :
			{
				ret += Jel.Number.leadingZero(date.getDate());
				break;
			}
			case 'D' :
			{
				ret += Jel.Lang.Date.DAYS_SHORT[date.getDay()];
				break;
			}	
			case 'j' :
			{
				ret += date.getDate();
				break;
			}
			case 'l' :
			{
				ret += Jel.Lang.Date.DAYS[date.getDay()];
				break;
			}
			case 'N' :
			{
				var date = date.getDate();
				ret += (date == 0 ? 7 : date);
				break;
			}	
			case 'S' :
			{
				ret += Jel.Date.ordinalSuffix(date.getDate());
				break;
			}	
			case 'w' :
			{
				ret += date.getDate();
				break;
			}
			case 'z' :
			{
				ret += Jel.Date.dayOfYear(date);
				break;
			}
			case 'F' :
			{
				ret += Jel.Lang.Date.MONTHS[date.getMonth()];
				break;
			}
			case 'm' :
			{
				ret += Jel.Number.leadingZero(date.getMonth() + 1);
				break;
			}
			case 'M' :
			{
				ret += Jel.Lang.Date.MONTHS_SHORT[date.getMonth()];
				break;
			}
			case 'n' :
			{
				ret += date.getMonth() + 1;
				break;
			}
			case 't' :
			{
				ret += Jel.Date.daysInMonth(date.getMonth(), Jel.Date.fullYear(date));
				break;
			}
			case 'L' :
			{
				ret += Jel.Date.isLeapYear(Jel.Date.fullYear(date)) ? 1 : 0;
				break;
			}
			case 'Y' :
			{
				ret += Jel.Date.fullYear(date);
				break;
			}
			case 'y' :
			{
				ret += Jel.Date.fullYear(date).toString().substr(2, 2);
				break;
			}
			case 'a' :
			{
				ret += Jel.Date.meridiem(date.getHours());
				break;
			}
			case 'A' :
			{
				ret += Jel.Date.meridiem(date.getHours()).toUpperCase();
				break;
			}
			case 'B' :
			{
				ret += Jel.Date.internetBeat(date);
				break;
			}
			case 'g' :
			{
				ret += Jel.Date.twelveHour(date.getHours());
				break;
			}
			case 'G' :
			{
				ret += date.getHours();
				break;
			}
			case 'h' :
			{
				ret += Jel.Number.leadingZero(Jel.Date.twelveHour(date.getHours()));
				break;
			}
			case 'H' :
			{
				ret += Jel.Number.leadingZero(date.getHours());
				break;
			}
			case 'i' :
			{
				ret += Jel.Number.leadingZero(date.getMinutes());
				break;
			}
			case 's' :
			{
				ret += Jel.Number.leadingZero(date.getSeconds());
				break;
			}
			case 'c' :
			{
				ret += Jel.Date.format(date, 'Y-m-dTH:i:s');
				break;
			}
			case 'r' :
			{
				ret += date.toString();
				break;
			}

			default: 
				ret += chr;
    	}
    }
    
	return ret;
};

/*
    Method: convert
        converts a *date string from one format to another*. Essentially performs <Jel.Date.parse> on a given string, followed by <Jel.Date.format> on the return date object
        
    Arguments:
        str - string, the original date string to parse
        fromFormat - the expected format of the date in *str* (refer to <Jel.Date.parse> for valid formatter characters)
        toFormat - the desired output format  (refer to <Jel.Date.format> for valid formatter characters)
    
    Returns:
        string - the formatted date, if both the original date string was in the expected format, and the parsed date was a real date
        false - otherwise 
    
    Examples:
        > Jel.Date.convert("28 Feb 2006 2PM", "j M Y gA", Jel.Date.FORMAT.UK_12);        
        > // "28/02/2006 2:00 PM"
        >
        > Jel.Date.convert("30/04/2007 10:00 PM", Jel.Date.FORMAT.US_12, "js M Y, gA");  
        > // "30th April 2007, 10PM"
        >
        > Jel.Date.convert("31/02/2007 10:00 PM", Jel.Date.FORMAT.US_12, "js M Y, gA");  
        > // false, form format correct, but not a real date
        >
        > Jel.Date.convert("31st March 2006", "d/m/Y", "js M Y, gA");                
        > // false, from format is incorrect
*/

Jel.Date.convert = function(str, fromFormat, toFormat)
{
    var date = Jel.Date.parse(str, fromFormat);
    
    if (date)
        return Jel.Date.format(date, toFormat);
        
    return false;
};

 /*
    Method: now
        gets a *Date object* representing the *current date*, with an optional *format* string. 
        
    Arguments:
        format - String (optional), if provided, will return a string of the current date in this format , using <Jel.Date.format>
    
    Returns:
        Date - if format is not specified
        String - otherwise
*/

Jel.Date.now = function(format)
{
    if (format)
    {
        return Jel.Date.format(new Date(), format);
    }
    else
    {
        return new Date();
    }
};

 /*
    Method: daysInMonth
        gets the *number of days* for a *given month* and *year*.

    Arguments:
        month - integer, the month of the year 0-11 (not 1-12, as standard in JavaScript)
        year - integer, the 4 digit year
        
    Returns:
        integer
    
    Examples: 
        > Jel.Date.daysInMonth(2, 2006); // 31
*/

Jel.Date.daysInMonth = function(month, year)
{
    switch (month)
	{
		case 8:
		case 3:
		case 5:
		case 10:
		{
			return 30;
			break;
		}
		case 1:
	    {
			return (Jel.Date.isLeapYear(year) ? 29 : 28);
			break;
		}
		default:
		{
			return 31;
		}
	}
};

 /*
    Method: isLeapYear
        checks *if a given year* is a *leap year*

    Arguments:
        year - integer, the 4 digit year
        
    Returns:
        true - if the year is a leap year
        false - otherwise
    
    Examples: 
        > Jel.Date.isLeapYear(2004); // true
        > Jel.Date.isLeapYear(2006); // false
*/

Jel.Date.isLeapYear = function(year)
{
    return year % 4 == 0;
};

 /*
    Method: validDayMonthYear
        checks *if a given day, month, and year* combination is a *valid date* in the Gregorian calendar

    Arguments:
        month - integer, the month of the year 0-11 (not 1-12, as standard in JavaScript)
        year - integer, the 4 digit year
        
    Returns:
        true - if the combination is a valid day, month, and year combination
        false - otherwise
*/

Jel.Date.validDayMonthYear = function(day, month, year)
{
    if (isNaN(day) || isNaN(month) || isNaN(year))
        throw("day, month, and year must all be integer values");
        
    return day > 0 && day <= Jel.Date.daysInMonth(month, year);
};

 /*
    Method: meridiem
        gets the *ante/post meridiem* (*am* or *pm*) for a *given hour*

    Arguments:
        hour - integer, the hour of the day in 24-hour time (0-23) 
        
    Returns:
        string - "am" or "pm"
    
    Examples:
        > Jel.Date.meridiem(0); // "am"
        > Jel.Date.meridiem(5); // "am"
        > Jel.Date.meridiem(12); // "pm"
        > Jel.Date.meridiem(17); // "pm"
*/

Jel.Date.meridiem = function(hour)
{
	return hour < 12 ? 'am' : 'pm';    
};

/*
    Method: twelveHour
        gets the twelve hour value for the given *hour*
        
    Arguments:
        hour - integer an hour from 0-23 (24 hour time)
    
    Examples:
        >Jel.Date.twelveHour(0); // 12
        >Jel.Date.twelveHour(4); // 4
        >Jel.Date.twelveHour(12); // 12
        >Jel.Date.twelveHour(13); // 1
        >Jel.Date.twelveHour(18); // 6
*/

Jel.Date.twelveHour = function(hour)
{
    if (hour == 0)
        return 12;
    else if (hour > 12)
        return hour - 12;
    else
        return hour;
}; 

/*
    Method: ordinalSuffix
        gets the *English ordinal suffix* for a given day *(st, nd, rd, th)*
    
    Arguments:
        day - Integer

    Returns: 
        string
        
    See also: 
        <Jel.Number.ordinalSuffix>
    
    Example:
        Jel.Date.ordinalSuffix(5) // th
*/

Jel.Date.ordinalSuffix = function(day)
{
	return Jel.Number.ordinalSuffix(day);
};

/*
    Method: fullYear
        gets the *full 4-digit year* for *this* Date object

    Arguments:
        date - Date object

    Returns: integer
    
    Example:
        > Jel.Date.fullYear(new Date(2007, 6, 30));    // 2007

    Credit:
        Thanks to Peter-Paul Koch of http://www.quirksmode.org/ for the basis of this code
*/

Jel.Date.fullYear = function(date) 
{
    var x = date.getYear();

    var y = x % 100;

    y += (y < 38) ? 2000 : 1900;

    return y;
};

/*
    Method: dayOfYear
        gets the *day of the year* for the given date

    Arguments:
        date - Date object

    Returns: integer
        
    Example:
        > Jel.Date.dayOfYear(new Date(2007, 6, 30));    // 211
        
*/

Jel.Date.dayOfYear = function(date)
{
    var month = date.getMonth();
    var day = date.getDate();
    var daysElapsed = 0;
    
    for (var i=0; i<month; i++)
    {
        daysElapsed += Jel.Date.daysInMonth(i);
    }   
    
    return daysElapsed + day;
};

/*
    Method: internetBeat
        gets the *Swatch internet time* for the given date object 

    Arguments:
        date - Date object

    Returns: integer
    
    Example:
        > Jel.Date.internetBeat(new Date(2007, 06, 30, 20, 40, 0));    // 486

    Credit:
        Thanks to Peter-Paul Koch of http://www.quirksmode.org/ for this code
*/

Jel.Date.internetBeat = function(date)
{
	var off = (date.getTimezoneOffset() + 60)*60;

	var theSeconds = (date.getHours() * 3600) + (date.getMinutes() * 60) + date.getSeconds() + off;

	var beat = Math.floor(theSeconds/86.4);

	if (beat > 1000) 
		beat -= 1000;

	if (beat < 0) 
		beat += 1000;

	return beat;
};/*
Class: Jel.Number
    *Utility Methods* for manipulating JavaScript's *built-in Number class*
*/

Jel.Number = 
{
    /*
        Method: leadingZero
            gets a *string representation* for a given number *padded out with leading zeros to a given length*

        Arguments:
            number - Number, the number to append leading zeros to
            toLength - integer, optional, the total length of the final leading-zero-padded string. 
                      If not specified, defaults to a length of 2

        Examples:
            > Jel.Number.leadingZero(1);        // 01
            > Jel.Number.leadingZero(1, 3);     // 001
            > Jel.Number.leadingZero(10, 3);    // 010
            > Jel.Number.leadingZero(1000, 3);  // 1000

    */
    
    leadingZero: function(number, toLength)
    {
        return Jel.String.repeat('0', (toLength || 2) - number.toString().length) + number.toString();
    },

    /*
        Method: ordinalSuffix
            gets the English ordinal suffix for a given number *(st, nd, rd, th)*
    
        Arguments:
            number - Number, the value to get the ordinal suffix for
            
        Example:
            > Jel.Number.ordinalSuffix(2);    // "st"
            > Jel.Number.ordinalSuffix(2);    // "nd"
            > Jel.Number.ordinalSuffix(23);   // "rd"
            > Jel.Number.ordinalSuffix(11);   // "th"
            > Jel.Number.ordinalSuffix(14);   // "th"
    */

    ordinalSuffix: function(number)
    {
        var str = Math.round(number).toString();
        var rem = Math.round(number) % 10;
    
        // first, special case for teen numbers (which are always "th")
    
        if (Jel.String.right(str, 2))
            if (Jel.String.right(str, 2).length == 2 && Jel.String.left(Jel.String.right(str, 2), 1) == "1")
                return "th";
    
        switch (rem)
        {
            case 1:
            {
                return "st";
                break;
            }
            case 2:
            {
                return "nd";
                break;
            }
            case 3:
            {
                return "rd";
                break;
            }
            default:
                return "th";
        }
    },

    /*
        Method: format
            *formats a given number* in a *specified display format*

        Arguments:
            number - Number object, the number to format
            format - string, describes the format of the output string (see examples below)
    
        Returns:
            string - the formatted output string
        
        Examples:
            > Jel.Number.format(3129.95, "$#,###.##");  // $3,129.95   
            > Jel.Number.format(3129.95, "$####.##");   // $3129.95 	  
            > Jel.Number.format(329.95, "$#####.##");   // $329.95 	  
            > Jel.Number.format(329, "$###");           // $329 		  
            > Jel.Number.format(-329, "(###)");         // (329)		  
            > Jel.Number.format(-1234.95, "#,##0.##");  // -1,234.95	  
            > Jel.Number.format(0.01, "#.##");          // 01		  
            > Jel.Number.format(0.01, "#.###");         // 010		  
            > Jel.Number.format(0.01, "0.##");          // 0.01		  
            > Jel.Number.format(2, "00");               // 02		  
            > Jel.Number.format(2345, "00000");         // 02345		  
            > Jel.Number.format(45, "00000");           // 00045
        
        Formatting Rules:
            > # - substitutes for a number, but only if this position has a definite non-zero number here
            > 0 - substitutes for a number always, using zero if this position has no definite non-zero number here
        
    
    */

    format: function(number, format)
    {
        var formatted;
    	var formattedDec = '';
    	var formattedWhole = '';

    	var strWhole;

    	var value = Math.abs(number);
    	var valueWhole = Math.floor(value);

    	var formatter = format;

    	var parenthesis = false;

    	// check if negative values should use parenthesis formatting

    	var matches = formatter.match(/\((.*?)\)/, "ig");

    	if (matches && matches.length > 0)
    	{
    		parenthesis = true;

    		// take the rest of the string as the actual formatter
    		formatter = matches[1];
    	}

    	var formatterWhole = formatter;

    	var parts = formatter.split(".");

    	if (parts.length > 1)
    	{
    		// the string has a decimal part
    		value = value.toFixed(parts[1].length);	

    		formatterWhole = parts[0];
    	}
    	else
    	{
    		valueWhole = Math.round(value);	
    	}

    	// now work out how to format the whole number part
    	formatted = value.toString();

    	if (parts.length > 1)
    	{
    		formattedDec = "." + formatted.split(".")[1];
    	}

    	strWhole = Math.abs(valueWhole).toString();

    	// first, pad out formatterWhole up to the length of valueWhole, with #  

    	var count = 0;

    	formatterWhole.toArray().each
    	(
    		function (chr)
    		{
    			if (chr == '#' || chr == '0')
    				count++;
    		}
    	);

    	matches = formatterWhole.match(/[^#0,]*?([#0,]+)[^#0,]*?/);

    	if (matches.length > 1)
    	{
    		formatterWhole = formatterWhole.replace(matches[1], String.stringOfChar('#', strWhole.length - count) + matches[1]);
    	}

    	var formatterChars = formatterWhole.toArray();

    	var digitIndex = strWhole.length - 1;

    	for (var i = formatterChars.length - 1; i>=0; i--)
    	{
    		// process each character in the formatter string 

    		var chr = formatterChars[i];
    		var ten = Math.pow(10, strWhole.length - 1 - digitIndex);


    		if (chr == '#')
    		{
    			if (valueWhole >= ten)
    			{
    				formattedWhole = strWhole.substr(digitIndex, 1) + formattedWhole;
    			} 
    			// otherwise add nothing
    			digitIndex = digitIndex - 1;	
    		}
    		else if (chr == '0')
    		{
    			if (valueWhole >= ten)
    			{
    				formattedWhole = strWhole.substr(digitIndex, 1) + formattedWhole;
    			} 
    			else
    			{
    				// otherwise add a 0
    				formattedWhole = '0' + formattedWhole;
    			}
	
    			digitIndex = digitIndex - 1;
    		}
    		else if (chr == ',')
    		{
    			if (valueWhole >= ten)
    			{
    				formattedWhole = chr + formattedWhole;
    			}
    		}
    		else
    		{
    			formattedWhole = chr + formattedWhole;
    		}
    	}

    	// apply the parenthesis if the original value is negative

    	if (number < 0)
    	{
    		if (parenthesis)
    			return '(' + formattedWhole + formattedDec + ')';
    		else
    			return '-' + formattedWhole + formattedDec;
    	}

    	return (formattedWhole + formattedDec);
    }
};/* 

    Class: Element
        Extensions to Prototype's Element class

    Function: swapClassName
        Swaps a given class name on an element to a different class name, with a check to work out which class name an element currenly has first. That is, if the element is of class className1, that will be replaced by className2, and vice-versa.
    
    Parameters:
        element - Element, the form element to swap class names on
        className1 - String, the first class name
        className2 - String, the second class name
    
    Example:
        > Element.swapClassName($('name'), "culprit", "valid");
*/

Element.swapClassName = function(element, className1, className2)
{
    if (Element.hasClassName(element, className1))
    {
        Element.removeClassName(element, className1);
        Element.addClassName(element, className2);
    }
    else if (Element.hasClassName(element, className2))
    {
        Element.removeClassName(element, className2);
        Element.addClassName(element, className1);
    }
};

/*
    Function: findParent
        Attempts to finds a parent for a given element that matches a partial selector string.  If the element itself matches the selector, it is returned instead.
        This can be particularly useful in mouse event handlers, where the element that fires the event tends to be the deepest element in the DOM, and you want to update a containing element.
    
    Parameters:
        element - Element, the base element to search from
        selector - String, a partial selector to find a parent element (or the element itself if it matches). This is partial in the sense that it is a specific tagName with className, and/or ID only
    
    Example:
        > function navItemOnMouseClick(event)
        > {
        >     var element = Event.element(event);
        >     var navItem = Element.findParent(element, "a.nav-item");
        >     // now you can operate on the link, if for example there were span tags inside each link, which might be in "element"
        > }
*/

Element.findParent = function(element, selector)
{
	// check if the id or class has been specified

	var matches;
	var className;
	var id;
	var useSelector;
	
	// check for the class name
	matches = selector.match(/\.([\w\-]+)/i);
	
	if (matches)
		className = matches[1];
	
	// check for the id
	matches = selector.match(/\#([\w\-]+)/i);
	
	if (matches)
		id = matches[1];
	
	// extract tag name
	matches = selector.match(/^([\w\-]+)/i);
	
	if (matches)
		useSelector = matches[1];
	else
		useSelector = selector;
			
	return Element._doFindParent(element, useSelector, className, id);
};


Element._doFindParent = function(element, selector, className, id)
{
	var re = new RegExp('^' + selector + '$', 'i');
	
	if (element.tagName)
	{
		if (element.tagName.match(re))
		{
				
			if (className && id)
			{
				if (Element.hasClassName(element, className) && element.id == id)
					return element;
			}
			else if (className)
			{
				
				if (Element.hasClassName(element, className))
					return element;
			}
			else if (id)
			{
				if (element.id == id)
					return element;
			}
			else
				return element;
		}
	}
	else if (element.nodeType == 3)
	{
		// Some browsers even report you being in a text node (Safari 1.3, looking at you)
		// fall through
		
	}
	else 
	{
		// we've reached the document element
		return false;
	}
	
	if (element.parentNode)
		return Element._doFindParent(element.parentNode, selector, className, id);
	else
		return false;
};

/*
    Function: hasParent
        Checks if a given element has a given parent element in the DOM tree. This would generally be most useful in event handlers, when you don't exactly know which element you're dealing with.
        
    Parameters:
        element - Element, the base element to search from
        parent - Element, the parent element to check for

    Returns:
        Boolean - true, if parent is an ancestor of element, false otherwise

    See Also: <findParent>
*/


Element.hasParent = function(element, parent)
{
	return this._findParent(element, parent);
};

Element._findParent = function(element, parent)
{
	if (element == parent)
		return true;
	else
	{
		if (element.parentNode)
		{
			return Element._findParent(element.parentNode, parent);	
		}
		else
			return false;
	}
};/* 

    Class: Form.Element
        Extensions to Prototype's Form.Element class


    Function: setValue
        Sets the value of a form element to a given value, regardless of the type of control it is
    
    Parameters:
        element - Element, the form element to update
        value - String, the new value to set
    
    Credit:
        Form.Element code is based on Form.Element.setValue in prototypeUtils.js from http://jehiah.com/
        Licensed under Creative Commons.
        Version 1.0 December 20 2005

    Example:
        > Form.Element.setValue("title", "Mr");
*/

Form.Element.setValue = function(element, value) 
{
    var element_id = element;
    var element = $(element);

    if (!element)
    {
        element = document.getElementsByName(element_id)[0];
    }
    
    if (!element)
    {
        return false;
    }
    
    var method = element.tagName.toLowerCase();
    var parameter = Form.Element.SetSerializers[method](element, value);
};

Form.Element.SetSerializers = 
{
    input: function(element,newValue) 
    {
        switch (element.type.toLowerCase()) 
        {
            case 'submit':
            case 'hidden':
            case 'password':
            case 'text':
                return Form.Element.SetSerializers.textarea(element,newValue);
            case 'checkbox':
            case 'radio':
                return Form.Element.SetSerializers.inputSelector(element,newValue);
        }
        return false;
    },

    inputSelector: function(element,newValue) 
    {
        fields = document.getElementsByName(element.name);
    
        for (var i=0; i<fields.length; i++)
        {
            fields[i].checked = newValue.split(",").indexOf( fields[i].value ) >= 0;
        }
    },

    textarea: function(element,newValue) 
    {
        element.value = newValue;
    },

    select: function(element,newValue) 
    {
        for (var i=0; i<element.options.length; i++)
        {
            element.options[i].selected = newValue.split(",").indexOf( element.options[i].value ) >= 0;
        }
    }
};

/* 
    Function: isSelect
        Checks whether a given form element is a select
    
    Parameters:
        element - the form element to check
    
    Returns:
        boolean - true if the element is a select, false otherwise
        
    Example:
        > Form.Element.isSelect("title"); // true
    
*/

Form.Element.isSelect = function(element)
{
	return element.tagName.match(/select/i) != null;		
};

/* 
    Function: isTextArea
        Checks whether a given form element is a textarea
    
    Parameters:
        element - the form element to check
    
    Returns:
        boolean - true if the element is a textarea, false otherwise
        
    Example:
        > Form.Element.isSelect("title"); // false
        > Form.Element.isTextArea("notes"); // true
    
*/

	
Form.Element.isTextArea = function(element)
{
	return element.tagName.match(/textarea/i) != null;		
};


/* 
    Function: isInputText
        Checks whether a given form element is an input of type text
    
    Parameters:
        element - the form element to check
    
    Returns:
        boolean - true if the element is a text input, false otherwise
        
    Example:
        > Form.Element.isInputText("name"); // true
    
*/
	
Form.Element.isInputText = function(element)
{
	if (element.getAttribute('type'))
		return element.tagName.match(/input/i) != null && element.getAttribute('type').match(/text/i) != null;	
			
	return element.tagName.match(/input/i) != null; // most browsers regard an input with no "type" as a text field, so we catch this here
};


/* 
    Function: isInputHidden
        Checks whether a given form element is an input of type hidden
    
    Parameters:
        element - the form element to check
    
    Returns:
        boolean - true if the element is a hidden input, false otherwise
        
    Example:
        > Form.Element.isInputHidden("name"); // false
    
*/
	
Form.Element.isInputHidden = function(element)
{
	if (element.getAttribute('type'))
		return element.tagName.match(/input/i) != null && element.getAttribute('type').match(/hidden/i) != null;	
};

/* 
    Function: isInputRadio
        Checks whether a given form element is an input of type radio
    
    Parameters:
        element - the form element to check
    
    Returns:
        boolean - true if the element is a radio button input, false otherwise
        
    Example:
        > Form.Element.isInputRadio("name"); // false
    
*/
	
Form.Element.isInputRadio = function(element)
{
	if (element.getAttribute('type'))
		return element.tagName.match(/input/i) != null && element.getAttribute('type').match(/radio/i) != null;		
	
	// can't be a radio is type attribute is not supplied
	return false;
};

/* 
    Function: isInputCheckbox
        Checks whether a given form element is an input of type checkbox
    
    Parameters:
        element - the form element to check
    
    Returns:
        boolean - true if the element is a checkbox input, false otherwise
        
    Example:
        > Form.Element.isInputCheckbox("agree"); // true
    
*/
	
Form.Element.isInputCheckbox = function(element)
{
	if (element.getAttribute('type'))
		return element.tagName.match(/input/i) != null && element.getAttribute('type').match(/checkbox/i) != null;		
	
	// can't be a checkbox if type attribute is not supplied
	return false;
};/*
Class: Jel.ElementCache
    A utility class to cache the results of CSS selector based queries (since they can be expensive operations) 
*/

Jel.ElementCache = Base.extend
({
    /*
        Function: constructor
            Class Constructor
            
        Parameters:
            selectors - Array, a string array of CSS selectors for the elements you want to cache
            
        Example:
            > var elements = new Jel.ElementCache(["form#contact select", "ul#navigation a"]);

    */
    
    constructor: function(selectors)
    {
        this.selectors = selectors;
        
        this.update();
    },
    
    cacheSelector: function(selector)
    {
        // record this as a direct property under "name"
        this[selector.key] = $$(selector.value);
    },

    
    /*
        Function: update
            updates all selectors with their current values
    */
    
    update: function()
    {
        $H(this.selectors).each
        (
            this.cacheSelector.bind(this)
        );
    }
});
 
 /*
Class: Jel.ObjectPath
    A utility class for creating "reference pointers" to variables by providing an array of object parts
*/

Jel.ObjectPath = Base.extend
({
    /*
        Method: constructor
            Class constructor
        
        Arguments:
            path - String[], a string array of path parts to this object, relative to baseObj
            baseObj - object, the parent object that this path refers to. If not specified "window" is assumed (that is, the global variable scope)
            
        Example:
    		> var cat = { breed: "Rag Doll", name: "Maximus" };
    		>
    		> var catNameRef = new Jel.ObjectPath(["cat", "name"]);
    		> var catName = cat.name;
            > 
    		> cat.name = "Max";
		    > 
    		> alert(catName); // "Maximus" (original value, since assignment is by value)
    		> console.log(catNameRef.get()); // "Max" (updated value, since assignment is by reference)

    */
            
    constructor: function(path, baseObj)
    {
        this.path = path;        
        this.baseObj = baseObj ? baseObj : window;     
    },

    /*
        Method: set
            sets the value of the object described by this ObjectPath
        
        Arguments:
            value - the value to set this object to
    */
    
    set: function(value)
    {
        
        var obj = this.baseObj;
        
        for (var i=0; i<this.path.length - 1; i++)
        {
            if (obj.length) // this must be an array
                obj = obj[parseInt(this.path[i])];
            else    
                obj = obj[this.path[i]];    
        }

        if (obj.length) // this must be an array
            obj[parseInt(this.path[i])] = value;
        else    
            obj[this.path[i]] = value;
        
    },
    
    /*
        Method: get
            gets the value of the object described by this ObjectPath
    */
    
    get: function()
    {
        var obj = this.baseObj;
        
        for (var i=0; i<this.path.length - 1; i++)        
            obj = obj[this.path[i]];
        
        return obj[this.path[i]];        
    }
});

Jel.ObjectPath.prototype.setValue = Jel.ObjectPath.prototype.set;
Jel.ObjectPath.prototype.getValue = Jel.ObjectPath.prototype.get;
/* 
Class: Jel.Validator
    A collection of validation routines (also used by <Jel.FormValidator>)  
*/

Jel.Validator = Base.extend
(
    {},
    {
    checkValid: function(condition, value)
    {
        var check = { value: value };
        return condition ? check : false;
    },
    
    convertValue: function(value, info)
    {
        if (info && info.type)
        {
            switch (info.type)
            {
                case "int":
                {
                    return parseInt(value);
                    break;
                }
                case "float":
                case "numeric":
                {
                    return parseFloat(value);
                    break;
                }
                case "date":
                {
                    if (info.format)
                        return Jel.Date.parse(value, info.format);
                }
            };
        };
        
        var convertedValue = (value && value.toString ? value.toString() : value);
        
        if (info.caseInsensitive && convertedValue.toLowerCase)
            convertedValue = convertedValue.toLowerCase();

        return convertedValue;
    },
    
    /* Group: length-checking */
    
    /*
        Method: required
            checks if a *string value* is *not an empty string* 
        
        Arguments:
            value - string, the string to check
            
        Returns:
            true - if condition is met
            false - otherwise

        Example:
            > Jel.Validator.required("");           // false
            > Jel.Validator.required("something");  // true

    */

    required: function(value)
    {
        // it is important that required is first, since it should be validated before anything else
        return Jel.Validator.lengthGt(value, {compare: 0});
    },

    /*
        Method: lengthGe
            checks if the *length of a string value* is *greater than or equal to* a specific value 
        
        Arguments:
            value - string, the string to check
            info - object, required, an object hash that must contain an integer compare property to check against
            
        Returns:
            true - if condition is met
            false - otherwise

        Example:
            > Jel.Validator.lengthGe("word", { compare: 4 } ); // true
            > Jel.Validator.lengthGe("word", { compare: 3 } ); // true
            > Jel.Validator.lengthGe("word", { compare: 6 } ); // false

        See Also:
            <lengthGt>

    */
    
    lengthGe: function(value, info)
    {
        return value.length >= info.compare;   
    },

    /*
        Method: lengthGt
            checks if the *length of a string value* is *greater than* a specific value
        
        Arguments:
            value - string, the string to check
            info - object, required, an object hash that must contain an integer compare property to check against
            
        Returns:
            true - if condition is met
            false - otherwise

        Example:
            > Jel.Validator.lengthGt("word", { compare: 4 } ); // false
            > Jel.Validator.lengthGt("word", { compare: 3 } ); // true
    */
    
    lengthGt: function(value, info)
    {
        return value.length > info.compare;   
    },

    /*
        Method: lengthLe
            checks if the *length of a string value* is *less than or equal* to a specific value 
        
        Arguments:
            value - string, the string to check
            info - object, required, an object hash that must contain an integer compare property to check against
            
        Returns:
            true - if condition is met
            false - otherwise

        Example:
            > Jel.Validator.lengthLe("word", { compare: 4 } ); // true
            > Jel.Validator.lengthLe("word", { compare: 5 } ); // false
    */

    lengthLe: function(value, info)
    {
        return value.length <= info.compare;
    },

    /*
        Method: lengthLt
            checks if the *length of a string value* is *less than* a specific value
        
        Arguments:
            value - string, the string to check
            info - object, required, an object hash that must contain an integer compare property to check against

        Returns:
            true - if condition is met
            false - otherwise
            
        Example:
            > Jel.Validator.lengthLt("word", { compare: 5 } ); // true
            > Jel.Validator.lengthLt("word", { compare: 4 } ); // false
    */
    
    lengthLt: function(value, info)
    {
        return value.length < info.compare;
    },
    
    /*
        Method: lengthEq
            checks if the *length of a string* is *equal to* a specific value 
        
        Arguments:
            value - string, the string to check
            info - object, required, an object hash that must contain an integer compare property to check against

        Returns:
            true - if condition is met
            false - otherwise
            
        Example:
            > Jel.Validator.lengthEq("word", { compare: 4 } ); // true
            > Jel.Validator.lengthEq("word", { compare: 3 } ); // false
    */

    lengthEq: function(value, info)
    {
        return value.length == info.compare;
    },

    /*
        Method: lengthNeq
            checks if the *length of a string* is *not equal to* a specific value 
        
        Arguments:
            value - string, the string to check
            info - object, required, an object hash that must contain an integer compare property to check against

        Returns:
            true - if condition is met
            false - otherwise
            
        Example:
            > Jel.Validator.lengthNeq("word", { compare: 4 } ); // false
            > Jel.Validator.lengthNeq("word", { compare: 3 } ); // true
    */

    lengthNeq: function(value, info)
    {
        return value.length != info.compare;
    },

    /*
        Method: lengthRange
            checks if the *length of a string* is *between a lower and upper bound* (inclusive by default, but can be overridden)
            
        Arguments:
            value - string, the string to check
            info - object, required, am object hash (see below):
        
        Info Hash Properties:
            lower - integer, the lower bound of the length range
            upper - integer, the upper bound of the length range
            inclusive - boolean, whether the range is inclusive of the lower and upper bounds


        Returns:
            true - if condition is met
            false - otherwise
            
        Example:
            > Jel.Validator.lengthRange("word", { lower: 2, upper: 5, inclusive: false } );     // true
            > Jel.Validator.lengthRange("word", { lower: 2, upper: 4, inclusive: false } );     // false
            > Jel.Validator.lengthRange("word", { lower: 2, upper: 4, inclusive: true } );      // true
            > Jel.Validator.lengthRange("wo", { lower: 3, upper: 8, inclusive: false } );       // false
     */
    
    lengthRange: function(value, info)
    {
        if (info.inclusive || info.inclusive == null)
            return Jel.Validator.lengthGe(value, {compare: info.lower}) && Jel.Validator.lengthLe(value, {compare: info.upper});
        else
            return Jel.Validator.lengthGt(value, {compare: info.lower}) && Jel.Validator.lengthLt(value, {compare: info.upper});
    },
    
    /* Group: type-checking  */
    
    /*
        Method: intType
            checks if a string value *represents* a *positive or negative integer*
            
        Arguments:
            value - string, the string to check

        Returns:
            { value: integer } - an object hash containing the integer value of the string, if condition is met
            false - otherwise
            
        Example:
            > Jel.Validator.int("4");       // { value: 4 }
            > Jel.Validator.int("word");    // false
            
        See Also:
            <intPositive>, <intNegative>
     */
     
    intType: function(value)
    {
        return Jel.Validator.checkValid(value.match(/^[\-\+]?[0-9]*$/), parseInt(value)); 
    },

    /*
        Method: intPositive
            checks if a string value *represents* a *positive integer*
            
        Arguments:
            value - string, the string to c heck

        Returns:
            { value: integer } - an object hash containing the integer value of the string, if condition is met
            false - otherwise
            
        Example:
            > Jel.Validator.int_positive("4");  // { value: 4 }
            > Jel.Validator.int_positive("-4"); // false
            
        See Also:
            <int>, <intNegative>
     */
    
    intPositive: function(value)
    {
        return Jel.Validator.checkValid(value.match(/^\+?[0-9]*$/), parseInt(value));
    },

    /*
        Method: intNegative
            checks if a string value *represents* a *negative integer*
            
        Arguments:
            value - string, the string to check

        Returns:
            { value: integer } - an object hash containing the integer value of the string, if condition is met
            false - otherwise
            
        Example:
            > Jel.Validator.intNegative("4");   // false
            > Jel.Validator.intNegative("-4");  // { value: -4 }
            
        See Also:
            <int>, <intPositive>
     */
    
    intNegative: function(value)
    {
        return Jel.Validator.checkValid(value.match(/^\-[0-9]*$/), parseInt(value));
    },

    /*
        Method: floatType
            checks if a string value *represents* a *positive or negative float*
            
        Arguments:
            value - string, the string to check
        
        Returns:
            { value: float } - an object hash containing the float value of the string, if condition is met
            false - otherwise

        Example:
            > Jel.Validator.float("4.5");       // { value: 4.5 }
            > Jel.Validator.float("word");      // false
            > Jel.Validator.float("4");         // false
            
        See Also:
            <floatPositive>, <floatNegative>
     */

    floatType: function(value)
    {
        return Jel.Validator.checkValid(value.match(/^[\+\-]?[0-9]*\.[0-9]+$/), parseFloat(value));
    },

    /*
        Method: floatPositive
            checks if a string value *represents* a *positive float*
            
        Arguments:
            value - string, the string to check

        Returns:
            { value: float } - an object hash containing the float value of the string, if condition is met
            false - otherwise
            
        Example:
            > Jel.Validator.floatPositive("4.5");   // { value: 4.5 }
            > Jel.Validator.floatPositive("word");  // false
            > Jel.Validator.floatPositive("-4.5");  // false
            
        See Also:
            <float>, <floatNegative>
     */
    
    floatPositive: function(value)
    {
        return Jel.Validator.checkValid(value.match(/^[\+]?[0-9]*\.[0-9]+$/), parseFloat(value));
    },

    /*
        Method: floatNegative
            checks if a string value *represents* a *negative float*
            
        Arguments:
            value - string, the string to check

        Returns:
            { value: float } - an object hash containing the float value of the string, if condition is met
            false - otherwise
            
        Example:
            > Jel.Validator.floatNegative("4.5");   // false
            > Jel.Validator.floatNegative("word");  // false
            > Jel.Validator.floatNegative("-4.5");  // { value: -4.5 }
            
        See Also:
            <float>, <floatPositive>
     */

    floatNegative: function(value)
    {
        return Jel.Validator.checkValid(value.match(/^\-[0-9]*\.[0-9]+$/), parseFloat(value)); 
    },
    
    /*
        Method: numericType
            checks if a string value *represents* a *positive or negative float or integer*
            
        Arguments:
            value - string, the string to check
        
        Returns:
            { value: float OR integer } - an object hash containing the float OR integer value of the string, if condition is met
            false - otherwise

        Example:
            > Jel.Validator.numericType("4.5");     // { value: 4.5 }
            > Jel.Validator.numericType("word");    // false
            > Jel.Validator.numericType("-4");      // { value: -4 }
            > Jel.Validator.numericType("-4.0");    // { value: -4.0 }
    */
    
    numericType: function(value)
    {
        return Jel.Validator.intType(value) || Jel.Validator.floatType(value);
    },

    /*
        Method: numericPositive
            checks if a string value *represents* a *positive float or integer*
            
        Arguments:
            value - string, the string to check
            
        Returns:
            { value: float OR integer } - an object hash containing the float OR integer value of the string, if condition is met
            false - otherwise

        Example:
            > Jel.Validator.numericPositive("4.5");     // { value: 4.5 }
            > Jel.Validator.numericPositive("85");      // { value: 85 }
            > Jel.Validator.numericPositive("word");    // false
            > Jel.Validator.numericPositive("-4");      // false
            > Jel.Validator.numericPositive("-4.0");    // false
    */
    
    numericPositive: function(value)
    {
        return Jel.Validator.intPositive(value) || Jel.Validator.floatPositive(value);
    },

    /*
        Method: numericNegative
            checks if a string value *represents* a *negative float or integer*
            
        Arguments:
            value - string, the string to check
            
        Returns:
            { value: float OR integer } - an object hash containing the float OR integer value of the string, if condition is met
            false - otherwise

        Example:
            > Jel.Validator.numericNegative("-4.5");    // { value: -4.5 }
            > Jel.Validator.numericNegative("word");    // false
            > Jel.Validator.numericNegative("-4");      // { value: -4 }
            > Jel.Validator.numericNegative("4.0");     // false
    */

    numericNegative: function(value)
    {
        return Jel.Validator.intNegative(value) || Jel.Validator.floatNegative(value);
    },


    /*
        Method: dateType
            checks if a string value *represents* a *date* in a *specified format*. The date must also be *valid within the Gregorian calendar* 
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)
        
        Info hash Properties:
            format - a string describing the format of the date (see <Date.prototype.format> for more details)

        Example:
            > Jel.Validator.dateType("28/03/2006", { format: "d/m/Y" } );   // { value: [date object, day=28, month=2, year=2006] }
            > Jel.Validator.dateType("31/02/2006", { format: "d/m/Y" } );   // false (not a real date)
            > Jel.Validator.dateType("cool", { format: "d/m/Y" } );         // false
    */
    
    dateType: function(value, info)
    {
        var check = Jel.Date.parse(value, info.format);
        
        return Jel.Validator.checkValid(check, check); 
    },

    /* Group: Internet-related */

    /*
        Method: email
            checks if a string value *represents* a *valid email address*
            
        Arguments:
            value - string, the string to check

        Returns:
            { value: string } - an object hash containing the provided value, if condition is met
            false - otherwise
            
        Example:
            > Jel.Validator.email("tom");               // false
            > Jel.Validator.email("tom@domain.com");    // { value: "tom@domain.com" }
            > Jel.Validator.email("tom@domain.");       // false
            > Jel.Validator.email("4");                 // false
    */
    
   
    email: function(value)
    {
        return Jel.Validator.checkValid(value.match(/^([\w-]+)(.[\w-]+)*@([\w-]+)(.[\w]{2,20}){1,4}$/), value);
    },
 
 
    /* Group: Value-based  */

    /*
        Method: range
            checks if a string value falls *within a given range*, *assuming a specific type* (and format if the type is a date)
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)
            
        Info Hash Properties:
            lower - the lower bound of the range to check
            upper - the upper bound of the range to check
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)
            inclusive (optional) - whether the comparison includes the lower and upper bounds. Assumed to be true if not specified

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.range("28/03/2006", { type: "date", lower: "23/02/2006", upper: "24/06/2006", format: "d/m/Y" } );   
            >// { value: [date object, day=28, month=3, year=2006] }
            >
            > Jel.Validator.range("5", { type: "int", lower: "4", upper: "8" } );
            >// { value: 5 }

    */
    
    range: function(value, info)
    {
        var convertedValue = Jel.Validator.convertValue(value, info);
        var convertedUpper = Jel.Validator.convertValue(info.upper, info);
        var convertedLower = Jel.Validator.convertValue(info.lower, info);
        
        var lowerValid = info.inclusive || info.inclusive == null ? Jel.Validator.checkValid(convertedValue >= convertedLower, convertedValue) : Jel.Validator.checkValid(convertedValue > convertedLower, convertedValue);
        var upperValid = info.inclusive || info.inclusive == null ? Jel.Validator.checkValid(convertedValue <= convertedUpper, convertedValue) : Jel.Validator.checkValid(convertedValue < convertedUpper, convertedValue);
        
        return (lowerValid && upperValid) ? lowerValid : false;
    },

    /*
        Method: rangeCi
            checks if a string value falls *within a given range*, *assuming a specific type* (and format if the type is a date), and is *case insensitive* if type is string
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)
            
        Info Hash Properies:
            lower - the lower bound of the range to check
            upper - the upper bound of the range to check
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)
            inclusive (optional) - whether the comparison includes the lower and upper bounds. Assumed to be true if not specified

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.rangeCi("28/03/2006", { type: "date", lower: "23/02/2006", upper: "24/06/2006", format: "d/m/Y" } );   
            >// { value: [date object, day=28, month=3, year=2006] }
            >
            > Jel.Validator.rangeCi("5", { type: "int", lower: "4", upper: "8" } );   
            >// { value: 5 }

    */
    
    rangeCi: function(value, info)
    {
        info.caseInsensitive = true;
        return Jel.Validator.range(value, info);
    },


   /*
        Method: eq
            checks if a string value is *equal to another*, *assuming a specific type* (and format if the type is a date)
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.eq("5", { type: "int", compare: "5" } )   // { value: 5 }

    */

    eq: function(value, info)
    {
        if (!info)
            throw("info object must be provided for comparison validators");
        
        // check that the types / format are actually correct first
        if (!(Jel.Validator.checkType(value, info) && Jel.Validator.checkType(value, info.compare)))
            return false;
            
        var convertedValue = Jel.Validator.convertValue(value, info);
        var convertedCompare = Jel.Validator.convertValue(info.compare, info);
            
        return Jel.Validator.checkValid(convertedValue == convertedCompare, convertedValue);
    },

   /*
        Method: eqCi
            checks if a string value is *equal to another*, *assuming a specific type* (and format if the type is a date), and is *case insensitive* if type is string
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.eqCi("CAR", { compare: "car" } );   // { value: "car" }

    */

    eqCi: function(value, info)
    {
        info.caseInsensitive = true;
        return Jel.Validator.eq(value, info);
    },

   /*
        Method: neq
            checks if a string value is *not equal to another*, *assuming a specific type* (and format if the type is a date)
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.neq("5", { type: "int", compare: "6" } );   // { value: 5 }

    */

    neq: function(value, info)
    {
        if (!info)
            throw("info object must be provided for comparison validators");
        
        // check that the types / format are actually correct first
        if (!(Jel.Validator.checkType(value, info) && Jel.Validator.checkType(value, info.compare)))
            return false;
            
        var convertedValue = Jel.Validator.convertValue(value, info);
        var convertedCompare = Jel.Validator.convertValue(info.compare, info);
            
        return Jel.Validator.checkValid(convertedValue != convertedCompare, convertedValue);
    },

   /*
        Method: neqCi
            checks if a string value is *not equal to another*, *assuming a specific type* (and format if the type is a date), and is *case insensitive* if type is string
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.neqCi("5", { type: "int", compare: "6" } );   // { value: 5 }

    */

    neqCi: function(value, info)
    {
        info.caseInsensitive = true;
        return Jel.Validator.neq(value, info);
    },

   /*
        Method: gt
            checks if a string value is *greater than another*, *assuming a specific type* (and format if the type is a date)
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.gt("5", { type: "int", compare: "4" } );
            > // { value: 5 }
            >
            > Jel.Validator.gt("5", { type: "int", compare: "5" } );
            > // false
            >
            > Jel.Validator.gt("5", { type: "int", compare: "5", inclusive: true } );
            > // { value: 5 }

    */
    
    gt: function(value, info)
    {
        if (!info)
            throw("info object must be provided for comparison validators");
        
        // check that the types / format are actually correct first
        if (!(Jel.Validator.checkType(value, info) && Jel.Validator.checkType(value, info.compare)))
            return false;
            
        var convertedValue = Jel.Validator.convertValue(value, info);
        var convertedCompare = Jel.Validator.convertValue(info.compare, info);
        
        return info.inclusive ? Jel.Validator.checkValid(convertedValue >= convertedCompare, convertedValue) : Jel.Validator.checkValid(convertedValue > convertedCompare, convertedValue);
    },

   /*
        Method: gtCi
            checks if a string value is *greater than another*, *assuming a specific type* (and format if the type is a date), and is *case insensitive* if type is string
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.gtCi("5", { type: "int", compare: "4" } );
            > // { value: 5 }
            >
            > Jel.Validator.gtCi("5", { type: "int", compare: "5" } );                    
            > // false
            >
            > Jel.Validator.gtCi("5", { type: "int", compare: "5", inclusive: true } );   
            > // { value: 5 }

    */
    
    gtCi: function(value, info)
    {
        info.caseInsensitive = true;
        return Jel.Validator.gt(value, info);
    },

   /*
        Method: lt
            checks if a string value is *less than another*, *assuming a specific type* (and format if the type is a date). 
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.lt("5", { type: "int", compare: "6" } );                    
            > // { value: 5 }
            > 
            > Jel.Validator.lt("6", { compare: "45" } );                                
            > // false (character comparison)
            >
            > Jel.Validator.lt("5", { type: "int", compare: "5" } );                    
            > // false
            >
            > Jel.Validator.lt("5", { type: "int", compare: "5", inclusive: true } );   
            > // { value: 5 }

    */
    
    lt: function(value, info)
    {
        if (!info)
            throw("info object must be provided for comparison validators");

        // check that the types / format are actually correct first
        if (!(Jel.Validator.checkType(value, info) && Jel.Validator.checkType(value, info.compare)))
            return false;
        
        var convertedValue = Jel.Validator.convertValue(value, info);
        var convertedCompare = Jel.Validator.convertValue(info.compare, info);
        
        return info.inclusive ? Jel.Validator.checkValid(convertedValue <= convertedCompare, convertedValue) : Jel.Validator.checkValid(convertedValue < convertedCompare, convertedValue);
    },

   /*
        Method: ltCi
            checks if a string value is *less than another*, *assuming a specific type* (and format if the type is a date), and is *case insensitive* if type is string
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.ltCi("5", { type: "int", compare: "6" } );                    
            > // { value: 5 }
            > 
            > Jel.Validator.ltCi("6", { compare: "45" } );                                
            > // false (character comparison)
            >
            > Jel.Validator.ltCi("5", { type: "int", compare: "5" } );                    
            > // false
            >
            > Jel.Validator.ltCi("5", { type: "int", compare: "5", inclusive: true } );   
            > // { value: 5 }

    */
    
    ltCi: function(value, info)
    {
        info.caseInsensitive = true;
        return Jel.Validator.lt(value, info);
    },

   /*
        Method: ge
            checks if a string value is *greater than or equal to another*, *assuming a specific type* (and format if the type is a date)
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.ge("7", { type: "int", compare: "6" } );   // { value: 7 }
            > Jel.Validator.ge("5", { type: "int", compare: "5" } );   // { value: 5 }
            > Jel.Validator.ge("5", { type: "int", compare: "7" } );   // false

    */
    
    ge: function(value, info)
    {
        info.inclusive = true;
        return Jel.Validator.gt(value, info);
    },

   /*
        Method: geCi
            checks if a string value is *greater than or equal to another*, *assuming a specific type* (and format if the type is a date), and is *case insensitive* if type is string
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)
            
        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.geCi("7", { type: "int", compare: "6" } );   // { value: 7 }
            > Jel.Validator.geCi("5", { type: "int", compare: "5" } );   // { value: 5 }
            > Jel.Validator.geCi("5", { type: "int", compare: "7" } );   // false

    */
    
    geCi: function(value, info)
    {
        info.caseInsensitive = true;
        return Jel.Validator.ge(value, info);
    },


   /*
        Method: le
            checks if a string value is *less than or equal to another*, *assuming a specific type* (and format if the type is a date)
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.le("5", { type: "int", compare: "6" } );   // { value: 5 }
            > Jel.Validator.le("5", { type: "int", compare: "5" } );   // { value: 5 }
            > Jel.Validator.le("5", { type: "int", compare: "4" } );   // false

    */
    
    le: function(value, info)
    {
        info.inclusive = true;
        return Jel.Validator.lt(value, info);
    },

   /*
        Method: leCi
            checks if a string value is *less than or equal to another*, *assuming a specific type* (and format if the type is a date), and is *case insensitive* if type is string
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            type (optional) - the data type to convert to in the comparisons ("int", "float", or "date"). If not specified a string comparison is performed
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.leCi("5", { type: "int", compare: "6" } );   // { value: 5 }
            > Jel.Validator.leCi("5", { type: "int", compare: "5" } );   // { value: 5 }
            > Jel.Validator.leCi("5", { type: "int", compare: "4" } );   // false

    */
    
    leCi: function(value, info)
    {
        info.caseInsensitive = true;
        return Jel.Validator.le(value, info);
    },


   /*
        Method: intEq
            checks if a string value is *equal to another*, *comparing both as integers*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the integer value of the string, if the comparison is true { value: [typed-value] }, and the values are both integers
            false - otherwise
            
        Example:
            > Jel.Validator.eq("5", { compare: "5" } );   // { value: 5 }
            > Jel.Validator.eq("4", { compare: "5" } );   // false
    */

    intEq: function(value, info)
    {
        info.type = "int";
        return Jel.Validator.eq(value, info);
    },

    /*
        Method: intNeq
            checks if a string value is *not equal to another*, *comparing both as integers*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the integer value of the string, if the comparison is true { value: [typed-value] }, and the values are both integers
            false - otherwise
            
        Example:
            > Jel.Validator.neq("5", { compare: "5" } );   // false
            > Jel.Validator.neq("4", { compare: "5" } );   // { value: 4 }
    */

    intNeq: function(value, info)
    {
        info.type = "int";
        return Jel.Validator.neq(value, info);
    },
    
   /*
        Method: intLt
            checks if a string value is *less than another*, *comparing both as integers*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified

        Returns:
            object - a hash containing the integer value of the string, if the comparison is true { value: [typed-value] }, and the values are both integers
            false - otherwise
            
        Example:
            > Jel.Validator.intLt("5", { compare: "6" } );   // { value: 5 }
            > Jel.Validator.intLt("4", { compare: "3" } );   // false
    */


    intLt: function(value, info)
    {
        info.type = "int";
        return Jel.Validator.lt(value, info);
    },

   /*
        Method: intGt
            checks if a string value is *greater than another*, *comparing both as integers*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified

        Returns:
            object - a hash containing the integer value of the string, if the comparison is true { value: [typed-value] }, and the values are both integers
            false - otherwise
            
        Example:
            > Jel.Validator.intGt("5", { compare: "5" } );   // false
            > Jel.Validator.intGt("5", { compare: "4" } );   { value: 5 }
    */                                                   
    
    intGt: function(value, info)
    {
        info.type = "int";
        return Jel.Validator.gt(value, info);
    },

   /*
        Method: intLe
            checks if a string value is *less than or equal to another*, *comparing both as integers*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the integer value of the string, if the comparison is true { value: [typed-value] }, and the values are both integers
            false - otherwise
            
        Example:
            > Jel.Validator.intLe("5", { compare: "5" } );   // { value: 5 }
            > Jel.Validator.intLe("4", { compare: "3" } );   // false
    */
    
    intLe: function(value, info)
    {
        info.type = "int";
        info.inclusive = "true";
        return Jel.Validator.lt(value, info);
    },

   /*
        Method: intGe
            checks if a string value is *greater than or equal to another*, *comparing both as integers*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the integer value of the string, if the comparison is true { value: [typed-value] }, and the values are both integers
            false - otherwise
            
        Example:
            > Jel.Validator.intGe("5", { compare: "5" } );   // { value: 5 }
            > Jel.Validator.intGe("2", { compare: "3" } );   // false
    */
    
    intGe: function(value, info)
    {
        info.type = "int";
        info.inclusive = "true";
        return Jel.Validator.gt(value, info);
    },

    /*
        Method: intRange
            checks if a string value falls *within a given range*, *comparing as integers*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            lower - the lower bound of the range to check
            upper - the upper bound of the range to check
            inclusive (optional) - whether the comparison includes the lower and upper bounds. Assumed to be true if not specified

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.intRange("3", { lower: "5", upper: "7" } );   // false
            > Jel.Validator.intRange("5", { lower: "4", upper: "8" } );   // { value: 5 }

    */
    
    intRange: function(value, info)
    {
        info.type = "int";
        return Jel.Validator.range(value, info);
    },

   /*
        Method: floatEq
            checks if a string value is *equal to another*, *comparing both as floats*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the float value of the string, if the comparison is true { value: [typed-value] }, and the values are both floats
            false - otherwise
            
        Example:
            > Jel.Validator.floatEq("5", { compare: "5.0" } );   
            >// { value: 5.0 }
            >
            > Jel.Validator.floatEq("4", { compare: "5.0" } );   
            >// false
    */
    
    floatEq: function(value, info)
    {
        info.type = "float";
        return Jel.Validator.eq(value, info);
    },

   /*
        Method: floatNeq
            checks if a string value is *not equal to another*, *comparing both as floats*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the float value of the string, if the comparison is true { value: [typed-value] }, and the values are both floats
            false - otherwise
            
        Example:
            > Jel.Validator.floatNeq("5", { compare: "5.0" } );   
            >// false
            >
            > Jel.Validator.floatNeq("4", { compare: "5.0" } );   
            >// { value: 4.0 }
    */
    
    floatNeq: function(value, info)
    {
        info.type = "float";
        return Jel.Validator.neq(value, info);
    },

   /*
        Method: floatLt
            checks if a string value is *less than another*, *comparing both as floats*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified

        Returns:
            object - a hash containing the float value of the string, if the comparison is true { value: [typed-value] }, and the values are both floats
            false - otherwise
            
        Example:
            > Jel.Validator.floatLt("5", { compare: "6.0" } );   // { value: 5.0 }
            > Jel.Validator.floatLt("4", { compare: "3.0" } );   // false
    */

    floatLt: function(value, info)
    {
        info.type = "float";
        return Jel.Validator.lt(value, info);
    },

   /*
        Method: floatGt
            checks if a string value is *greater than another*, *comparing both as floats*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified

        Returns:
            object - a hash containing the float value of the string, if the comparison is true { value: [typed-value] }, and the values are both floats
            false - otherwise
            
        Example:
            > Jel.Validator.floatGt("5.0", { compare: "5.0" } );   // false
            > Jel.Validator.floatGt("5.0", { compare: "4.0" } );   { value: 5.0 }
    */
      
    floatGt: function(value, info)
    {
        info.type = "float";
        return Jel.Validator.gt(value, info);
    },

    /*
        Method: floatLe
            checks if a string value is *less than or equal to another*, *comparing both as floats*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the float value of the string, if the comparison is true { value: [typed-value] }, and the values are both floats
            false - otherwise
            
        Example:
            > Jel.Validator.floatLe("5.0", { compare: "5.0" } );   // { value: 5.0 }
            > Jel.Validator.floatLe("4.2", { compare: "3.0" } );   // false
    */
    
    floatLe: function(value, info)
    {
        info.type = "float";
        info.inclusive = "true";
        return Jel.Validator.lt(value, info);
    },

   /*
        Method: floatGe
            checks if a string value is *greater than or equal to another*, *comparing both as floats*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the float value of the string, if the comparison is true { value: [typed-value] }, and the values are both floats
            false - otherwise
            
        Example:
            > Jel.Validator.floatGe("5.0", { compare: "5.0" } );   // { value: 5.0 }
            > Jel.Validator.floatGe("2.0", { compare: "3.0" } );   // false
    */
    
    floatGe: function(value, info)
    {
        info.type = "float";
        info.inclusive = "true";
        return Jel.Validator.gt(value, info);
    },

    /*
        Method: floatRange
            checks if a string value falls *within a given range*, *comparing as floats*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            lower - the lower bound of the range to check
            upper - the upper bound of the range to check
            inclusive (optional) - whether the comparison includes the lower and upper bounds. Assumed to be true if not specified

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.floatRange("3.0", { lower: "5.0", upper: "7.0" } );   // false
            > Jel.Validator.floatRange("5.0", { lower: "4.0", upper: "8.0" } );   // { value: 5.0 }

    */
    
    floatRange: function(value, info)
    {
        info.type = "float";
        return Jel.Validator.range(value, info);
    },

   /*
        Method: numericEq
            checks if a string value is *equal to another*, *comparing both as numeric (float or integer)*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the date value of the string, if the comparison is true { value: [typed-value] }, and the values are both dates
            false - otherwise
            
        Example:
            > Jel.Validator.numericEq("5", { compare: "5.0" } );   // { value: 5.0 }
            > Jel.Validator.numericEq("4", { compare: "5.0" } );   // false
    */

    numericEq: function(value, info)
    {
        info.type = "numeric";
        return Jel.Validator.eq(value, info);
    },

   /*
        Method: numericNeq
            checks if a string value is *not equal to another*, *comparing both as numeric (float or integer)*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the date value of the string, if the comparison is true { value: [typed-value] }, and the values are both dates
            false - otherwise
            
        Example:
            > Jel.Validator.numericNeq("5", { compare: "5.0" } );   // false
            > Jel.Validator.numericNeq("4", { compare: "5.0" } );   // { value: 4.0 }
    */

    numericNeq: function(value, info)
    {
        info.type = "numeric";
        return Jel.Validator.neq(value, info);
    },

   /*
        Method: numericLt
            checks if a string value is *less than another*, *comparing both as numeric (float or integer)*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified

        Returns:
            object - a hash containing the numeric value of the string, if the comparison is true { value: [typed-value] }, and the values are both numeric (float or integer)
            false - otherwise
            
        Example:
            > Jel.Validator.numericLt("5", { compare: "6.0" } );   // { value: 5.0 }
            > Jel.Validator.numericLt("4", { compare: "3.0" } );   // false
    */

    numericLt: function(value, info)
    {
        info.type = "numeric";
        return Jel.Validator.lt(value, info);
    },

   /*
        Method: numericGt
            checks if a string value is *greater than another*, *comparing both as numeric (float or integer)*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified

        Returns:
            object - a hash containing the numeric value of the string, if the comparison is true { value: [typed-value] }, and the values are both numeric (float or integer)
            false - otherwise
            
        Example:
            > Jel.Validator.numericGt("5.0", { compare: "5.0" } );   // false
            > Jel.Validator.numericGt("5.0", { compare: "4.0" } );   { value: 5.0 }
    */
      
    numericGt: function(value, info)
    {
        info.type = "numeric";
        return Jel.Validator.gt(value, info);
    },

    /*
        Method: numericLe
            checks if a string value is *less than or equal to another*, *comparing both as numeric (float or integer)*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the numeric value of the string, if the comparison is true { value: [typed-value] }, and the values are both numeric (float or integer)
            false - otherwise
            
        Example:
            > Jel.Validator.numericLe("5.0", { compare: "5.0" } );   // { value: 5.0 }
            > Jel.Validator.numericLe("4.2", { compare: "3.0" } );   // false
    */
    
    numericLe: function(value, info)
    {
        info.type = "numeric";
        info.inclusive = "true";
        return Jel.Validator.lt(value, info);
    },

   /*
        Method: numericGe
            checks if a string value is *greater than or equal to another*, *comparing both as numeric (float or integer)*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to

        Returns:
            object - a hash containing the numeric value of the string, if the comparison is true { value: [typed-value] }, and the values are both numeric (float or integer)
            false - otherwise
            
        Example:
            > Jel.Validator.numericGe("5.0", { compare: "5.0" } );   // { value: 5.0 }
            > Jel.Validator.numericGe("2.0", { compare: "3.0" } );   // false
    */
    
    numericGe: function(value, info)
    {
        info.type = "numeric";
        info.inclusive = "true";
        return Jel.Validator.gt(value, info);
    },

    /*
        Method: numericRange
            checks if a string value falls *within a given range*, *comparing as numeric (float or integer)*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            lower - the lower bound of the range to check
            upper - the upper bound of the range to check
            inclusive (optional) - whether the comparison includes the lower and upper bounds. Assumed to be true if not specified

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.numericRange("3.0", { lower: "5.0", upper: "7.0" } );   // false
            > Jel.Validator.numericRange("5.0", { lower: "4.0", upper: "8.0" } );   // { value: 5.0 }

    */
    
    numericRange: function(value, info)
    {
        info.type = "numeric";
        return Jel.Validator.range(value, info);
    },

   /*
        Method: dateEq
            checks if a string value is *equal to another*, *comparing both as dates*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the date value of the string, if the comparison is true { value: [typed-value] }, and the values are both dates
            false - otherwise
            
        Example:
            > Jel.Validator.dateEq("23/05/2006", { format: "d/m/Y", compare: "23/05/2006" } );   // { value: [date object, day=23, month=4, year=2006] }
    */
    
    dateEq: function(value, info)
    {
        info.type = "date";
        return Jel.Validator.eq(value, info);
    },

   /*
        Method: dateNeq
            checks if a string value is *not equal to another*, *comparing both as dates*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the date value of the string, if the comparison is true { value: [typed-value] }, and the values are both dates
            false - otherwise
            
        Example:
            > Jel.Validator.dateNeq("23/05/2006", { format: "d/m/Y", compare: "23/05/2006" } );
            > // false, the are equal
    */
    
    dateNeq: function(value, info)
    {
        info.type = "date";
        return Jel.Validator.neq(value, info);
    },

   /*
        Method: dateLt
            checks if a string value is *less than another*, *comparing both as dates*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the date value of the string, if the comparison is true { value: [typed-value] }, and the values are both dates
            false - otherwise
            
        Example:
            > Jel.Validator.dateLt("23/05/2006", { format: "d/m/Y", compare: "25/05/2006" } );
            > // { value: [date object, day=23, month=4, year=2006] }
    */

    dateLt: function(value, info)
    {
        info.type = "date";
        return Jel.Validator.lt(value, info);
    },

   /*
        Method: dateGt
            checks if a string value is *greater than another*, *comparing both as dates*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            inclusive (optional) - whether the comparison includes the comparison value. In this case, assumed to be false if not specified
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the date value of the string, if the comparison is true { value: [typed-value] }, and the values are both dates
            false - otherwise
            
        Example:
            > Jel.Validator.dateGt("23/05/2006", { format: "d/m/Y", compare: "25/05/2006" } );
            > // { value: [date object, day=23, month=4, year=2006] }
    */
    
    dateGt: function(value, info)
    {
        info.type = "date";
        return Jel.Validator.gt(value, info);
    },

    /*
        Method: dateLe
            checks if a string value is *less than or equal to another*, *comparing both as dates*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the date value of the string, if the comparison is true { value: [typed-value] }, and the values are both dates
            false - otherwise
            
        Example:
            > Jel.Validator.dateLe("23/05/2006", { format: "d/m/Y", compare: "25/05/2006" } );
            > // { value: [date object, day=23, month=4, year=2006] }
            > 
            > Jel.Validator.dateLe("25/05/2006", { format: "d/m/Y", compare: "25/05/2006" } );
            > // { value: [date object, day=23, month=4, year=2006] }
    */
    
    dateLe: function(value, info)
    {
        info.type = "date";
        info.inclusive = "true";
        return Jel.Validator.lt(value, info);
    },

   /*
        Method: dateGe
            checks if a string value is *greater than or equal to another*, *comparing both as dates*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            compare - the value to compare to
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the date value of the string, if the comparison is true { value: [typed-value] }, and the values are both dates
            false - otherwise
            
        Example:
            > Jel.Validator.dateGe("25/05/2006", { format: "d/m/Y", compare: "25/05/2006" } );
            > // { value: [date object, day=25, month=4, year=2006] }
    */
    
    dateGe: function(value, info)
    {
        info.type = "date";
        info.inclusive = "true";
        return Jel.Validator.gt(value, info);
    },

    /*
        Method: dateRange
            checks if a string value falls *within a given range*, *comparing as dates*
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            lower - the lower bound of the range to check
            upper - the upper bound of the range to check
            inclusive (optional) - whether the comparison includes the lower and upper bounds. Assumed to be true if not specified
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native value of the string provided based on the type specified, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.dateRange("25/05/2006", { format: "d/m/Y", lower: "22/05/2006", upper: "28/05/2006" } );
            > // { value: [date object, day=25, month=4, year=2006] }

    */
    
    dateRange: function(value, info)
    {
        info.type = "date";
        return Jel.Validator.range(value, info);
    },

    /*
        Method: dateFuture
            checks if a string value when converted to a date is *in the future*. this is a special case of <dateGt>
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native date value of the string provided, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.dateFuture("25/05/2021", { format: "d/m/Y" } );
            > // { value: [date object, day=25, month=4, year=2021] }

    */
    dateFuture: function(value, info)
    {
        info.type = "date";
        return Jel.Validator.dateGt(value, { compare: Jel.Date.format(Jel.Date.now(), info.format), format: info.format });
    },

    /*
        Method: datePast
            checks if a string value when converted to a date is *in the past*. this is a special case of <dateLt>
            
        Arguments:
            value - string, the string to check
            info - object hash, required (see below)

        Info hash Properties:
            format (optional) - if type is a date, describes the input format (see <Date.prototype.format> for more details)

        Returns:
            object - a hash containing the native date value of the string provided, if the comparison is true { value: [typed-value] }
            false - otherwise
            
        Example:
            > Jel.Validator.datePast("25/05/2021", { format: "d/m/Y" } );   // false

    */
    datePast: function(value, info)
    { 
        info.type = "date";
        return Jel.Validator.dateLt(value, { compare: Jel.Date.format(Jel.Date.now(), info.format), format: info.format });
    },
         
    checkType: function(value, info)
    {
        if (info && info.type)
        {
            switch (info.type)
            {
                case "int":
                {
                    return Jel.Validator.intType(value, info);
                    break;
                }
                case "float":
                {
                    return Jel.Validator.floatType(value, info);
                }
                case "numeric":
                {
                    return Jel.Validator.numericType(value, info);
                }
                case "date":
                {
                    return Jel.Validator.dateType(value, info);
                }
            };
        };
        
        return { value: (value && value.toString ? value.toString() : value) };
    }
    
    
});

/* 
    Synonyms for date validators, since they handle pure time format strings too.
    
    These are used in the Jel>FormValidator
*/

Jel.Validator.timeEq = Jel.Validator.dateEq;
Jel.Validator.timeNeq = Jel.Validator.dateNeq;
Jel.Validator.timeLt = Jel.Validator.dateLt;
Jel.Validator.timeGt = Jel.Validator.dateGt;
Jel.Validator.timeLe = Jel.Validator.dateLe;
Jel.Validator.timeGe = Jel.Validator.dateGe;
Jel.Validator.timeRange = Jel.Validator.dateRange;
Jel.Validator.timeLater = Jel.Validator.dateFuture;
Jel.Validator.timeEarlier = Jel.Validator.datePast;/* 
Class: Jel.FormValidator
    Provides unobtrusive client-side validation behaviour to an HTML form, via recognition of special CSS class strings (validation classes) attached to each field. Includes customisation options for how to display the validation errors (results), how to change the display of "culprit" fields and their labels (through css classes)
    and also the option to display these errors adjacent to each field in "inline" containers (on field blur). Error messages are automatically generated through use of internationalizable error template strings, but can also be entirely customized if the automatic messages are insufficient.
    See below for terminology used within this documentation.
    
Terminology:
    culprit - A *culprit* field is a field that has been deemed not valid when validating the form it belongs to.
    results - The *results* of the form validation refers to the information gathered about the culprits during that validation (if any, that is, if validation fails). *Displaying the results* usually refers to displaying the error messages that describe what is wrong with each culprit field to the person filling in the form. 
    validation class - the special CSS classes that are applied to form elements which describe rules for them to be valid. Many pretermined classes are available to use, or you can define your own custom validation classes (functions) and associated *error templates* (see below).
    error template - a string template resource linked to each validation class that defines the error message to show when that validation rule fails. For custom validation classes, an equivalent *error template* needs to be defined also.
    error message - the message for each culprit field describing why validation has failed. (this is the "filled-in" version of the *error template* for the *validation class* rule that has not been satisifed). 
    inline validation - if activated, individual fields will be validated on blur. If this validation fails, an *inline error message* (a variation of the standard *error message*, without the field label) will be placed inside the associated *inline* (see below)
    inline - an optional container element defined for each field (typically adjacent to it in the DOM) that will be filled with any *inline error messages* generated during *inline validation*.

Validation Classes:
    The validation classes recognised by Jel.FormValidator are specified in the class attribute of each field in the form being validated.  
    The range of supported classes is quite extensive and automate validation of many conditions that you previously would have written custom code for. 
    Not only that, but all of the validation classes are able to build readable error messages that describe what went wrong to the user. They can be be placed into 4 major categories:

    required - the special case of a field simply being required
    length based - checks the character length of a field against a specified value, or lower and upper values
    value based - checks the value of a field against a specified comparison value, or upper and lower value, or even another field value
    pattern based - special cases such as email addresses 

    It's also important to note that most of these validation classes are derived from the function names in the <Jel.Validator> class, and they call out to those functions to check fields. 
    
The "required" validation class:
    To mark a form field as being required (that is, a value must be provided to be able to submit the form), simply add the class "required" to the class attribute of the field. 

Length-based validation classes:
    Length based classes check that a field in the form matches a certain character length condition. These follow the format length-OPERATOR-COMPARE where:
        
        OPERATOR - is the comparison operator being performed (see below) 
        COMPARE - the comparison length value, or lower and upper value if OPERATOR is "range" 
    
    Values for OPERATOR:    
        eq - equality comparison (==)
        neq - inequality comparison (!=)
        lt - less than (<)
        gt - greater than (>)
        le - less than or equal to (<=)
        ge - greater than or equal to (>=)
        range - between lower and upper bound (in a...b)

    Values for COMPARE:
        a - where a is an integer, if OPERATOR is not "range"
        a:b - where a and b are integers representing lower and upper bounds if OPERATOR is range, and you want the bounds to be non-inclusive
        a::b - as above if OPERATOR is range, and you want the bounds to be inclusive
    
    Examples of length-based validation classes:
        > length-gt-5 - field length must be greater than (gt) 5 characters
        > length-eq-5 - field length must be equal to (eq) 5 characters
        > length-range-5:10 - field length must be between 5 and 10 characters, non-inclusive (:)
        > length-range-5::10 - field length must be between 5 and 10 characters, inclusive (::)
    
Value-based classes:
    Value-based classes check a field's data type and value compared to another value, or lower and upper values if the operator is a range. 
    These values can either be constant, or can specified as the values of other fields in the form. 
    These follow the format [TYPE-]OPERATOR-COMPARE-FORMAT where:
        
        TYPE - is the data type that is expected in this field. 
        OPERATOR - is the comparison operator being performed.
        COMPARE - is the value, upper and lower value, or even another field to be compared
        FORMAT - is the date format when TYPE is "date" or "time"
    
    Refer to the reference below for possible values of each of these attributes.
    
    Values for TYPE:
        empty (not specified) - for strings, that is, no type check really occurs at all 
        int - for integers
        float - for floating point numbers, that is, they have decimals
        numeric - for int or float
        date - for date strings. When specifying a date, the FORMAT must also be specified
        time - synonym for "date". This is more readable when you're using a time format
    
    Values for OPERATOR:
        The same as for length-based classes, with the extra exceptions:
        
        (int|float|numeric)-positive - a positive number 
        (int|float|numeric)-negative - a negative number 
        date-future-FORMAT - a date string in the future  in FORMAT
        date-past-FORMAT - a date in the past in FORMAT
        time-earlier-FORMAT - a time earlier than the current time
        time-later-FORMAT- a time later than the current time

    Values for COMPARE (comparing constants):
        The syntax for COMPARE follows the same rules as for length-based comparisons, but for different types, that is:
        
        a - where a is an appropriate type (see below), for a single value comparison
        a:b - where a, b are an appropriate type (see below), for "range" lower and upper bounds (non-inclusive)
        a::b - where a, b are an appropriate type (see below), for "range" lower and upper bounds (inclusive)
        
        Types are represented like so:
        
        TYPE is empty (string) - whatever string you want to compare
        TYPE is int - an integer
        TYPE is float - an integer, followed by lowercase "p" (for point), then another integer for decimal part. E.g. 3p14159
        TYPE is date - a representation of a date in the format yyyymmdd (e.g. 20070403) for just a date, and yyyymmddThhmmss for date AND time. (e.g. 20070403T133000)
        TYPE is time - a representation of a time in the format hhmmss (e.g. 133000)
        
    Values for COMPARE (when comparing other fields):
        If you want to compare the value of the field with another one in the same form, simply substitute the constant in the class string with the ID of the field(s) to compare, followed by the suffix in the "suffixCompareField" in Options hash of the <constructor> (by default this is "-field").
        
    Values for FORMAT (only appropriate for "date" and "time" types):
        a dash-delimited version of a property identifier for the formatting constants in <Jel.Date.FORMAT>. E.g. date-future-uk (Jel.Date.FORMAT.UK), date-future-uk-12 (Jel.Date.FORMAT.UK_12)

    Examples of value-based validation classes:
        
        > int-ge-4                             - integer greater than or equal to 4
        > int-range-4:8                         - integer between 4 and 8, non-inclusive
        > float-range-4p5:20p1                  - floating point, between 4.5 and 20.1
        > neq-password                          - not equal to "password" case-sensitive
        > eq-password-field                     - equal to the value of the field with ID "password" (useful for confirm password) 
        > gt-ci-a                               - greater than "a", case-insensitive
        > lt-b                                  - less than "b", case-sensitive
        > date-future-uk                        - UK formatted date (dd/mm/yyyy) in the future
        > date-ge-20000101-us                   - US formatted date (mm/dd/yyyy) sometime after the turn of the millenium (1st Jan 2000)
        > date-range-uk-20050201::20070301      - UK formatted date between 1st Feb 2005 and 1st Mar 2007, inclusive

    Hopefully it's clear from the rules above that they are a lot easier to construct than they are to explain!
    
*/

/* 
Property: form
    The HTML form associated with this validator.

Property: fieldLabels
    A hash of field labels (the text, not the label elements themselves) indexed by the ID of the related control. 
*/


Jel.FormValidator = Base.extend
({
    /*
    Method: constructor
        Class constructor.
    
    Parameters:
        form - HTML Form Element, the form to apply form validation behaviour to
        options - hash, a hash of options to configure the validator (see below)
        
    Options available (specified in *options* hash): 
        callbacks - hash, a collection of optional callbacks to customise the behaviour of the form validator (see below)
        validators            - Hash, a collection of custom validators to use for this form, indexed by the camelized class names that they match (for example, a "user-name" class would be indexed "userName" in this hash)
        errorTemplates        - Hash, a collection of errorTemplates to use for any custom validators in validators (each validator requires an error template), indexed by the uppercase-underscore-delimited version of the class name (for example, a "user-name" class would be indexed "USER_NAME" in this hash)   
        culpritFieldClassName - String (default "culprit"), the class name to apply to fields that are responsible for the form not validating (termed 'culprits') 
        culpritLabelClassName - String (default "culprit"), the class name to apply to the labels of culprit fields
        selectEmptyValue      - String (default ""), the value of a select field that is regarded as empty (that is, not yet chosen)
        validateInline        - Boolean (default true), indicates whether single field validation should occur on each field's onblur event, and be displayed in associated "inline" elements
        suffixCompareField    - String (default "-field"), the suffix used to describe field comparisons in validation classes
        suffixInline          - String (default "-inline"), the suffix added to a field ID to determine the ID of an "inline" container, used to display inline error messages for that field 
        resultsContainer      - HTML Element, if specified, the form validator will build an XHTML error message inside this container, which consists of an intro paragraph, followed by an unordered list of all error messages)
        resultsAlert          - Boolean, if true the form validator will display a nicely formatted JavaScript alert box showing your errors. This will also occur by default automatically if no other display has been specified, that is if both options.callbacks.onShowResults and options.resultsContainer are not specified. 
        
    Callbacks available (specified in *options.callbacks* hash):
       formatFieldLabel(label, field) - If specified, the string this function returns will be used as the field label when it is shown in error messages
       formatDateFormat(format) - If specified, the string this function returns will be used as a date format when they are shown in error messages
       onShowResults(results, validator) - If specified, will be called when displaying the results of a validation (only occurs is there are problems). Refer to <showResultsAlert> for information on the results parameter. 
       onValidate(validator) - If specified, this will be called after regular field validation has occurred, to allow you to perform any custom validation (return false if not the form is still not valid, true otherwise) 
       onSubmit(validator) - If specified, this function will be called once all validation is successful, but before the form is submitted. Return false to prevent form submission, and true to let it through. Preventing form submission (returning false) could be an approach for AJAX applications that hijack a standard form submit. 
       
    Example:
        > var validator = new Jel.FormValidator
        > (
        >     $('contact-form'),
        >     {
        >          callbacks:
        >          {
		>   			formatFieldLabel: function(label) 
		>                                 { 
		>                                     return '<em>' + label.replace(/[:\*]/g, '') + '</em>'; 
		>                                 }, 
        >               
		>   			onSubmit: function(validator) 
		>                         { 
		>                             this.sendAjaxRequest(Form.serialize(validator.form)); 
		>                             return false; 
		>                         }		
        >          }
        >     }    
        > );
        
    
    */
    
    constructor: function(form, options)
    {
        
        this.form = form;

        this.options = Object.extend
        (
           {
               culpritFieldClassName:   'culprit',
               culpritLabelClassName:   'culprit',
               selectEmptyValue:        '',
               suffixCompareField:      '-field',
               suffixInline:     '-inline',
               validateInline:          true
           },
           options || {}
        );
        
        this.validators = Object.extend
        (
            Jel.Validator,
            this.options.validators || {}
        );

        //console.log(this.validators);
        
        this.errorTemplates = Object.extend
        (
            Jel.Lang.FormValidator.ERRORS,
            this.options.errorTemplates || {}
        );
        
        this.callbacks = Object.extend
        (
            {
                formatFieldLabel: this.formatFieldLabel,
                formatDateFormat: this.formatDateFormat
            },
            this.options.callbacks || {}
        );
        
        
        this.observers = 
        {
            _formOnSubmit:               this._formOnSubmit.bindAsEventListener(this),
            _fieldOnBlur:                this._fieldOnBlur.bindAsEventListener(this)
        };
        
        // build a regular expression prefix list of supported validators
        
        var keys = $H(this.validators).inject
        (
            [],
            function(array, validator)
            {
                array.push(Jel.String.decamelize(this._replaceReserved(validator.key)));
                return array;
            }
            .bind(this)
        );
        
        // sort the keys in reverse order, so that the most specific validators come first in the pattern. this is vital
        keys.sort(function(a, b) { return a < b ? 1 : -1; });
        
        this.validatorPattern = "(" + keys.join("|") + ")(?:\-([a-zA-Z0-9\:\-]*))?";
        
        // build a regular expression date format pattern
        
        keys = $H(Jel.Date.FORMAT).inject
        (
            [],
            function(array, format)
            {
                array.push(format.key.replace(new RegExp("_", "gi"), "-").toLowerCase());
                return array;
            }
            .bind(this)
        );
        
        // sort the keys in reverse order, so that the most specific validators come first in the pattern. this is vital
        keys.sort(function(a, b) { return a < b ? 1 : -1; });

        this.dateFormatPattern = "(" + keys.join("|") + ")";
        
        Event.observe(this.form, "submit", this.observers._formOnSubmit, false);
        
        this._init();

    },

    _replaceReserved: function(validatorName)
    {
        switch (validatorName)
        {
            case "dateType":
            case "numericType":
            case "intType":
            case "floatType":
            {
                return validatorName.replace("Type", "");
            }
            default:
            {
                return validatorName;
            }
        }
    },

    _getReserved: function(validatorName)
    {
        switch (validatorName)
        {
            case "date":
            case "numeric":
            case "int":
            case "float":
            {
                return validatorName + "Type";
            }
            default:
            {
                return validatorName;
            }
        }
    },
    
    /*
    Method: registerErrorMessage
        *Registers* a custom *error message* and custom *inline error message* for a *given fieldId, and className* (validation class). Note
        that this is *not* an error template, rather, it is the *final* error message that will be displayed.
    
    Parameters:
        fieldId - String, the ID of the field
        className - String, the validation class to attach error messages to
        errorMessage - String, the error message to display when validation on the field fails for the validation rule described by className.
        errorMessage - String, the inline error message to display when validation fails.
    
    Example:
        > validator.registerErrorMessage(
        >                                   $('username'), 
        >                                   "length-ge-6", 
        >                                   "Username must be at least 6 characters long", 
        >                                   "must be at least 6 characters long"
        >                               ); 

    */
    
    registerErrorMessage: function(fieldId, className, errorMessage, errorInlineMessage)
    {
        var nClassName = Jel.String.normalize(className);
        
        if (!this.errorMessages[fieldId])
            this.errorMessages[fieldId] = {};

        if (!this.errorInlineMessages[fieldId])
            this.errorInlineMessages[fieldId] = {};
            
        this.errorMessages[fieldId][nClassName] = errorMessage;
        this.errorInlineMessages[fieldId][nClassName] = errorInlineMessage ? errorInlineMessage : errorMessage; 
    },
    
    /*
    Method: disableFields
        *Prevents the specified fields from being regarded in form validation*. This would be essential if you have elements that are hidden or disabled based on the values
        of other elements, since you wouldn't want to display error messages for fields the user can't see or edit.

    Parameters:
        fieldId (variable) - String(s), A variable amount of element IDs for fields you want disregarded in validation, or the element "name" attribute for radio buttons and checkboxes
        
    Example:
        > validator.disableFields("billing-address", "billing-state", "billing-post-code", "billing-city", "billing-country"); 
        > // suppose you had a checkbox labelled "use shipping address" which disabled billing address fields
        > // which you wanted to disregard in validation 
        
    See also: <enableFields>
    */
    
    disableFields: function()
    {
        this._setDisabledFields(arguments, true);
    },

    /*
    Method: enableFields
        *Causes the specified fields to be regarded in form validation once again*. This would be generally called for fields tat had been previously disabled by <disableFields>.
        *IMPORTANT*: Don't call this method if you are adding new fields to the form and want them regarded in validation. Please use <addFields> instead for this purpose.

    Parameters:
        fieldId (variable) - String(s), A variable amount of element IDs for fields you want disregarded in validation, or the element "name" attribute for radio buttons and checkboxes
        
    Example:
        > validator.disableFields("billing-address", "billing-state", "billing-post-code", "billing-city", "billing-country"); 
        > // suppose you had a checkbox labelled "use shipping address" which disabled billing address fields
        > // which you wanted to disregard in validation 
        
    See also: <disableFields>
    */
    
    enableFields: function()
    {
        this._setDisabledFields(arguments, false);
    },
    
    /*
    Method: disableFieldByName
        *Prevents the fields with the specified name from being regarded in form validation*. This should only be used for radio buttons and checkboxes. 

    Parameters:
        name - String, the "name" attribute for radio buttons and checkboxes you want disabled (that is, to be ignored in validation).
        
    Example:
        > validator.disableFieldByName("interests"); 
        
    See also: <disableFields>, <enableFieldByName>
    */
    
    disableFieldByName: function(name)
    {
        this._setDisabledFieldByName(name, true);
    },

    /*
    Method: enableFieldByName
        *Causes fields with the specified name to be regarded in form validation once again*. This should only be used for radio buttons and checkboxes. 

    Parameters:
        name - String, the "name" attribute for radio buttons and checkboxes you want enabled.
        
    Example:
        > validator.disableFieldByName("interests"); 
        
    See also: <disableFieldByName>, <enableFields>
    */
    
    enableFieldByName: function(name)
    {
        this._setDisabledFieldByName(name, false);
    },
    
    /*
    Method: addFields
        *Registers the specified fields to be validated* by the form validator. This call is ESSENTIAL for fields that are added as the user interacts with the page, and it
        should be called *after* fields have been added inside the <form> tag for this validator. See below for why this is not handled automatically.

    Parameters:
        element (variable) - Element(s), a variable number of fields to add to the validator
        
    Reason for this method:
        For performance reasons, the form validator analyses the fields inside its associated form only when the class is constructed, where it builds quickly accessible information it can
        use for subsequent validations. It does not check for new fields in the form each time the form is validated, so you need to call this method if any new fields are added to the form.
        
    Example:
        > new Insertion.Top($("extra-credentials"), "<label for="alternate-username">Alternate Username:</label>" + 
        > "<input id="alternate-username" anme="alternate-username" class="length-ge-7" />" + 
        > "<div id="alternate-username-inline" class="inline"></div>");
        >
        > validator.addFields($("alternate-username")); 
        
    See also: <removeFields>
    */
    
    addFields: function()
    {
        this.elements.update();
        $A(arguments).each(this._setupField.bind(this));
    },

    /*
    Method: removeFields
        *Removes the specified fields* from the form validator. This call is ESSENTIAL for fields that are removed as the user interacts with the page, and it
        should be called *before* fields have been removed from the form. See <addFields> for a discussion of why this is not handled automatically.

    Parameters:
        element (variable) - Element(s), a variable number of fields to remove from the validator
 
    Example:
        > validator.removeFields($('alternate-username'));
        > $("extra-credentials").innerHTML = ""; // assuming "extra-credentials" had "alternate-username" control inside it.

    */
        
    removeFields: function()
    {
        this.elements.update();
        $A(arguments).each(this._dropField.bind(this));
    },
    
    /*
    Method: displayCulprit
        *displays* a *given field* as a *validation culprit*. While this method is best utilised internally by this class, it can be overridden to provide more sophisticated behaviour if so desired.
        
    Parameters:
        field - Element, the field to display as a culprit
        isInline - when called by this class, indicates whether this culprit display is occurring for inline validation (on field blur)
    
    Example:
        > validator.displayCulprit($('username'), true); 

    See also: <releaseCulprit>, <displayInline>
    */
    
    displayCulprit: function(field, isInline)
    {
        // displays a field that is in error
        Element.addClassName(field, this.options.culpritFieldClassName);
        Element.addClassName(this.labels[field.id], this.options.culpritLabelClassName);
    },

    /*
    Method: releaseCulprit
        *displays* a *given field* as being *valid*, that is, *NOT a validation culprit*. While this method is best utilised internally by this class, it can be overridden to provide more sophisticated behaviour if so desired.
        
    Parameters:
        field - Element, the field to display as a non-culprit
        isInline - when called by this class, indicates whether this non-culprit display is occurring for inline validation (on field blur)
    
    Example:
        > validator.releaseCulprit($('username'), true); 

    See also: <displayCulprit>, <releaseInline>
    */
    
    releaseCulprit: function(field)
    {
        // removes culprit status from a field (that is, it is now valid)
        Element.removeClassName(field, this.options.culpritFieldClassName);
        Element.removeClassName(this.labels[field.id], this.options.culpritLabelClassName);
    },

    /*
    Method: displayInline
        *displays* an *inline* element for a *validation culprit*. While this method is usually best utilised internally by this class, it can also be overridden to provide more sophisticated behaviour if so desired.
        
    Parameters:
        inline - Element, the inline element to display, for a culprit field
        message - String, the inline error message being displayed
         
    Example:
        > validator.displayInline($('username-inline'), "username already in use"); 

    See also: <displayCulprit>, <releaseInline>
    */

    displayInline: function(inline, message)
    {
        Element.show(inline);
        Element.update(inline, message);
    },

    /*
    Method: releaseInline
        *hides* an *inline* element for a field that is likely no longer a *validation culprit*. While this method is usually best utilised internally by this class, it can also be overridden to provide more sophisticated behaviour if so desired.
        
    Parameters:
        inline - Element, the inline element to hide, for a non-culprit field
         
    Example:
        > validator.releaseInline($('username-inline')); 

    See also: <displayInline>, <releaseCulprit>
    */
    
    releaseInline: function(inline)
    {
        Element.hide(inline);
        inline.innerHTML = "";
    },

    /*
    Method: classedCulprit
        *checks* if a given field is *currently classed as a culprit* (via CSS)
        
    Parameters:
        field - Element, the field to check
    */
    
    classedCulprit: function(field)
    {
        return Element.hasClassName(field, this.options.culpritFieldClassName);
    },

    /*
    Method: addCulprit
        *Marks* the given field as *a culprit field in the validation results*. This would be most useful in the onValidate callback (see options for <constructor>) to add a field as a culprit before results are displayed.
        This would generally be based on it failing some complex condition that can't be described simply by validation classes on the field. 
        Note that this does not display the fields as a culprit, it just registers it in the validation results.
        
    Parameters:
        field - Element, the field to register as a culprit
        errorMessage - String, the standard error message to associate with the culprit field in the results
        errorInlineMessage - String, the inline error message to associate with the culprit field in the results

    Example:
        > if (parseInt($('percentage-male') + parseInt($('percentage-female'))) != 100)
        >     validator.addCulprit($('percentage-male'), "Percentage Male and Female must total to 100 percent", "Must total to 100 percent"); 
        
    */
    
    addCulprit: function(field, errorMessage, errorInlineMessage)
    {
        if (!this._isCulprit(field))
        {
            this.results.errors.push(errorMessage);
            this.results.errorsById[field.id] = errorMessage;
            this.results.inlines.push(errorInlineMessage);
            this.results.inlinesById[field.id] = errorInlineMessage;
        
            this.results.culprits.push(field);
            
            if (Form.Element.isInputRadio(field) || Form.Element.isInputCheckbox(field))
            {
                this.nameErrors[field.name] = true;            
            }
        }
    },

    /*
    Method: submit
        *Attempts to submit the form associated with this validator*, by running all validation, and submitting if successful. Note that you
        *would only need to use this if you have not provided a proper submit* button, or input type="image" button, which is not recommended, since it may be inaccessible.
        If you have provided a submit or image, the validation will be automatically occur during the onsubmit event for the form.  
        
    Example:
        > validator.submit();
    */
    
    submit: function()
    {
        this.releaseCulprits();

        if (!this.validate())
        {
            this.displayCulprits();
            this.showResults(this.results);
            
            return false;
        }
        else
        {
            this.hideResults(this.results);

            var doSubmit = true;
            
            if (this.callbacks.onSubmit)
            {
                doSubmit = this.callbacks.onSubmit(this);
            }
            
            if (doSubmit)
            {
                this.form.submit();
            }
        }
    },

    /* 
    Method: validate
        *Validates the form associated with this validator*, and sets up validation results. Returns a boolean indicating if the validation as successful or not. 
        Generally, you won't need to call this method directly. 

    */

    validate: function()
    {
        // validates the entire form
        
        if (this._valid)
            return this._valid;
        
        this._prepareResults();
        
        // here, we need to cache the result of ths validation
        this._valid = true;
          
        $H(this.fields).each
        (
            function(pair)
            {
                this.checkField(pair.value);
            }
            .bind(this)
        );
        
        // run a custom onValidate callback, if provided
        
        if (this.callbacks.onValidate)
        {
            this._valid = this.callbacks.onValidate(this) && this._valid;
        }
        
        this.justValidated = true;
        
        return this._valid;
    },
    
    /* 
    Method: displayCulprits
        *Displays all of the current culprit fields* for the latest validation. This is *called automatically* after validation occurs if any *culprits are present*. 
        
    */
    
    displayCulprits: function()
    {
        this._valid = null;
        
        this.results.culprits.each
        (
            function(field)
            {
                this.displayCulprit(field, false);
                
                var inline = this.getInline(field);

                if (inline)
                    this.displayInline(inline, this.results.inlinesById[field.id]);
            }
            .bind(this)
        );
         
        if (this.results.culprits.length > 0)
        {
            // focus the first culprit
            if (this.results.culprits[0].focus)
                this.results.culprits[0].focus();

            // select the first culprit, if applicable
            if (this.results.culprits[0].select)
                this.results.culprits[0].select();
                
            this.justValidated = false;
        }
    },

    /* 
    Method: releaseCulprits
        *Shows all of the form fields as non-culprit*. This is *called automatically before validation* to clear any previous validation state.  
    
    */

    releaseCulprits: function()
    {
        $A(this.form.elements).each
        (
            function(field)
            {
                this.releaseCulprit(field);

                var inline = this.getInline(field);

                if (inline)
                    this.releaseInline(inline);
            }
           .bind(this)
        );
    },

    /* 
    Method: showResults
        *Displays the results of the validation*, *based on options* specified in the <constructor> method. This is *called automatically on form submit*.

    Parameters:
        results - Hash, a hash containing a number of properties that describe the results of validation. See below for more details.
        
    Results Hash:
        culprits - Array, an array of the culprit fields, that is those that have caused the validation to fail
        errors - Array, an array of error messages. This is useful if you want to "split" the error messages without needing to know what fields they belong to
        errorsById - Hash, an object hash of error messages, indexed by their corresponding culprit field ID.
        inlines - Array, an array of the inline error messages. The inline messages are generally the same as the standard error messages, but without reference to the field itself, since they are intended to be displayed adjacent to the field.
        inlinesById - Hash, an object hash of the inline error messages, indexed by their corresponding culprit field ID.
        
    See also: <hideResults>, <showResultsAlert>, <showResultsList>

    */

    showResults: function(results)
    {
        if (this.options.resultsContainer)
        {
            this.showResultsList(results, this.options.resultsContainer);
        }
        
        if ( (!this.options.resultsContainer && !this.callbacks.onShowResults) || this.options.resultsAlert)
        {
            // either no error handling has been provided (so default to showing alert), or the options have explicitly requested an alert
            this.showResultsAlert(results);
        }
        
        if (this.callbacks.onShowResults)
        {
            this.callbacks.onShowResults(results, this);
        }
    },

    /* 
    Method: hideResults
        *Hides the results of the validation*, and also any inlines associated with previous validations (if visible). This is *called automatically just before form submit* if the form is valid.

    Parameters:
        results - Hash, a hash containing a number of properties that describe the results of validation. See the reference under <showResults> for details.
    
    See also: <showResults>, <hideResultsList>
    */
    
    hideResults: function(results)
    {
        // hide the error container if it's being used
                
        if (this.options.resultsContainer)
        {
            this.hideResultsList(results, this.options.resultsContainer);
        }
        
        // hide any inlines that may be showing
        
        if (this.options.suffixInline)
        {
            this.results.culprits.each
            (
                function(field)
                {
                    var inline = this.getInline(field);

                    if (inline)
                        this.releaseInline(inline);
                }
                .bind(this)
            );
        }
    },

    /*
    Method: showResultsAlert
        The method called to *display the validation results as a JavaScript alert*, if the options specify this (see <constructor> for more). This could be overridden to provide more specific functionality. 

    Parameters:
        results - Hash, a hash containing a number of properties that describe the results of validation. See the reference under <showResults> for details.
    
    See also: <showResults>, <showResultsList>
    */
    
    showResultsAlert: function(results)
    {
        // the default way to display errors is a simple alert box
        var errorLines = [];
        
        $A(results.errors).each
        (
            function(error)
            {
                errorLines.push(Jel.String.wrapToLines(error, Jel.FormValidator.ALERT_WRAP_LENGTH).join("\n    "));
            }
        );
    
        var errorMessage = Jel.Lang.FormValidator.ERRORS_TITLE + "\n\n - " + errorLines.join("\n\n - ");
        alert(errorMessage);
    },

    /*
    Method: showResultsList
        The method called to *display the validation results inside a DOM container* (controlled via the *resultsContainer option* in <constructor>). The default behaviour is to display an intro paragraph, which is in the language string Jel.Lang.FormValidator.ERRORS_TITLE, followed by an unordered list.
        This could be overridden to provide more specific functionality. 

    Parameters:
        results - Hash, a hash containing a number of properties that describe the results of validation. See the reference under <showResults> for details.
        container - Element, the container to show results in 
    
    See also: <showResults>, <showResultsAlert>, <hideResultsList>
    */

    showResultsList: function(results, container)
    {
        container.style.display = 'block';
        Element.update(container, '<p>' + Jel.Lang.FormValidator.ERRORS_TITLE + '</p>' + '<ul><li>' + results.errors.join('</li><li>') + '</li></ul>');
    },

    /*
    Method: hideResultsList
        The method called to *hide the DOM container that validation results are displayed in* (controlled via the *resultsContainer option* in <constructor>). 

    Parameters:
        results - Hash, a hash containing a number of properties that describe the results of validation. See the reference under <showResults> for details.
        container - Element, the container to hide 
        
    See also: <showResults>, <showResultsAlert>, <showResultsList>
    */

    hideResultsList: function(results, container)
    {
        container.style.display = 'none';
        container.innerHTML = '';
    },

    /*
    Method: formatFieldLabel
        The default method for formatting a field label when displaying them in validation error messages or inline error messages. This can be overridden by specifying the
        formatFieldLabel callback in <constructor> options, or you may wish to override this default method for a custom class derived from FormValidator.  
    
    Parameters:
        text - String, the text for the field label (usually the innerHTML of its associated <label> element)
        field - Element, the field being displayed
    */
    
    formatFieldLabel: function(text, field)
    {
        return Jel.String.trim(text.replace(/[:\*]/gi, ''));
    },

    /*
    Method: formatDateFormat
        The default method for formatting date format strings when displaying them in validation error messages or inline error messages. This can be overridden by specifying the
        formatDateFormat callback in <constructor> options, or you may wish to override this default method for a custom class derived from FormValidator.  
    
    Parameters:
        format - String, the date format string. These are usually one of the properties in the <Jel.Date.HUMAN_FORMAT> hash, that is, a date format string as understood by humans.
    */
    
    formatDateFormat: function(format)
    {
        return format;
    },
    
    /*
    Method: validateField
        *Validates a single given field* in the form associated with this validator, and sets up the results for just this field. This is called by the on blur event for the field if inline validation is setup
        
    Parameters:
        field - Element, the field to validate
    
    Returns:
        true - if the field is valid
        false - otherwise
    
    Example:
        > validator.validateField($('username'));
    */
    
    validateField: function(field)
    {
        this._prepareResults();
        return this.checkField(field);
    },

    
    /*
    Method: checkField
        *Checks if a given field* is valid within the form associated with this validator. This is called for each field in the form when attempting to submit.
        
    Parameters:
        field - Element, the field to validate
        compareOnly - Boolean, whether the check is simply for comparison which doesn't generate errors, and is mainly used for comparing two fields with each other.
    
    Returns:
        true - if the field is valid
        false - otherwise
    
    Example:
        > validator.checkField($('username'));
    */

    checkField: function(field, compareOnly)
    {
        var valid = true;

        if (!this.disabled[field.id] || compareOnly)
        {
            
            if (!Element.hasClassName(field, "required") && this.isFieldEmpty(field))
            {
                // first, if the field is not required, and empty, then validation always passes
                return true;
            }
            else if (Element.hasClassName(field, "required") && this.isFieldEmpty(field))
            {
                // check if this field has been provided first, since other validators depend on this being checked first
            
                var validatorName = "required";
            
                if (Form.Element.isInputCheckbox(field))
                    validatorName = "required_checkbox";
                else if (Form.Element.isInputRadio(field))
                    validatorName = "required_radio";
                else if (Form.Element.isSelect(field))
                    validatorName = "required_select";
                
                this._prepareErrorMessage(field.id, this.fieldLabels[field.id], "required", validatorName, {});
            
                var errorMessage = this.errorMessages[field.id]["required"];
                var errorInlineMessage = this.errorInlineMessages[field.id]["required"];

                if (!compareOnly)
                {
                    this.addCulprit(field, errorMessage, errorInlineMessage);
                    this._setValid(false);
                }
                    
                return false; // don't perform any more validation
            }
        
        
            field.className.split(" ").each
            (
                function(className)
                {
                    var nClassName = Jel.String.normalize(className);
        
                    if (valid)
                    {
                        if (nClassName != 'required')
                        {
                            var matches = nClassName.match(new RegExp(this.validatorPattern, "i"));
                
                            if (matches)
                            {
                                var validatorName = matches[1];
                                
                                var info = this._parseValidationClass(nClassName, validatorName);
                                
                                if (info)
                                {
                                    if (this.validators[this._getReserved(validatorName.camelize())])
                                    {
                                        valid = this.validators[this._getReserved(validatorName.camelize())](field.value, info);
                                        
                                        if (!compareOnly)
                                        {
                                            // we should not validate this field if it is being compared to a field that is not yet valid itself
                                            if 
                                            ( 
                                                 (info.compareField != null && $(info.compareField) != null  && !this.checkField($(info.compareField), true)) ||
                                                 (info.lowerField != null   && $(info.lowerField) != null    && !this.checkField($(info.lowerField), true)) ||
                                                 (info.upperField != null   && $(info.upperField) != null    && !this.checkField($(info.upperField), true)) 
                                            )
                                            {
                                                this._addValue(field, valid);

                                                return;
                                            }   
                                        }
                                
                                        this._prepareErrorMessage(field.id, this.fieldLabels[field.id], nClassName, validatorName.camelize(), info);
                                
                                        var errorMessage = this.errorMessages[field.id][nClassName];
                                        var errorInlineMessage = this.errorInlineMessages[field.id][nClassName];
                                    }
                            
                                    if (!valid && !compareOnly)
                                    {
                                        this.addCulprit(field, errorMessage, errorInlineMessage);
                                    }
                            
                                    if (!compareOnly)
                                        this._setValid(valid);
                                }
                            }
                        }
                    }
                
                    this._addValue(field, valid);
                }    
                .bind(this)
            );
        
        }
        return valid;
    },

    /*
    Method: isFieldEmpty
        *Checks if a given field is "empty" within the form.* For textareas and text inputs, this is when the field value is the empty string. 
        For checkboxes and radios, a field is empty if all of the fields with the same name are unchecked. A select is empty if its value is equal to options.selectEmptyValue (see <constructor>).
        This is generally the first check done when a field has the validation class "required".
        
    Parameters:
        field - Element, the field to check for emptiness
    
    */
    
    isFieldEmpty: function(field)
    {
        if (Form.Element.isInputRadio(field) || Form.Element.isInputCheckbox(field))
        {
            // check to see if any of the other fields with this name are empty
            var checked = !$A(this.nameFields[field.name]).any( function(field) { return field.checked; } );
            
            return checked;
        }
        else if (Form.Element.isSelect(field))
        {
            return Jel.String.trim(field.value) == this.options.selectEmptyValue;
        }
        else
        {
            return Jel.String.trim(field.value) == ''; 
        }
    },

    /*
    Method: getInline
        *Gets the inline error message container* for a given field.
        
    Parameters:
        field - Element, the field to get an inline container for
    
    */

    getInline: function(field)
    {
        if (this.options.suffixInline)
        {
            var inline = $(field.id + this.options.suffixInline) || $(field.name + this.options.suffixInline);
                        
            return inline;
        } 
    },
    
    /* Remaining properties are private and should not be called */
     
    _fieldOnBlur: function(event)
    {
        if (!this.justValidated)
        {
            var field = Event.element(event);
            var inline = this.getInline(field);
            
            // inline validation should NEVER remove errors set by the non-inline validation, as this would be bad behaviour
        
            if (!this.isFieldEmpty(field))
            {
                // inline validation is more annoying than useful on empty fields, even if they are required
            
                var valid = this.validateField(field);
            
                if (!valid)
                {
                    this.inlineFields[field.id] = true;
                    this.displayCulprit(field, true);
                    
                    if (inline)
                        this.displayInline(inline, this.results.inlinesById[field.id]);
                }
                else
                {
                    this.inlineFields[field.id] = false;
                    this.releaseCulprit(field, true);
                    
                    if (inline)
                        this.releaseInline(inline);
                }
            }
            else
            {
                if (this.inlineFields[field.id])
                {
                    this.inlineFields[field.id] = false;
                    this.releaseCulprit(field, true);
                    
                    if (inline)
                        this.releaseInline(inline);
                }
            }
        }
        else
            this.justValidated = false;
    },

    _formOnSubmit: function(event)
    {
        this.releaseCulprits();

        if (!this.validate())
        {
            this.displayCulprits();
            this.showResults(this.results);
            
            Event.stop(event);
        }
        else
        {
            this.hideResults(this.results);
            
            var doSubmit = true;
        
            // check for the onSubmit callback
        
            if (this.callbacks.onSubmit)
            {
                doSubmit = this.callbacks.onSubmit(this);
            }
            
            if (!doSubmit)
            {
                // stop the event if onSubmit returned false (hijacking a form would be a valid approach for AJAX applications)
                Event.stop(event);
            }
        }
        
        this._valid = null;
    },
    
    _prepareResults: function()
    {
        this.fieldErrors = {};
        this.fieldInlineErrors = {};

        this.results =
        {
            culprits: [],

            errors: [],
            errorsById: {},

            inlines: [],
            inlinesById: {}
        };
        
        this.nameErrors = {};
    },
    
    _addValue: function(field, valid)
    {
        if (valid && valid.value)
            this.values[field.id] = valid.value;
    },
    
    _setValid: function(valid)
    {
        if (this._valid && !valid)
            this._valid = false;
    },
    
    _isCulprit: function(field)
    {
        return this.results.culprits.indexOf(field) != -1 || this.nameErrors[field.name];
    },
    
    _prepareErrorMessage: function(fieldId, fieldLabel, className, validatorName, info)
    {        
        if (this.errorMessages && this.errorMessages[fieldId] && this.errorMessages[fieldId][className])
            return this.errorMessages[fieldId][className];
        
        var errorTemplate;
        var errorInlineTemplate;
        var errorMessage;
        var errorInlineMessage;
        
        errorTemplate = this.errorTemplates[Jel.String.decamelize(validatorName, "_").toUpperCase()];

        
        if (info.formatKey)
        {
            errorTemplate = errorTemplate.replace("[format]", this.formatDateFormat(Jel.Date.HUMAN_FORMAT[this._getFormatKey(info.formatKey)]));
        }
        
        if (info.compare != null || info.compareField != null)
            errorTemplate = errorTemplate.replace("[compare]", info.compareField ? this.callbacks.formatFieldLabel(this.fieldLabels[info.compareField], info.compareField) : this._getCompareDisplay(info.compare, info.format));

        if (info.lower != null)
            errorTemplate = errorTemplate.replace("[lower]", info.lowerField ? this.callbacks.formatFieldLabel(this.fieldLabels[info.lowerField], info.lowerField) : this._getCompareDisplay(info.lower, info.format));
        
        if (info.upper != null)
            errorTemplate = errorTemplate.replace("[upper]", info.upperField ? this.callbacks.formatFieldLabel(this.fieldLabels[info.upperField], info.upperField) : this._getCompareDisplay(info.upper, info.format));
        
        errorTemplate = errorTemplate.replace("[inclusive]", info.inclusive ? " " + Jel.Lang.FormValidator.TERM_INCLUSIVE : "");
        
        errorInlineTemplate = errorTemplate;

        errorMessage = errorTemplate.replace("[field_label]", this.callbacks.formatFieldLabel(fieldLabel, this.fields[fieldId]) + " ");
        errorInlineMessage = errorInlineTemplate.replace("[field_label]", "");

        // cache the error message
        this.registerErrorMessage(fieldId, className, errorMessage, errorInlineMessage);
    },
    
    _getFormatKey: function(key)
    {
        // transforms a lowercase key into the appropriate key for the Date extensions
        return Jel.String.decamelize(key.camelize(), "_").toUpperCase();
    },
    
    _getDateFormat: function(key)
    {
        return Jel.Date.FORMAT[Jel.String.decamelize(key.camelize(), "_").toUpperCase()];        
    },
    
    _getCompareDisplay: function(value, format)
    {
        if (format && this._getDateFormat(format))
        {
            // format the value as if it is a date
            return this._getDateCompare(value, format);
        }
        
        if (!Jel.Validator.numericType(value))
            return '"' + value + '"';
            
        return value;
    },
    
    _getDateCompare: function(value, format)
    {
        // first, assume they have specified the time in UTC format with a "T" delimiter, but without special symbols (:, and -)
        var ret = Jel.Date.convert(value, "YmdTGis", format);
          
        if (ret)
        {
            return ret;
        }
        else
        {
            // assume they have specified UTC, Year Month Day only
            var ret = Jel.Date.convert(value, "Ymd", format);
            
            if (ret)
            {
                return ret;
            }
        }
        
        return value;
    },
    
    _parseValidationClass: function(className, validatorName)
    {
        // returns an info object for use with the validation routine
        
        var matches;
        var info = {};
        
        switch (validatorName)
        {
            case "range":
            case "range-ci":
            case "int-range":
            case "float-range":
            case "numeric-range":
            case "length-range":
            {
                matches = className.match(validatorName + "(?:\-([\-A-Za-z0-9T]*?)(::|:)([\-A-Za-z0-9T]*?))$");
                
                if (matches)
                {
                    this._setValidatorBounds(matches[1], matches[3], matches[2], info);
                }
                else
                {
                    return false;
                }
                
                break;
            }
            case "date":       
            case "date-eq":    
            case "date-gt":    
            case "date-lt":    
            case "date-le":    
            case "date-ge":    
            case "date-future":
            case "date-past": 
            case "time":       
            case "time-eq":    
            case "time-gt":    
            case "time-lt":    
            case "time-le":    
            case "time-ge":    
            case "time-later":
            case "time-earlier": 
            {
                matches = className.match(validatorName + "(?:\-([\-A-Za-z0-9T]*?))?-" + this.dateFormatPattern + "$");
                        
                if (matches)
                {
                    if (matches[2])
                    {
                        info.format = this._getDateFormat(matches[2]);
                        info.formatKey = matches[2];
                    }
                    else
                    {
                        throw "time format needs to be provided in field " + field.id;
                    
                    }
                    this._setValidatorCompare(matches[1], info);
                }
                else
                {
                    return false;
                }
                
                break;
            }
            case "date-range":
            case "time-range":
            {
                matches = className.match(validatorName + "(?:\-([\-A-Za-z0-9T]*?)(::|:)([\-A-Za-z0-9T]*?))-" + this.dateFormatPattern + "$");
                
                if (matches)
                {
                    if (matches[4])
                    {
                        info.format = this._getDateFormat(matches[4]);
                        info.formatKey = matches[4];
                    }
                    else
                        throw "time format needs to be provided in field " + field.id;

                    this._setValidatorBounds(matches[1], matches[3], matches[2], info);
                }
                else
                {
                    return false;
                }
                
                break;
            }
            default:
            {
                matches = className.match(validatorName + "(?:\-([\-A-Za-z0-9T]*?))$");
                
                
                if (matches)
                {
                    this._setValidatorCompare(matches[1], info);
                }
                else
                {
                    return false;
                }
                
                break;
            }
        }

        return info;
    },

    _setDisabledFieldByName: function(name, disabled)
    {
        if (this.nameFields[name] && this.nameFields[name].length)
        {
            this.nameFields[name].each
            (
                function(field)
                {
                    this._setDisabledFields([field.id], disabled);
                }
                .bind(this)
            );
        }
    },

    _setDisabledFields: function(fieldIds, disabled)
    {
        $A(fieldIds).each
        (
            function(fieldId)
            {
                if ($(fieldId))
                    this.disabled[fieldId] = disabled;
                else
                    this._setDisabledFieldByName(fieldId, disabled); // try to disable by field name
            }
            .bind(this)
        );    
    },
    
    _setValidatorCompare: function(key, info)
    {
        if (key)
        {
            info.compare = this._getCompareValue(key, info.format);
            
            var fieldId = key.replace(this.options.suffixCompareField, "");
            
            if (this.fields[fieldId] && fieldId != key)
                info.compareField = fieldId;

            if (info.compareField)
                info.compare = this.fields[fieldId].value;
        }
    },
    
    _setValidatorBounds: function(lower, upper, mode, info)
    {
        if (lower && upper && mode)
        {
            info.lower = this._getCompareValue(lower, info.format);
            info.upper = this._getCompareValue(upper, info.format);
                
            var lowerFieldId = lower.replace(this.options.suffixCompareField, "");
            var upperFieldId = upper.replace(this.options.suffixCompareField, "");
                    
            if (this.fields[lowerFieldId] && lowerFieldId != lower)
                info.lowerField = lowerFieldId;
            
            if (this.fields[upperFieldId] && upperFieldId != upper)
                info.upperField = upperFieldId;

            if (info.lowerField)
                info.lower = this.fields[lowerFieldId].value;

            if (info.upperField)
                info.upper = this.fields[upperFieldId].value;

            info.inclusive = (mode == '::');
        }
    },
    
    _getCompareValue: function(value, format)
    {
        if (format)
        {
            // convert to the correct date compare
            return this._getDateCompare(value, format);
        }
        else
        {
            // check for floating point values
            var matches = value.match(/[0-9]+?p[0-9]+/);
        
            if (matches)
            {
                return value.replace("p", ".");
            }
        }
        
        return value;
    },
    
    _setupField: function(field)
    {
        field = $(field);
        
        if (!field)
            throw ("setup field: field does not exist");
            
        if (field.id)
            this.fields[field.id] = field;
            
        // associate default field name (only works when field id is in correct language, most times will probably be english)
        this.fieldLabels[field.id] = this._idToPhrase(field.id);
        
        // if the form control is a checkbox or radio button, try to find an element with id = "for-[name]" where [name] matches the name attribute of the control
        // if found, regard this as the label
        
        if (Form.Element.isInputRadio(field) || Form.Element.isInputCheckbox(field))
        {
            if (field.name)
            {
                if ($('for-' + field.name))
                {
                    this.labels[field.id] = $('for-' + field.name);
                    this.fieldLabels[field.id] = Jel.String.trim($('for-' + field.name).innerHTML);
                }
            
                // store named fields for use later
                if (this.nameFields[field.name])
                    this.nameFields[field.name].push(field);
                else
                    this.nameFields[field.name] = [field];
            }
        }
        
        if (this.options.validateInline)
        {
            Event.observe(field, 'blur', this.observers._fieldOnBlur);
        }
    },
    
    _dropField: function(field)
    {
        field = $(field);

        delete this.fields[field.id];
        delete this.fieldLabels[field.id];
        delete this.labels[field.id];
        delete this.nameFields[field.name];
        delete this.errorMessages[field.id];
    },
    
    _idToPhrase: function(id)
    {
        return Jel.String.titleCase(Jel.String.normalize(id).replace("-", " "));
    },

    _associateLabel: function(label)
    {
        var forId;
        var element;
        
        if (label.attributes['for'])
        	forId = label.attributes['for'].value;	
        else
        	forId = label.getAttribute('for');
        
        if (forId)
            element = $(forId);
        
        if (element)
        {
            if (!this.labels[forId])
                this.labels[forId] = label;
            
            if (!this.nameFields[element.name])
                this.fieldLabels[forId] = Jel.String.trim(label.innerHTML);
        }
    },
    
    _init: function()
    {
        this._valid = null;
        
        this.elements = new Jel.ElementCache
                        (
                            {
                                labels: 'form#' + this.form.id + ' label'
                            } 
                        );
        
        this.validationErrors = {};
        
        this.inlineFields = {};
        
        this.values = {};
        
        this.inlines = {};
        this.fields = {};
        this.labels = {};
        this.nameFields = {};
        this.nameErrors = {};
        
        this.disabled = {};
        
        this.fieldLabels = {};
        this.errorMessages = {};
        this.errorInlineMessages = {};
        
        // cache our fields for reference in validation methods
        
        $A(this.form.elements).each
        (
            function(field)
            {
                this._setupField(field);
            }
            .bind(this)
        );
        
        // cache our labels
        this.elements.labels.each
        (
            this._associateLabel.bind(this)
        );
        
    }
},
{
    ALERT_WRAP_LENGTH: 28
}
);/*
    
    Title: English-Specific
    
    Group: Language
    
    Class: Jel.String
        Language-specific String functions
    
    Function: plural
        returns the plural of a given string, based on a given count. Observes a lot of the specific pluralisation rules in the English language (that is, not always just adding an s to the end of a word).
        
    Arguments:
        str - String, the word to pluralise if count != 1
        count -  Integer, affects whether the string is pluralised or not (not pluralised if this equals 1)
        
    Example:
        > Jel.String.plural("car", 2); // "cars"
        > Jel.String.plural("fly", 1); // "fly"
        > Jel.String.plural("fly", 2); // "flies"

*/

Jel.String.plural = function(str, count)
{
	if (count == 1)
		return str;
	else
	{
	    if (Jel.Lang.String.PLURAL_SPECIAL[str.toLowerCase()])
	        return Jel.Lang.String.PLURAL_SPECIAL[str.toLowerCase()];
	    else
	    {
    	    var ret;
    	    
    	    $H(Jel.String.PLURAL_SUFFIX_REPLACE).each
    	    (
    	        function(pair)
    	        {
    	            if (Jel.String.right(str.toLowerCase(), pair.key.length) == pair.key)
    	            {
    	                ret =  Jel.String.left(str, str.length - pair.key.length) + pair.value;
	                }
	            }
	        );
    	    
    	    if (ret)
    	        return ret;
    	        
    	    // if still not returned, simply add an s
    	    return str + 's';
    	}
	}
};

/*
    Function: an
        returns the word "an" or "a" for a given following word
        
    Arguments:
        str - String, the word to check
        
    Example:
        > Jel.String.an("apple"); // "an"
        > Jel.String.an("car"); // "a"

*/

Jel.String.an = function(str)
{
    if (Jel.String.left(str, 3) == "uni")
        return "an";
        
    switch (Jel.String.left(str, 2))
    {
        case "ut" :
            return "a";
    }
    
    switch (Jel.String.left(str, 1))
    {
        case 'a':
        case 'e':
        case 'i':
        case 'o':
        case 'u':
            return "an";
            break;
        default:
            return "a";
    }
};