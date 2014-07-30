/* jshint strict:true  */
/* global machineZeros:true  */

function round_float(x) {
    return parseFloat(Math.round((x * 1000) / 1000)).toFixed(4);
}

function dot(num) {
    var tmp = round_float(num).toString().indexOf('.') == -1 ? num + '.' : num;

    return isNaN(tmp) ? '0.' : tmp.toFixed(4).replace(/0+$/, '');
}

function fetchData() {
    //var xshaft = {};
    var locations = [];
    var count = 0;

    $('.location').each(function() {
        if($(this).hasClass('npt1-8')) {
            locations[count++] = {
                'type' : '1/8',
                'location' : parseFloat($(this).val())
            };
        }

        if($(this).hasClass('npt1-4')) {
            locations[count++] = {
                'type' : '1/4',
                'location' : parseFloat($(this).val())
            };
        }
    });

    return {
        'length'    : parseFloat($('#part_length').val()),
        'diameter'  : parseFloat($('#part_diameter').val()),
        'locations' : locations
    };
}

function fillCode(xshaft) {
    var holesPosOrder = [],
        holesNegOrder = [],
        holes_1_4_loc_pos = [],
        holes_1_8_loc_pos = [],
        holes_1_4_loc_neg = [],
        holes_1_8_loc_neg = [];

    var locations_spot_drill = '',
        locations_spot_drill_start = '',
        locations_spot_drill_start_depth = '',
        locations_r_drill_start = '',
        locations_r_drill = '',
        locations_7_16_drill_start = '',
        locations_7_16_drill = '',
        locations_1_4_tap_start = '',
        locations_1_4_tap = '',
        locations_1_8_tap_start = '',
        locations_1_8_tap = '';

    for(var num in xshaft.locations) {
        if(xshaft.locations[num].type == '1/4') {
            holes_1_4_loc_pos.push(xshaft.locations[num].location);
        }
    }
    holes_1_4_loc_neg = Array.prototype.slice.call(holes_1_4_loc_pos);
    holes_1_4_loc_neg.reverse();

    for(var num2 in xshaft.locations) {
        if(xshaft.locations[num2].type == '1/8') {
            holes_1_8_loc_pos.push(xshaft.locations[num2].location);
        }
    }
    holes_1_8_loc_neg = Array.prototype.slice.call(holes_1_8_loc_pos);
    holes_1_8_loc_neg.reverse();

    holesPosOrder = Array.prototype.slice.call(xshaft.locations);
    holesPosOrder.sort(function(a, b) {
        var avalue = a.location,
            bvalue = b.location;
        if (avalue < bvalue) { return -1; }
        if (avalue > bvalue) { return 1; }
        return 0;
    });

    holesNegOrder = Array.prototype.slice.call(holesPosOrder);
    holesNegOrder.reverse();

    for(var num3 in holesPosOrder) {
        if(num3 == 0) {
            if(holesPosOrder[num3].type == '1/4') {
                locations_spot_drill_start_depth = '-.16';
                locations_spot_drill_start = dot(holesPosOrder[num3].location);
            }

            if(holesPosOrder[num3].type == '1/8') {
                locations_spot_drill_start_depth = '-.13';
                locations_spot_drill_start = dot(holesPosOrder[num3].location);
            }
        } else {
            if(holesPosOrder[num3].type == '1/4') {
                locations_spot_drill += 'X' + dot(holesPosOrder[num3].location) + ' Z-.16\n';
            }

            if(holesPosOrder[num3].type == '1/8') {
                locations_spot_drill += 'X' + dot(holesPosOrder[num3].location) + ' Z-.13\n';
            }
        }
    }

    for(var num4 in holes_1_8_loc_neg) {
        if(num4 == 0) {
            locations_r_drill_start += 'X' + dot(holes_1_8_loc_neg[num4]);
        } else {
            locations_r_drill += 'X' + dot(holes_1_8_loc_neg[num4]) + '\n';
        }
    }

    for(var num5 in holes_1_4_loc_pos) {
        if(num5 == 0) {
            locations_7_16_drill_start += 'X' + dot(holes_1_4_loc_pos[num5]);
        } else {
            locations_7_16_drill += 'X' + dot(holes_1_4_loc_pos[num5]) + '\n';
        }
    }

    var centerofpart = -53.0;
    var cluf_x = -53.0;

    if(xshaft.length >= 20.0) {
        centerofpart = -65.25;
        cluf_x = -65.0;
    }
    if(xshaft.length >= 50.0){
        centerofpart = -53.0;
        cluf_x = -53.0;
    }
    if(xshaft.length >= 80.0){
        centerofpart = -65.25;
        cluf_x = -65.0;
    }
/*
    console.log(xshaft.length);
    console.log(xshaft.length/2);
    console.log(centerofpart - (xshaft.length / 2));
    console.log(dot(centerofpart - (xshaft.length / 2)));
*/
    $('#code_g10_x').text(dot(centerofpart - (xshaft.length / 2)));
    $('#code_g10_y').text(dot(machineZeros.y - (xshaft.diameter / 2)));
    $('#code_g10_z').text(dot(machineZeros.z + xshaft.diameter));
    $('.clfu_x').text(dot(cluf_x));
    $('#code_spot_drill_start').text(locations_spot_drill_start);
    $('#code_spot_drill_start_depth').text(locations_spot_drill_start_depth);
    $('#code_spot_drill_locations').text(locations_spot_drill);
    $('#code_r_drill_start').text(locations_r_drill_start);
    $('#code_r_drill_locations').text(locations_r_drill);
    $('#code_7_16_drill_start').text(locations_7_16_drill_start);
    $('#code_7_16_drill_locations').text(locations_7_16_drill);
    $('#code_1_8_npt_start').text(locations_r_drill_start);
    $('#code_1_8_npt_locations').text(locations_r_drill);
    $('#code_1_4_npt_start').text(locations_7_16_drill_start);
    $('#code_1_4_npt_locations').text(locations_7_16_drill);
}

function intOnly() {
    $('.int').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
}

function generate_1_8_NPT() {
    var count = $('#npt1-8_num').val();

    var inputs = '';

    for(var i = 0; i < count; i++) {
        inputs += '<div class="input-group">';
            inputs += '<span class="input-group-addon">X<sub>'+(i+1)+'</sub></span>';
            inputs += '<input class="int form-control location npt1-8" id="npt1-8_hole'+i+'" />';
        inputs += '</div><br />';
    }

    $('#npt1-8_table').html(inputs);

    intOnly();
}

function generate_1_4_NPT() {
    var count = $('#npt1-4_num').val();

    var inputs = '';

    for(var i = 0; i < count; i++) {
        inputs += '<div class="input-group">';
            inputs += '<span class="input-group-addon">X<sub>'+(i+1)+'</sub></span>';
            inputs += '<input class="int form-control location npt1-4" id="npt1-4_hole'+i+'" />';
        inputs += '</div><br />';
    }

    $('#npt1-4_table').html(inputs);

    intOnly();
}

function bindLocationEvents() {
    $('.location').keyup(function() {
        fillCode(fetchData());
    });
}


function checkFlashdrive() {
    $.post('/cgi-bin/flashdrive.py',
        function(data) {
            if(data.found) {
                $('#flashdrive-present').show();
                $('#flashdrive-missing').hide();
            } else {
                $('#flashdrive-present').hide();
                $('#flashdrive-missing').show();
            }
        }
    );
}
