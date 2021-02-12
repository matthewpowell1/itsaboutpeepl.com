<?php

$peepl_colors = array(
    'black' => '#000000',
    'dark_grey' => '#28303D',
    'taupe' => '#A09F9E',
    'red' => '#FC0C1A',
    'orange' => '#FC870C',
    'yellow' => '#FCCA0C',
    'green' => '#7EBD46',
    'teal' => '#46BDB1',
    'blue' => '#2B70DF',
    'white' => '#FFFFFF',
    'pale_grey' => '#F2F2F2',
    'cream' => '#F5F2EB',
    'pale_red' => '#F7E9EA',
    'pale_orange' => '#F9EEE3',
    'pale_yellow' => '#FFF8DD',
    'pale_green' => '#EBF6E2',
    'pale_teal' => '#E7F9F7',
    'pale_blue' => '#EDF3FC'
);

function peepl_default_background_setup(){
    global $peepl_colors;

    // This should be set to whatever the CSS defines
    // the default body background color to be.
    $default_background_color = $peepl_colors['cream'];

    add_theme_support(
        'custom-background',
        array(
            'default-color' => trim( $default_background_color, '#' ),
        )
    );
}

// Since `add_theme_support` merges the `custom-background` settings it’s given,
// and according to the source code for the function, "The first value registered wins",
// our custom backgorund color has to be defined *before* the parent theme sets
// its own default background colour. So we use priority=9, to sneak in before the
// parent theme’s call to add_action() with the default priority (10).
add_action( 'after_setup_theme', 'peepl_default_background_setup', 9 );


function peepl_editor_color_palette_setup(){
    global $peepl_colors;

    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => esc_html__( 'Black', 'peepl' ),
                'slug'  => 'black',
                'color' => $peepl_colors['black'],
            ),
            array(
                'name'  => esc_html__( 'Dark grey', 'peepl' ),
                'slug'  => 'dark-grey',
                'color' => $peepl_colors['dark_grey'],
            ),
            array(
                'name'  => esc_html__( 'Taupe', 'peepl' ),
                'slug'  => 'taupe',
                'color' => $peepl_colors['taupe'],
            ),
            array(
                'name'  => esc_html__( 'Red', 'peepl' ),
                'slug'  => 'red',
                'color' => $peepl_colors['red'],
            ),
            array(
                'name'  => esc_html__( 'Orange', 'peepl' ),
                'slug'  => 'orange',
                'color' => $peepl_colors['orange'],
            ),
            array(
                'name'  => esc_html__( 'Yellow', 'peepl' ),
                'slug'  => 'yellow',
                'color' => $peepl_colors['yellow'],
            ),
            array(
                'name'  => esc_html__( 'Green', 'peepl' ),
                'slug'  => 'green',
                'color' => $peepl_colors['green'],
            ),
            array(
                'name'  => esc_html__( 'Teal', 'peepl' ),
                'slug'  => 'teal',
                'color' => $peepl_colors['teal'],
            ),
            array(
                'name'  => esc_html__( 'Blue', 'peepl' ),
                'slug'  => 'blue',
                'color' => $peepl_colors['blue'],
            ),
            array(
                'name'  => esc_html__( 'White', 'peepl' ),
                'slug'  => 'white',
                'color' => $peepl_colors['white'],
            ),
            array(
                'name'  => esc_html__( 'Pale grey', 'peepl' ),
                'slug'  => 'pale-grey',
                'color' => $peepl_colors['pale_grey'],
            ),
            array(
                'name'  => esc_html__( 'Cream', 'peepl' ),
                'slug'  => 'cream',
                'color' => $peepl_colors['cream'],
            ),
            array(
                'name'  => esc_html__( 'Pale red', 'peepl' ),
                'slug'  => 'pale-red',
                'color' => $peepl_colors['pale_red'],
            ),
            array(
                'name'  => esc_html__( 'Pale orange', 'peepl' ),
                'slug'  => 'pale-orange',
                'color' => $peepl_colors['pale_orange'],
            ),
            array(
                'name'  => esc_html__( 'Pale yellow', 'peepl' ),
                'slug'  => 'pale-yellow',
                'color' => $peepl_colors['pale_yellow'],
            ),
            array(
                'name'  => esc_html__( 'Pale green', 'peepl' ),
                'slug'  => 'pale-green',
                'color' => $peepl_colors['pale_green'],
            ),
            array(
                'name'  => esc_html__( 'Pale teal', 'peepl' ),
                'slug'  => 'pale-teal',
                'color' => $peepl_colors['pale_teal'],
            ),
            array(
                'name'  => esc_html__( 'Pale blue', 'peepl' ),
                'slug'  => 'pale-blue',
                'color' => $peepl_colors['pale_blue'],
            ),
        )
    );

    add_theme_support(
        'editor-gradient-presets',
        array(
            array(
                'name'     => esc_html__( 'Red to orange', 'twentytwentyone' ),
                'gradient' => 'linear-gradient(135deg, ' . $peepl_colors['red'] . ' 0%, ' . $peepl_colors['orange'] . ' 100%)',
                'slug'     => 'red-to-orange',
            ),
            array(
                'name'     => esc_html__( 'Orange to yellow', 'twentytwentyone' ),
                'gradient' => 'linear-gradient(135deg, ' . $peepl_colors['orange'] . ' 0%, ' . $peepl_colors['yellow'] . ' 100%)',
                'slug'     => 'orange-to-yellow',
            ),
            array(
                'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
                'gradient' => 'linear-gradient(135deg, ' . $peepl_colors['yellow'] . ' 0%, ' . $peepl_colors['green'] . ' 100%)',
                'slug'     => 'yellow-to-green',
            ),
            array(
                'name'     => esc_html__( 'Green to teal', 'twentytwentyone' ),
                'gradient' => 'linear-gradient(135deg, ' . $peepl_colors['green'] . ' 0%, ' . $peepl_colors['teal'] . ' 100%)',
                'slug'     => 'green-to-teal',
            ),
            array(
                'name'     => esc_html__( 'Teal to blue', 'twentytwentyone' ),
                'gradient' => 'linear-gradient(135deg, ' . $peepl_colors['teal'] . ' 0%, ' . $peepl_colors['blue'] . ' 100%)',
                'slug'     => 'teal-to-blue',
            ),
        )
    );
}

add_action( 'after_setup_theme', 'peepl_editor_color_palette_setup', 11 );
