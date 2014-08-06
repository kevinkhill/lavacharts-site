/* jshint strict:true  */
/* global machineZeros:true  */

jQuery(function($){
    intOnly();

    $('#select').click(function() {
        var text = document.getElementById('code');
        var selection = window.getSelection();
        var range = document.createRange();

        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);
    });

    $('#save').click(function() {
        var code     = $('#code').text();
        var filename = $('#program_title').val().toUpperCase();

        if(filename !== '') {
            $.post('/cgi-bin/save.py',
                {
                    'program'  : code,
                    'filename' : filename
                },
                function(data) {
                    //console.log(data);

                    var output = '<h1>Program Saved to Disk</h1>';
                        output += '<p>' + data.location + '</p>';

                    if(data.copied) {
                        output += '<p>+ Copied to flashdrive.</p>';
                    } else {
                        output += '<p>Flashdrive was not found.</p>';
                    }

                    $('#result').html(output);
                }
            );
        } else {
            alert('You must enter a filename.');
        }

        return false;
    });

    checkFlashdrive();
    setInterval(function() {
        checkFlashdrive();
    }, 2000);

    $('#program_num').keyup(function() {
        $('#code_program_num').text($(this).val());
    });

    $('#program_title').keyup(function() {
        $('#code_program_title').text($(this).val());
    });

    $('#npt1-4_plus').click(function() {
        var counter = $('#npt1-4_num');
        var count = counter.val();
        counter.val(++count);

        generate_1_4_NPT();
        bindLocationEvents();
    });

    $('#npt1-4_minus').click(function() {
        var counter = $('#npt1-4_num');
        var count = counter.val();
            count = ((count-1) == -1 ? 0 : --count);
        counter.val(count);

        generate_1_4_NPT();
        bindLocationEvents();
    });

    $('#npt1-8_plus').click(function() {
        var counter = $('#npt1-8_num');
        var count = counter.val();
        counter.val(++count);

        generate_1_8_NPT();
        bindLocationEvents();
    });

    $('#npt1-8_minus').click(function() {
        var counter = $('#npt1-8_num');
        var count = counter.val();
            count = ((count-1) == -1 ? 0 : --count);
        counter.val(count);

        generate_1_8_NPT();
        bindLocationEvents();
    });
/*
    $('#npt1-4_num').bind('keyup click', function() {
        generate_1_4_NPT();
        $('.location').keyup(function() {
            fillCode(fetchData());
        });
    });

    $('#npt1-8_num').bind('keyup click', function() {
        generate_1_8_NPT();
        $('.location').keyup(function() {
            fillCode(fetchData());
        });
    });
*/
    $('#part_length, #part_diameter, .location').keyup(function() {
        var xshaft = fetchData();
        fillCode(xshaft);
    });

});
