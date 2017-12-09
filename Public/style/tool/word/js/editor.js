var current_active_ueitem = null;
var less_parser = new less.Parser;
//换色
function isGreyColor(color) {
    var c = rgb2hex(color);
    var r = "" + c.substring(1, 3);
    var g = "" + c.substring(3, 5);
    var b = "" + c.substring(5, 7);
    if (r == g && g == b) {
        return true;
    } else {
        return false;
    }
}

function rgb2hex(color) {
    rgb = color.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
    return (rgb && rgb.length === 4) ? "#" + ("0" + parseInt(rgb[1], 10).toString(16)).slice(-2) + ("0" + parseInt(rgb[2], 10).toString(16)).slice(-2) + ("0" + parseInt(rgb[3], 10).toString(16)).slice(-2) : color;
}

function setColor(obj, colorType, color) {
    var c = $(obj).css(colorType);
    if (c === 'transparent') {
        return;
    } else {
        if (!isGreyColor(c)) {
            $(obj).css(colorType, color);
        }
    }
}

function isLightenColor(color) {
    var c = rgb2hex(color);
    var r = ("" + c.substring(1, 3));
    var g = ("" + c.substring(3, 5));
    var b = ("" + c.substring(5, 7));
    if (r > 'C0' && g > 'C0' && b > 'C0') {
        return true;
    } else {
        return false;
    }
}

function getColor(color, type, num) {
    var str = '';
    less_parser.parse('*{color:' + type + '(' + color + ',' + num + ')}', function(err, tree) {
        str = tree.toCSS();
        str = str.replace(/\n/g, '').replace(/ /g, '').replace('*{color:', '').replace(';}', '');
    });
    return str;
}

function parseObject(obj, bgcolor, color) {
    if (isGreyColor(bgcolor)) {
        return false;
    }
    obj.find("*").each(function() {
        if (this.nodeName == "HR" || this.nodeName == "hr") {
            $(this).css('border-color', bgcolor);
            return;
        }
        if (this.nodeName == "") {
            return;
        }
        if ($(this).data('bcless')) {
            var persent = $(this).data('bclessp') ? $(this).data('bclessp') : '10%';
            var bc_color;
            if (isLightenColor(bgcolor) || $(this).data('bcless') == 'darken') {
                bc_color = getColor(rgb2hex(bgcolor), 'darken', persent);
            } else {
                bc_color = getColor(rgb2hex(bgcolor), 'lighten', persent);
            }
            $(this).css('borderBottomColor', bc_color);
            $(this).css('borderTopColor', bc_color);
            $(this).css('borderLeftColor', bc_color);
            $(this).css('borderRightColor', bc_color);
        } else {
            setColor(this, 'borderBottomColor', bgcolor);
            setColor(this, 'borderTopColor', bgcolor);
            setColor(this, 'borderLeftColor', bgcolor);
            setColor(this, 'borderRightColor', bgcolor);
        }
        if ($(this).data('ct') == 'fix') {
            return;
        }
        var bgimg = $(this).css('backgroundImage');
        if (bgimg.substring(0, 24) == '-webkit-linear-gradient(') {
            var colors;
            var type;
            if (bgimg.substring(0, 30) == '-webkit-linear-gradient(left, ') {
                type = 'left';
                colors = bgimg.substring(30, (bgimg.length - 1));
            } else if (bgimg.substring(0, 29) == '-webkit-linear-gradient(top, ') {
                type = 'top';
                colors = bgimg.substring(29, (bgimg.length - 1));
            } else if (bgimg.substring(0, 31) == '-webkit-linear-gradient(right, ') {
                type = 'right';
                colors = bgimg.substring(31, (bgimg.length - 1));
            } else if (bgimg.substring(0, 32) == '-webkit-linear-gradient(bottom, ') {
                type = 'bottom';
                colors = bgimg.substring(32, (bgimg.length - 1));
            }
            var color_arr = colors.split('),');
            var txt_color, gradient_color, main_color;
            if (isLightenColor(bgcolor)) {
                txt_color = getColor(rgb2hex(bgcolor), 'darken', '50%');
                txt_color = getColor(rgb2hex(txt_color), 'saturate', '30%');
                gradient_color = getColor(rgb2hex(bgcolor), 'darken', '10%');
                main_color = getColor(rgb2hex(bgcolor), 'saturate', '20%');
            } else {
                txt_color = '#FFF';
                getColor(rgb2hex(bgcolor), 'lighten', '50%');
                gradient_color = getColor(rgb2hex(bgcolor), 'lighten', '10%');
                main_color = getColor(rgb2hex(bgcolor), 'lighten', '5%');
                main_color = getColor(rgb2hex(main_color), 'desaturate', '10%');
                main_color = getColor(rgb2hex(main_color), 'fadein', '20%');
            }
            if (color_arr.length == 3) {
                $(this).css('backgroundImage', '-webkit-linear-gradient(' + type + ', ' + main_color + ', ' + gradient_color + ', ' + main_color + ')');
                $(this).css('color', txt_color);
            } else if (color_arr.length == 2) {
                $(this).css('backgroundImage', '-webkit-linear-gradient(' + type + ', ' + main_color + ', ' + gradient_color + ')');
                $(this).css('color', txt_color);
            }
            return;
        }
        var persent = $(this).data('clessp') ? $(this).data('clessp') : '50%';
        var bgC = $(this).get(0).style.backgroundColor;
        if ($(this).data('bgless')) {
            var bgpersent = $(this).data('bglessp') ? $(this).data('bglessp') : '30%';
            var bg_color;
            if ($(this).data('bgless') == "true" || $(this).data('bgless') == true) {
                if (isLightenColor(bgcolor)) {
                    bg_color = getColor(rgb2hex(bgcolor), 'darken', bgpersent);
                    bg_color = getColor(rgb2hex(bg_color), 'saturate', '20%');
                } else {
                    bg_color = getColor(rgb2hex(bgcolor), 'lighten', bgpersent);
                }
            } else {
                bg_color = getColor(rgb2hex(bgcolor), $(this).data('bgless'), bgpersent);
            }
            if (isLightenColor(bg_color)) {
                txt_color = getColor(rgb2hex(bg_color), 'darken', persent)
            } else {
                txt_color = color;
            }
            $(this).css('backgroundColor', bg_color);
            $(this).css('color', txt_color);
        } else if (!isGreyColor(bgC)) {
            $(this).css('backgroundColor', bgcolor);
            var txt_color;
            if (isLightenColor(bgcolor)) {
                txt_color = getColor(rgb2hex(bgcolor), 'darken', persent)
            } else {
                txt_color = color;
            }
            $(this).css('color', txt_color);
        } else {
            var fc = $(this).get(0).style.color;
            if (fc && fc != "" && fc != 'inherit' && !isGreyColor(fc)) {
                $(this).css('color', bgcolor);
            }
        }
    });
    return obj;
}