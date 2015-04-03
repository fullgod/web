<?php 
/*-----------------------------------------------------------------------------------*/
/*	MASTERSLIDER FILTERS BELOW HERE
/*-----------------------------------------------------------------------------------*/
add_filter( 'masterslider_disable_auto_update', '__return_true' );

/**
 * Add Pivot Slider Skin
 */
if(!( function_exists('ebor_masterslider_skins') )){
	function ebor_masterslider_skins( $slider_skins ) {
	    $slider_skins[] = array( 'class' => 'pivot-main', 'label' => 'Pivot Main Skin' );
	    return $slider_skins;
	}
	add_filter( 'masterslider_skins', 'ebor_masterslider_skins' );
}

/**
 * Add masterslider styles
 */
if(!( function_exists('ebor_masterslider_enqueue_styles') )){
	function ebor_masterslider_enqueue_styles( $enqueue_styles ) {
	    $enqueue_styles[] = array(
	        'src'     => trailingslashit(get_template_directory_uri()) . 'style/css/masterslider-pivot-main.css' ,
	        'deps'    => array(),
	        'version' => '1.0'
	    );
	    return $enqueue_styles;
	}
	add_filter( 'masterslider_enqueue_styles', 'ebor_masterslider_enqueue_styles' );
}

/**
 * Add custom sections
 */
if(!( function_exists('ebor_custom_masterslider_starter_sections') )){
	function ebor_custom_masterslider_starter_sections( $sections ){
	    $sections[] = array(
	        'id'    => 'pivot-starters',
	        'title' => __( 'Pivot Example Sliders', 'pivot' ),
	        'desc'  => ''
	    );
	    return $sections;
	}
	add_filter( 'masterslider_starter_sections', 'ebor_custom_masterslider_starter_sections' );
}

/**
 * Add new starter slider
 */
if(!( function_exists('ebor_custom_masterslider_starter_fields') )){
	function ebor_custom_masterslider_starter_fields( $starters ){
	    $starters['pivot-starters'] = array(
	        array(
	            'label'     => __( 'Pivot Main Slider', 'pivot' ),
	            'id'        => 'pivot-main-slider',  // an unique id for starter slider
	            'slidertype'=> 'custom',
	            'importdata'=> 'eyJzbGlkZXJzX2RhdGEiOnsiNyI6eyJ0aXRsZSI6IkhvbWUgQ2xhc3NpYyIsInBhcmFtcyI6ImV5SnRaWFJoSWpwN0lsTmxkSFJwYm1keklXbGtjeUk2SWpFaUxDSlRaWFIwYVc1bmN5RnVaWGgwU1dRaU9qSXNJbE5zYVdSbElXbGtjeUk2SWpFc01pd3pJaXdpVTJ4cFpHVWhibVY0ZEVsa0lqbzBMQ0pEYjI1MGNtOXNJV2xrY3lJNklqRXNNaUlzSWtOdmJuUnliMndoYm1WNGRFbGtJam96TENKVGRIbHNaU0ZwWkhNaU9pSXhMRElzTXl3MUxEWWlMQ0pUZEhsc1pTRnVaWGgwU1dRaU9qY3NJa1ZtWm1WamRDRnBaSE1pT2lJeExESXNNeXcwTERVc05pdzVMREV3TERFeExERXlJaXdpUldabVpXTjBJVzVsZUhSSlpDSTZNVE1zSWt4aGVXVnlJV2xrY3lJNklqRXNNaXd6TERVc05pSXNJa3hoZVdWeUlXNWxlSFJKWkNJNk4zMHNJazFUVUdGdVpXd3VVMlYwZEdsdVozTWlPbnNpTVNJNkludGNJbWxrWENJNlhDSXhYQ0lzWENKemJtRndjR2x1WjF3aU9uUnlkV1VzWENKdVlXMWxYQ0k2WENKSWIyMWxJRU5zWVhOemFXTmNJaXhjSW5kcFpIUm9YQ0k2TVRJMk1DeGNJbWhsYVdkb2RGd2lPamcxTUN4Y0luZHlZWEJ3WlhKWGFXUjBhRlZ1YVhSY0lqcGNJbkI0WENJc1hDSmhkWFJ2UTNKdmNGd2lPbVpoYkhObExGd2lkSGx3WlZ3aU9sd2lZM1Z6ZEc5dFhDSXNYQ0p6Ykdsa1pYSkpaRndpT2x3aU4xd2lMRndpYkdGNWIzVjBYQ0k2WENKbWFXeHNkMmxrZEdoY0lpeGNJbUYxZEc5SVpXbG5hSFJjSWpwbVlXeHpaU3hjSW5SeVZtbGxkMXdpT2x3aVptRmtaVndpTEZ3aWMzQmxaV1JjSWpwY0lqSXdYQ0lzWENKemNHRmpaVndpT2x3aU1Gd2lMRndpYzNSaGNuUmNJanBjSWpGY0lpeGNJbWR5WVdKRGRYSnpiM0pjSWpwY0lqRmNJaXhjSW5OM2FYQmxYQ0k2WENJeFhDSXNYQ0p0YjNWelpWd2lPbHdpTVZ3aUxGd2lkMmhsWld4Y0lqcGNJbHdpTEZ3aVlYVjBiM0JzWVhsY0lqcGNJbHdpTEZ3aWJHOXZjRndpT2x3aVhDSXNYQ0p6YUhWbVpteGxYQ0k2WENKY0lpeGNJbkJ5Wld4dllXUmNJanBjSWkweFhDSXNYQ0p2ZG1WeVVHRjFjMlZjSWpwY0lqRmNJaXhjSW1WdVpGQmhkWE5sWENJNlhDSmNJaXhjSW1ocFpHVk1ZWGxsY25OY0lqcGNJbHdpTEZ3aVpHbHlYQ0k2WENKb1hDSXNYQ0p3WVhKaGJHeGhlRTF2WkdWY0lqcGNJbTF2ZFhObFhDSXNYQ0oxYzJWRVpXVndUR2x1YTF3aU9tWmhiSE5sTEZ3aVpHVmxjRXhwYm10Y0lqcGNJbTF6TFRkY0lpeGNJbVJsWlhCTWFXNXJWSGx3WlZ3aU9sd2ljR0YwYUZ3aUxGd2ljMk55YjJ4c1VHRnlZV3hzWVhoY0lqcDBjblZsTEZ3aWMyTnliMnhzVUdGeVlXeHNZWGhOYjNabFhDSTZNekFzWENKelkzSnZiR3hRWVhKaGJHeGhlRUpIVFc5MlpWd2lPalV3TEZ3aWMyTnliMnhzVUdGeVlXeHNZWGhHWVdSbFhDSTZkSEoxWlN4Y0ltTmxiblJsY2tOdmJuUnliMnh6WENJNlhDSXhYQ0lzWENKcGJuTjBZVzUwVTJodmQweGhlV1Z5YzF3aU9sd2lYQ0lzWENKamJHRnpjMDVoYldWY0lqcGNJbHdpTEZ3aWMydHBibHdpT2x3aWNHbDJiM1F0YldGcGJsd2lMRndpYlhOVVpXMXdiR0YwWlZ3aU9sd2lZM1Z6ZEc5dFhDSXNYQ0p0YzFSbGJYQnNZWFJsUTJ4aGMzTmNJanBjSWx3aUxGd2lkWE5sWkVadmJuUnpYQ0k2WENKY0luMGlmU3dpVFZOUVlXNWxiQzVUYkdsa1pTSTZleUl4SWpvaWUxd2lhV1JjSWpwY0lqRmNJaXhjSW5ScGJXVnNhVzVsWDJoY0lqb3lNREFzWENKaVoxUm9kVzFpWENJNlhDSXZNakF4TkM4d09TOW9aWEp2TVRVdE1UVXdlREUxTUM1cWNHZGNJaXhjSW05eVpHVnlYQ0k2TVN4Y0ltSm5YQ0k2WENJdk1qQXhOQzh3T1M5b1pYSnZNVFV1YW5CblhDSXNYQ0prZFhKaGRHbHZibHdpT2x3aU0xd2lMRndpWm1sc2JFMXZaR1ZjSWpwY0ltWnBiR3hjSWl4Y0ltTnZiRzl5VDNabGNteGhlVndpT2x3aWNtZGlZU2d3TENBd0xDQXdMQ0F3TGpJeUtWd2lMRndpWW1kMlgyWnBiR3h0YjJSbFhDSTZYQ0ptYVd4c1hDSXNYQ0ppWjNaZmJHOXZjRndpT2x3aU1Wd2lMRndpWW1kMlgyMTFkR1ZjSWpwY0lqRmNJaXhjSW1KbmRsOWhkWFJ2Y0dGMWMyVmNJanBjSWx3aUxGd2liR0Y1WlhKZmFXUnpYQ0k2V3pWZGZTSXNJaklpT2lKN1hDSnBaRndpT2pJc1hDSjBhVzFsYkdsdVpWOW9YQ0k2TWpBd0xGd2lZbWRVYUhWdFlsd2lPbHdpTHpJd01UUXZNRGt2YUdWeWJ6Y3hMVEUxTUhneE5UQXVhbkJuWENJc1hDSnZjbVJsY2x3aU9qSXNYQ0ppWjF3aU9sd2lMekl3TVRRdk1Ea3ZhR1Z5YnpjeExtcHdaMXdpTEZ3aVpIVnlZWFJwYjI1Y0lqcGNJak5jSWl4Y0ltWnBiR3hOYjJSbFhDSTZYQ0ptYVd4c1hDSXNYQ0pqYjJ4dmNrOTJaWEpzWVhsY0lqcGNJbkpuWW1Fb01Dd2dNQ3dnTUN3Z01DNHlNaWxjSWl4Y0ltSm5kbDltYVd4c2JXOWtaVndpT2x3aVptbHNiRndpTEZ3aVltZDJYMnh2YjNCY0lqcGNJakZjSWl4Y0ltSm5kbDl0ZFhSbFhDSTZYQ0l4WENJc1hDSmlaM1pmWVhWMGIzQmhkWE5sWENJNlhDSmNJaXhjSW14aGVXVnlYMmxrYzF3aU9sczJYWDBpTENJeklqb2llMXdpYVdSY0lqb3pMRndpZEdsdFpXeHBibVZmYUZ3aU9qSXdNQ3hjSW1KblZHaDFiV0pjSWpwY0lpOHlNREUwTHpFd0wyeGhlV1Z5TVMweE5UQjRNVFV3TG1wd1oxd2lMRndpYjNKa1pYSmNJam93TEZ3aVltZGNJanBjSWk4eU1ERTBMekV3TDJ4aGVXVnlNUzVxY0dkY0lpeGNJbVIxY21GMGFXOXVYQ0k2WENJelhDSXNYQ0ptYVd4c1RXOWtaVndpT2x3aVptbHNiRndpTEZ3aVkyOXNiM0pQZG1WeWJHRjVYQ0k2WENKeVoySmhLREFzSURBc0lEQXNJREF1TWpJcFhDSXNYQ0ppWjNaZlptbHNiRzF2WkdWY0lqcGNJbVpwYkd4Y0lpeGNJbUpuZGw5c2IyOXdYQ0k2WENJeFhDSXNYQ0ppWjNaZmJYVjBaVndpT2x3aU1Wd2lMRndpWW1kMlgyRjFkRzl3WVhWelpWd2lPbHdpWENJc1hDSmpjM05EYkdGemMxd2lPbHdpWldKdmNpMXdZWEpoYkd4aGVDMWlZV05yWjNKdmRXNWtYQ0lzWENKc1lYbGxjbDlwWkhOY0lqcGJYQ0l4WENJc01pd3pYWDBpZlN3aVRWTlFZVzVsYkM1RGIyNTBjbTlzSWpwN0lqRWlPaUo3WENKcFpGd2lPbHdpTVZ3aUxGd2liR0ZpWld4Y0lqcGNJa0Z5Y205M2Mxd2lMRndpYm1GdFpWd2lPbHdpWVhKeWIzZHpYQ0lzWENKaGRYUnZTR2xrWlZ3aU9tWmhiSE5sTEZ3aWIzWmxjbFpwWkdWdlhDSTZkSEoxWlN4Y0ltbHVjMlYwWENJNmRISjFaWDBpTENJeUlqb2llMXdpYVdSY0lqb3lMRndpYkdGaVpXeGNJanBjSWtKMWJHeGxkSE5jSWl4Y0ltNWhiV1ZjSWpwY0ltSjFiR3hsZEhOY0lpeGNJbUYxZEc5SWFXUmxYQ0k2Wm1Gc2MyVXNYQ0p2ZG1WeVZtbGtaVzljSWpwMGNuVmxMRndpYldGeVoybHVYQ0k2TVRBc1hDSmthWEpjSWpwY0ltaGNJaXhjSW5Od1lXTmxYQ0k2TVRJc1hDSmhiR2xuYmx3aU9sd2lZbTkwZEc5dFhDSXNYQ0pwYm5ObGRGd2lPblJ5ZFdWOUluMHNJazFUVUdGdVpXd3VVM1I1YkdVaU9uc2lNU0k2SW50Y0ltbGtYQ0k2WENJeFhDSXNYQ0ptYjI1MFYyVnBaMmgwWENJNlhDSnViM0p0WVd4Y0lpeGNJbXhwYm1WSVpXbG5hSFJjSWpwY0ltNXZjbTFoYkZ3aWZTSXNJaklpT2lKN1hDSnBaRndpT2pJc1hDSm1iMjUwVjJWcFoyaDBYQ0k2WENKdWIzSnRZV3hjSWl4Y0lteHBibVZJWldsbmFIUmNJanBjSW01dmNtMWhiRndpZlNJc0lqTWlPaUo3WENKcFpGd2lPak1zWENKMGVYQmxYQ0k2WENKamIzQjVYQ0lzWENKamJHRnpjMDVoYldWY0lqcGNJbTF6Y0Mxd2NtVnpaWFF0TTF3aUxGd2labTl1ZEZkbGFXZG9kRndpT2x3aWJtOXliV0ZzWENJc1hDSnNhVzVsU0dWcFoyaDBYQ0k2WENKdWIzSnRZV3hjSWl4Y0ltTjFjM1J2YlZ3aU9sd2lZMjlzYjNJNklDTm1abVptWm1ZN1hGeHVYRngwWkdsemNHeGhlVG9nWW14dlkyczdYRnh1WEZ4MFptOXVkQzFtWVcxcGJIazZJQ2RQY0dWdUlGTmhibk1uTENBblNHVnNkbVYwYVdOaElFNWxkV1VuTENCSVpXeDJaWFJwWTJFc0lFRnlhV0ZzTENCellXNXpMWE5sY21sbU8xeGNibHhjZEdadmJuUXRjMmw2WlRvZ016aHdlRHRjWEc1Y1hIUm1iMjUwTFhkbGFXZG9kRG9nTXpBd08xeGNibHhjZEd4cGJtVXRhR1ZwWjJoME9pQTFObkI0TzF4Y2JseGNkR0p2Y21SbGNpMTNhV1IwYURvZ01IQjRPMXhjYmx4Y2RHSnZjbVJsY2kxamIyeHZjam9nSTJabVptWm1aanRjWEc1Y1hIUmliM0prWlhJdGMzUjViR1U2SUc1dmJtVTdYRnh1WEZ4MFltRmphMmR5YjNWdVpDMWpiMnh2Y2pvZ2RISmhibk53WVhKbGJuUTdYRnh1WEZ4MGRHVjRkQzFrWldOdmNtRjBhVzl1T2lCdWIyNWxPMXdpZlNJc0lqVWlPaUo3WENKcFpGd2lPalVzWENKMGVYQmxYQ0k2WENKamIzQjVYQ0lzWENKamJHRnpjMDVoYldWY0lqcGNJbTF6Y0Mxd2NtVnpaWFF0TTF3aUxGd2labTl1ZEZkbGFXZG9kRndpT2x3aWJtOXliV0ZzWENJc1hDSnNhVzVsU0dWcFoyaDBYQ0k2WENKdWIzSnRZV3hjSWl4Y0ltTjFjM1J2YlZ3aU9sd2lZMjlzYjNJNklDTm1abVptWm1ZN1hGeHVYRngwWkdsemNHeGhlVG9nWW14dlkyczdYRnh1WEZ4MFptOXVkQzFtWVcxcGJIazZJQ2RQY0dWdUlGTmhibk1uTENBblNHVnNkbVYwYVdOaElFNWxkV1VuTENCSVpXeDJaWFJwWTJFc0lFRnlhV0ZzTENCellXNXpMWE5sY21sbU8xeGNibHhjZEdadmJuUXRjMmw2WlRvZ016aHdlRHRjWEc1Y1hIUm1iMjUwTFhkbGFXZG9kRG9nTXpBd08xeGNibHhjZEd4cGJtVXRhR1ZwWjJoME9pQTFObkI0TzF4Y2JseGNkR0p2Y21SbGNpMTNhV1IwYURvZ01IQjRPMXhjYmx4Y2RHSnZjbVJsY2kxamIyeHZjam9nSTJabVptWm1aanRjWEc1Y1hIUmliM0prWlhJdGMzUjViR1U2SUc1dmJtVTdYRnh1WEZ4MFltRmphMmR5YjNWdVpDMWpiMnh2Y2pvZ2RISmhibk53WVhKbGJuUTdYRnh1WEZ4MGRHVjRkQzFrWldOdmNtRjBhVzl1T2lCdWIyNWxPMXdpZlNJc0lqWWlPaUo3WENKcFpGd2lPallzWENKMGVYQmxYQ0k2WENKamIzQjVYQ0lzWENKamJHRnpjMDVoYldWY0lqcGNJbTF6Y0Mxd2NtVnpaWFF0TTF3aUxGd2labTl1ZEZkbGFXZG9kRndpT2x3aWJtOXliV0ZzWENJc1hDSnNhVzVsU0dWcFoyaDBYQ0k2WENKdWIzSnRZV3hjSWl4Y0ltTjFjM1J2YlZ3aU9sd2lZMjlzYjNJNklDTm1abVptWm1ZN1hGeHVYRngwWkdsemNHeGhlVG9nWW14dlkyczdYRnh1WEZ4MFptOXVkQzFtWVcxcGJIazZJQ2RQY0dWdUlGTmhibk1uTENBblNHVnNkbVYwYVdOaElFNWxkV1VuTENCSVpXeDJaWFJwWTJFc0lFRnlhV0ZzTENCellXNXpMWE5sY21sbU8xeGNibHhjZEdadmJuUXRjMmw2WlRvZ016aHdlRHRjWEc1Y1hIUm1iMjUwTFhkbGFXZG9kRG9nTXpBd08xeGNibHhjZEd4cGJtVXRhR1ZwWjJoME9pQTFObkI0TzF4Y2JseGNkR0p2Y21SbGNpMTNhV1IwYURvZ01IQjRPMXhjYmx4Y2RHSnZjbVJsY2kxamIyeHZjam9nSTJabVptWm1aanRjWEc1Y1hIUmliM0prWlhJdGMzUjViR1U2SUc1dmJtVTdYRnh1WEZ4MFltRmphMmR5YjNWdVpDMWpiMnh2Y2pvZ2RISmhibk53WVhKbGJuUTdYRnh1WEZ4MGRHVjRkQzFrWldOdmNtRjBhVzl1T2lCdWIyNWxPMXdpZlNKOUxDSk5VMUJoYm1Wc0xrVm1abVZqZENJNmV5SXhJam9pZTF3aWFXUmNJanBjSWpGY0lpeGNJbVpoWkdWY0lqcDBjblZsZlNJc0lqSWlPaUo3WENKcFpGd2lPaklzWENKbVlXUmxYQ0k2ZEhKMVpYMGlMQ0l6SWpvaWUxd2lhV1JjSWpvekxGd2labUZrWlZ3aU9uUnlkV1Y5SWl3aU5DSTZJbnRjSW1sa1hDSTZOQ3hjSW1aaFpHVmNJanAwY25WbGZTSXNJalVpT2lKN1hDSnBaRndpT2pVc1hDSm1ZV1JsWENJNmRISjFaWDBpTENJMklqb2llMXdpYVdSY0lqbzJMRndpWm1Ga1pWd2lPblJ5ZFdWOUlpd2lPU0k2SW50Y0ltbGtYQ0k2T1N4Y0ltWmhaR1ZjSWpwMGNuVmxmU0lzSWpFd0lqb2llMXdpYVdSY0lqb3hNQ3hjSW1aaFpHVmNJanAwY25WbGZTSXNJakV4SWpvaWUxd2lhV1JjSWpveE1TeGNJbVpoWkdWY0lqcDBjblZsZlNJc0lqRXlJam9pZTF3aWFXUmNJam94TWl4Y0ltWmhaR1ZjSWpwMGNuVmxmU0o5TENKTlUxQmhibVZzTGt4aGVXVnlJanA3SWpFaU9pSjdYQ0pwWkZ3aU9sd2lNVndpTEZ3aWJtRnRaVndpT2x3aWJHRjVaWEpjSWl4Y0ltbHpURzlqYTJWa1hDSTZabUZzYzJVc1hDSnBjMGhwWkdWa1hDSTZabUZzYzJVc1hDSnBjMU52Ykc5bFpGd2lPbVpoYkhObExGd2ljMmh2ZDFSeVlXNXpabTl5YlZ3aU9sd2lYQ0lzWENKemFHOTNUM0pwWjJsdVhDSTZYQ0pjSWl4Y0luTm9iM2RHWVdSbFhDSTZkSEoxWlN4Y0ltaHBaR1ZVY21GdWMyWnZjbTFjSWpwY0lsd2lMRndpYUdsa1pVOXlhV2RwYmx3aU9sd2lYQ0lzWENKb2FXUmxSbUZrWlZ3aU9uUnlkV1VzWENKcGJXZFVhSFZ0WWx3aU9sd2lMekl3TVRRdk1UQXZiR0Y1WlhJekxURTFNSGd4TlRBdWNHNW5YQ0lzWENKemRHRm5aVTltWm5ObGRGaGNJam93TEZ3aWMzUmhaMlZQWm1aelpYUlpYQ0k2TUN4Y0ltOXlaR1Z5WENJNk1TeGNJblI1Y0dWY0lqcGNJbWx0WVdkbFhDSXNYQ0p1YjFOM2FYQmxYQ0k2Wm1Gc2MyVXNYQ0pqYjI1MFpXNTBYQ0k2WENKTWIzSmxiU0JKY0hOMWJWd2lMRndpYVcxblhDSTZYQ0l2TWpBeE5DOHhNQzlzWVhsbGNqTXVjRzVuWENJc1hDSjJhV1JsYjF3aU9sd2lhSFIwY0RvdkwzQnNZWGxsY2k1MmFXMWxieTVqYjIwdmRtbGtaVzh2TVRFM01qRXlOREpjSWl4Y0ltRnNhV2R1WENJNlhDSjBiM0JjSWl4Y0luVnpaVUZqZEdsdmJsd2lPbVpoYkhObExGd2ljMk55YjJ4c1JIVnlZWFJwYjI1Y0lqb3lMRndpYjJabWMyVjBXRndpT2kweU16VXNYQ0p2Wm1aelpYUlpYQ0k2TFRrekxGd2ljbVZ6YVhwbFhDSTZkSEoxWlN4Y0ltWnBlR1ZrWENJNlptRnNjMlVzWENKM2FXUjBhR3hwYldsMFhDSTZYQ0l3WENJc1hDSnZjbWxuYVc1Y0lqcGNJblJzWENJc1hDSnpkR0Y1U0c5MlpYSmNJanAwY25WbExGd2ljR0Z5WVd4c1lYaGNJam8wTUN4Y0luTm9iM2RFZFhKaGRHbHZibHdpT2pNdU1UWXlOU3hjSW5Ob2IzZEVaV3hoZVZ3aU9qQXNYQ0p6YUc5M1JXRnpaVndpT2x3aVpXRnpaVTkxZEZGMWFXNTBYQ0lzWENKMWMyVklhV1JsWENJNlptRnNjMlVzWENKb2FXUmxSSFZ5WVhScGIyNWNJam94TEZ3aWFHbGtaVVJsYkdGNVhDSTZNU3hjSW1ocFpHVkZZWE5sWENJNlhDSmxZWE5sVDNWMFVYVnBiblJjSWl4Y0ltSjBia05zWVhOelhDSTZYQ0p0Y3kxaWRHNGdiWE10WkdWbVlYVnNkQzFpZEc1Y0lpeGNJbk5zYVdSbFhDSTZNeXhjSW5OMGVXeGxUVzlrWld4Y0lqcGNJakZjSWl4Y0luTm9iM2RGWm1abFkzUmNJanBjSWpGY0lpeGNJbWhwWkdWRlptWmxZM1JjSWpveWZTSXNJaklpT2lKN1hDSnBaRndpT2pJc1hDSnVZVzFsWENJNlhDSnNZWGxsY2x3aUxGd2lhWE5NYjJOclpXUmNJanBtWVd4elpTeGNJbWx6U0dsa1pXUmNJanBtWVd4elpTeGNJbWx6VTI5c2IyVmtYQ0k2Wm1Gc2MyVXNYQ0p6YUc5M1ZISmhibk5tYjNKdFhDSTZYQ0pjSWl4Y0luTm9iM2RQY21sbmFXNWNJanBjSWx3aUxGd2ljMmh2ZDBaaFpHVmNJanAwY25WbExGd2lhR2xrWlZSeVlXNXpabTl5YlZ3aU9sd2lYQ0lzWENKb2FXUmxUM0pwWjJsdVhDSTZYQ0pjSWl4Y0ltaHBaR1ZHWVdSbFhDSTZkSEoxWlN4Y0ltbHRaMVJvZFcxaVhDSTZYQ0l2TWpBeE5DOHhNQzlzWVhsbGNqSXRNVFV3ZURFMU1DNXdibWRjSWl4Y0luTjBZV2RsVDJabWMyVjBXRndpT2pBc1hDSnpkR0ZuWlU5bVpuTmxkRmxjSWpvd0xGd2liM0prWlhKY0lqb3dMRndpZEhsd1pWd2lPbHdpYVcxaFoyVmNJaXhjSW01dlUzZHBjR1ZjSWpwbVlXeHpaU3hjSW1OdmJuUmxiblJjSWpwY0lreHZjbVZ0SUVsd2MzVnRYQ0lzWENKcGJXZGNJanBjSWk4eU1ERTBMekV3TDJ4aGVXVnlNaTV3Ym1kY0lpeGNJblpwWkdWdlhDSTZYQ0pvZEhSd09pOHZjR3hoZVdWeUxuWnBiV1Z2TG1OdmJTOTJhV1JsYnk4eE1UY3lNVEkwTWx3aUxGd2lZV3hwWjI1Y0lqcGNJblJ2Y0Z3aUxGd2lkWE5sUVdOMGFXOXVYQ0k2Wm1Gc2MyVXNYQ0p6WTNKdmJHeEVkWEpoZEdsdmJsd2lPaklzWENKdlptWnpaWFJZWENJNkxURTVNaXhjSW05bVpuTmxkRmxjSWpvdE1UZzBMRndpY21WemFYcGxYQ0k2ZEhKMVpTeGNJbVpwZUdWa1hDSTZabUZzYzJVc1hDSjNhV1IwYUd4cGJXbDBYQ0k2WENJd1hDSXNYQ0p2Y21sbmFXNWNJanBjSW5Sc1hDSXNYQ0p6ZEdGNVNHOTJaWEpjSWpwMGNuVmxMRndpY0dGeVlXeHNZWGhjSWpveE5TeGNJbk5vYjNkRWRYSmhkR2x2Ymx3aU9qTXVOVFl5TlN4Y0luTm9iM2RFWld4aGVWd2lPakFzWENKemFHOTNSV0Z6WlZ3aU9sd2laV0Z6WlU5MWRGRjFhVzUwWENJc1hDSjFjMlZJYVdSbFhDSTZabUZzYzJVc1hDSm9hV1JsUkhWeVlYUnBiMjVjSWpveExGd2lhR2xrWlVSbGJHRjVYQ0k2TVN4Y0ltaHBaR1ZGWVhObFhDSTZYQ0psWVhObFQzVjBVWFZwYm5SY0lpeGNJbUowYmtOc1lYTnpYQ0k2WENKdGN5MWlkRzRnYlhNdFpHVm1ZWFZzZEMxaWRHNWNJaXhjSW5Oc2FXUmxYQ0k2TXl4Y0luTjBlV3hsVFc5a1pXeGNJam95TEZ3aWMyaHZkMFZtWm1WamRGd2lPak1zWENKb2FXUmxSV1ptWldOMFhDSTZOSDBpTENJeklqb2llMXdpYVdSY0lqb3pMRndpYm1GdFpWd2lPbHdpYkdGNVpYSmNJaXhjSW1selRHOWphMlZrWENJNlptRnNjMlVzWENKcGMwaHBaR1ZrWENJNlptRnNjMlVzWENKcGMxTnZiRzlsWkZ3aU9tWmhiSE5sTEZ3aWMyaHZkMVJ5WVc1elptOXliVndpT2x3aVhDSXNYQ0p6YUc5M1QzSnBaMmx1WENJNlhDSmNJaXhjSW5Ob2IzZEdZV1JsWENJNmRISjFaU3hjSW1ocFpHVlVjbUZ1YzJadmNtMWNJanBjSWx3aUxGd2lhR2xrWlU5eWFXZHBibHdpT2x3aVhDSXNYQ0pvYVdSbFJtRmtaVndpT25SeWRXVXNYQ0p6ZEdGblpVOW1abk5sZEZoY0lqb3dMRndpYzNSaFoyVlBabVp6WlhSWlhDSTZNQ3hjSW05eVpHVnlYQ0k2TWl4Y0luUjVjR1ZjSWpwY0luUmxlSFJjSWl4Y0ltNXZVM2RwY0dWY0lqcDBjblZsTEZ3aVkyOXVkR1Z1ZEZ3aU9sd2lSMlYwSUhKbFlXUjVJR1p2Y2lCMGFHVWdiR0YxYm1Ob0lHOW1JRzkxY2lBOFluSWdMejVoYldGNmFXNW5JRzVsZHlCMFpXMXdiR0YwWlNCUWFYWnZkQ3dnUEdKeUlDOCtXVzkxSUhkcGJHd2dZbVVnWVhkbFpDNGdQR0p5SUM4K1BHSnlJQzgrVzNCcGRtOTBYMkoxZEhSdmJpQjFjbXc5WEZ4Y0lpTmNYRndpSUdGd2NHVmhjbUZ1WTJVOVhGeGNJbUowYmkxd2NtbHRZWEo1SUdKMGJpMTNhR2wwWlZ4Y1hDSWdkR0Z5WjJWMFBWeGNYQ0prWldaaGRXeDBYRnhjSWlCMFpYaDBQVnhjWENKRGRYTjBiMjFwZW1VZ1VHbDJiM1JjWEZ3aVhWdHdhWFp2ZEY5aWRYUjBiMjRnZFhKc1BWeGNYQ0lqWEZ4Y0lpQmhjSEJsWVhKaGJtTmxQVnhjWENKaWRHNHRjSEpwYldGeWVTQmlkRzR0Wm1sc2JHVmtYRnhjSWlCMFlYSm5aWFE5WEZ4Y0ltUmxabUYxYkhSY1hGd2lJSFJsZUhROVhGeGNJbEIxY21Ob1lYTmxJRkJwZG05MFhGeGNJbDFjSWl4Y0luWnBaR1Z2WENJNlhDSm9kSFJ3T2k4dmNHeGhlV1Z5TG5acGJXVnZMbU52YlM5MmFXUmxieTh4TVRjeU1USTBNbHdpTEZ3aVlXeHBaMjVjSWpwY0luUnZjRndpTEZ3aWRYTmxRV04wYVc5dVhDSTZabUZzYzJVc1hDSnpZM0p2Ykd4RWRYSmhkR2x2Ymx3aU9qSXNYQ0p2Wm1aelpYUllYQ0k2TkRBc1hDSnZabVp6WlhSWlhDSTZNQ3hjSW5KbGMybDZaVndpT25SeWRXVXNYQ0ptYVhobFpGd2lPbVpoYkhObExGd2lkMmxrZEdoc2FXMXBkRndpT2x3aU1Gd2lMRndpYjNKcFoybHVYQ0k2WENKdGJGd2lMRndpYzNSaGVVaHZkbVZ5WENJNmRISjFaU3hjSW1Oc1lYTnpUbUZ0WlZ3aU9sd2liWE53TFhCeVpYTmxkQzB6WENJc1hDSnphRzkzUkhWeVlYUnBiMjVjSWpvekxqTXpOelVzWENKemFHOTNSR1ZzWVhsY0lqb3dMRndpYzJodmQwVmhjMlZjSWpwY0ltVmhjMlZQZFhSUmRXbHVkRndpTEZ3aWRYTmxTR2xrWlZ3aU9tWmhiSE5sTEZ3aWFHbGtaVVIxY21GMGFXOXVYQ0k2TVN4Y0ltaHBaR1ZFWld4aGVWd2lPakVzWENKb2FXUmxSV0Z6WlZ3aU9sd2laV0Z6WlU5MWRGRjFhVzUwWENJc1hDSmlkRzVEYkdGemMxd2lPbHdpYlhNdFluUnVJRzF6TFdSbFptRjFiSFF0WW5SdVhDSXNYQ0p6Ykdsa1pWd2lPak1zWENKemRIbHNaVTF2WkdWc1hDSTZNeXhjSW5Ob2IzZEZabVpsWTNSY0lqbzFMRndpYUdsa1pVVm1abVZqZEZ3aU9qWjlJaXdpTlNJNkludGNJbWxrWENJNk5TeGNJbTVoYldWY0lqcGNJbXhoZVdWeVhDSXNYQ0pwYzB4dlkydGxaRndpT21aaGJITmxMRndpYVhOSWFXUmxaRndpT21aaGJITmxMRndpYVhOVGIyeHZaV1JjSWpwbVlXeHpaU3hjSW5Ob2IzZFVjbUZ1YzJadmNtMWNJanBjSWx3aUxGd2ljMmh2ZDA5eWFXZHBibHdpT2x3aVhDSXNYQ0p6YUc5M1JtRmtaVndpT25SeWRXVXNYQ0pvYVdSbFZISmhibk5tYjNKdFhDSTZYQ0pjSWl4Y0ltaHBaR1ZQY21sbmFXNWNJanBjSWx3aUxGd2lhR2xrWlVaaFpHVmNJanAwY25WbExGd2ljM1JoWjJWUFptWnpaWFJZWENJNk1DeGNJbk4wWVdkbFQyWm1jMlYwV1Z3aU9qQXNYQ0p2Y21SbGNsd2lPakFzWENKMGVYQmxYQ0k2WENKMFpYaDBYQ0lzWENKdWIxTjNhWEJsWENJNlptRnNjMlVzWENKamIyNTBaVzUwWENJNlhDSlZjMlVnVFdGemRHVnlJRk5zYVdSbGNpd2dVbVYyYjJ4MWRHbHZiaUJUYkdsa1pYSWdiM0lnYjNWeUlHOTNianhpY2lBdlBraGxZV1JsY2lCSFpXNWxjbUYwYjNJZ2QybDBhQ0I1YjNWeUlIQmhaMlZ6TGp4aWNpQXZQa2wwSjNNZ1lXeHNJR2x1WTJ4MVpHVmtJVndpTEZ3aWRtbGtaVzljSWpwY0ltaDBkSEE2THk5d2JHRjVaWEl1ZG1sdFpXOHVZMjl0TDNacFpHVnZMekV4TnpJeE1qUXlYQ0lzWENKaGJHbG5ibHdpT2x3aWRHOXdYQ0lzWENKMWMyVkJZM1JwYjI1Y0lqcG1ZV3h6WlN4Y0luTmpjbTlzYkVSMWNtRjBhVzl1WENJNk1peGNJbTltWm5ObGRGaGNJam8wTUN4Y0ltOW1abk5sZEZsY0lqb3dMRndpY21WemFYcGxYQ0k2ZEhKMVpTeGNJbVpwZUdWa1hDSTZabUZzYzJVc1hDSjNhV1IwYUd4cGJXbDBYQ0k2WENJd1hDSXNYQ0p2Y21sbmFXNWNJanBjSW0xc1hDSXNYQ0p6ZEdGNVNHOTJaWEpjSWpwMGNuVmxMRndpWTJ4aGMzTk9ZVzFsWENJNlhDSnRjM0F0Y0hKbGMyVjBMVE5jSWl4Y0luTm9iM2RFZFhKaGRHbHZibHdpT2pFc1hDSnphRzkzUkdWc1lYbGNJam93TEZ3aWMyaHZkMFZoYzJWY0lqcGNJbVZoYzJWUGRYUlJkV2x1ZEZ3aUxGd2lkWE5sU0dsa1pWd2lPbVpoYkhObExGd2lhR2xrWlVSMWNtRjBhVzl1WENJNk1TeGNJbWhwWkdWRVpXeGhlVndpT2pFc1hDSm9hV1JsUldGelpWd2lPbHdpWldGelpVOTFkRkYxYVc1MFhDSXNYQ0ppZEc1RGJHRnpjMXdpT2x3aWJYTXRZblJ1SUcxekxXUmxabUYxYkhRdFluUnVYQ0lzWENKemJHbGtaVndpT2x3aU1Wd2lMRndpYzNSNWJHVk5iMlJsYkZ3aU9qVXNYQ0p6YUc5M1JXWm1aV04wWENJNk9TeGNJbWhwWkdWRlptWmxZM1JjSWpveE1IMGlMQ0kySWpvaWUxd2lhV1JjSWpvMkxGd2libUZ0WlZ3aU9sd2liR0Y1WlhKY0lpeGNJbWx6VEc5amEyVmtYQ0k2Wm1Gc2MyVXNYQ0pwYzBocFpHVmtYQ0k2Wm1Gc2MyVXNYQ0pwYzFOdmJHOWxaRndpT21aaGJITmxMRndpYzJodmQxUnlZVzV6Wm05eWJWd2lPbHdpWENJc1hDSnphRzkzVDNKcFoybHVYQ0k2WENKY0lpeGNJbk5vYjNkR1lXUmxYQ0k2ZEhKMVpTeGNJbWhwWkdWVWNtRnVjMlp2Y20xY0lqcGNJbHdpTEZ3aWFHbGtaVTl5YVdkcGJsd2lPbHdpWENJc1hDSm9hV1JsUm1Ga1pWd2lPblJ5ZFdVc1hDSnpkR0ZuWlU5bVpuTmxkRmhjSWpvd0xGd2ljM1JoWjJWUFptWnpaWFJaWENJNk1DeGNJbTl5WkdWeVhDSTZNQ3hjSW5SNWNHVmNJanBjSW5SbGVIUmNJaXhjSW01dlUzZHBjR1ZjSWpwbVlXeHpaU3hjSW1OdmJuUmxiblJjSWpwY0lsTnBiWEJzWlNCMGJ5QjFjMlVzSUdaMWJHeDVJR1J2WTNWdFpXNTBaV1FzUEdKeUlDOCtiWFZzZEdsc2FXNW5kV0ZzTENCbWIzSjFiWE1zSUhOb2IzQXVMaTQ4WW5JZ0x6NVFhWFp2ZENCcGN5QmxkbVZ5ZVhSb2FXNW5JSGx2ZFNkMlpTQmlaV1Z1SUd4dmIydHBibWNnWm05eUlWd2lMRndpZG1sa1pXOWNJanBjSW1oMGRIQTZMeTl3YkdGNVpYSXVkbWx0Wlc4dVkyOXRMM1pwWkdWdkx6RXhOekl4TWpReVhDSXNYQ0poYkdsbmJsd2lPbHdpZEc5d1hDSXNYQ0oxYzJWQlkzUnBiMjVjSWpwbVlXeHpaU3hjSW5OamNtOXNiRVIxY21GMGFXOXVYQ0k2TWl4Y0ltOW1abk5sZEZoY0lqbzBNQ3hjSW05bVpuTmxkRmxjSWpvd0xGd2ljbVZ6YVhwbFhDSTZkSEoxWlN4Y0ltWnBlR1ZrWENJNlptRnNjMlVzWENKM2FXUjBhR3hwYldsMFhDSTZYQ0l3WENJc1hDSnZjbWxuYVc1Y0lqcGNJbTFzWENJc1hDSnpkR0Y1U0c5MlpYSmNJanAwY25WbExGd2lZMnhoYzNOT1lXMWxYQ0k2WENKdGMzQXRjSEpsYzJWMExUTmNJaXhjSW5Ob2IzZEVkWEpoZEdsdmJsd2lPakVzWENKemFHOTNSR1ZzWVhsY0lqb3dMRndpYzJodmQwVmhjMlZjSWpwY0ltVmhjMlZQZFhSUmRXbHVkRndpTEZ3aWRYTmxTR2xrWlZ3aU9tWmhiSE5sTEZ3aWFHbGtaVVIxY21GMGFXOXVYQ0k2TVN4Y0ltaHBaR1ZFWld4aGVWd2lPakVzWENKb2FXUmxSV0Z6WlZ3aU9sd2laV0Z6WlU5MWRGRjFhVzUwWENJc1hDSmlkRzVEYkdGemMxd2lPbHdpYlhNdFluUnVJRzF6TFdSbFptRjFiSFF0WW5SdVhDSXNYQ0p6Ykdsa1pWd2lPaklzWENKemRIbHNaVTF2WkdWc1hDSTZOaXhjSW5Ob2IzZEZabVpsWTNSY0lqb3hNU3hjSW1ocFpHVkZabVpsWTNSY0lqb3hNbjBpZlgwPSIsInR5cGUiOiJjdXN0b20iLCJzbGlkZXNfbnVtIjoiMyJ9fSwib3JpZ2luX3VwbG9hZHNfdXJsIjoiaHR0cDpcL1wvcGl2b3Q6ODg4OFwvd3AtY29udGVudFwvdXBsb2FkcyIsInByZXNldF9zdHlsZXMiOiJleUp0WlhSaElqcDdJbEJ5WlhObGRGTjBlV3hsSVdsa2N5STZJak1pTENKUWNtVnpaWFJUZEhsc1pTRnVaWGgwU1dRaU9qUjlMQ0pOVTFCaGJtVnNMbEJ5WlhObGRGTjBlV3hsSWpwN0lqTWlPaUo3WENKcFpGd2lPak1zWENKdVlXMWxYQ0k2WENKUWFYWnZkQ0JOWVdsdUlGUnBkR3hsWENJc1hDSjBlWEJsWENJNlhDSndjbVZ6WlhSY0lpeGNJbU5zWVhOelRtRnRaVndpT2x3aWJYTndMWEJ5WlhObGRDMHpYQ0lzWENKbWIyNTBWMlZwWjJoMFhDSTZYQ0p1YjNKdFlXeGNJaXhjSW14cGJtVklaV2xuYUhSY0lqcGNJbTV2Y20xaGJGd2lMRndpWTNWemRHOXRYQ0k2WENKamIyeHZjam9nSTJabVptWm1aanRjWEc1Y1hIUmthWE53YkdGNU9pQmliRzlqYXp0Y1hHNWNYSFJtYjI1MExXWmhiV2xzZVRvZ0owOXdaVzRnVTJGdWN5Y3NJQ2RJWld4MlpYUnBZMkVnVG1WMVpTY3NJRWhsYkhabGRHbGpZU3dnUVhKcFlXd3NJSE5oYm5NdGMyVnlhV1k3WEZ4dVhGeDBabTl1ZEMxemFYcGxPaUF6T0hCNE8xeGNibHhjZEdadmJuUXRkMlZwWjJoME9pQXpNREE3WEZ4dVhGeDBiR2x1WlMxb1pXbG5hSFE2SURVMmNIZzdYRnh1WEZ4MFltOXlaR1Z5TFhkcFpIUm9PaUF3Y0hnN1hGeHVYRngwWW05eVpHVnlMV052Ykc5eU9pQWpabVptWm1abU8xeGNibHhjZEdKdmNtUmxjaTF6ZEhsc1pUb2dibTl1WlR0Y1hHNWNYSFJpWVdOclozSnZkVzVrTFdOdmJHOXlPaUIwY21GdWMzQmhjbVZ1ZER0Y1hHNWNYSFIwWlhoMExXUmxZMjl5WVhScGIyNDZJRzV2Ym1VN1hDSjlJbjE5IiwicHJlc2V0X2VmZmVjdHMiOiJleUp0WlhSaElqcDdJbEJ5WlhObGRFVm1abVZqZENGcFpITWlPaUkyTERjc09DdzVMREV3TERFeExERXlMREV6TERFMExERTFMREUyTERFM0xERTRMREU1TERJd0xESXhMREl5TERJekxESTBMREkxTERJMkxESTNMREk0TERJNUxETXdMRE14SWl3aVVISmxjMlYwUldabVpXTjBJVzVsZUhSSlpDSTZNeko5TENKTlUxQmhibVZzTGxCeVpYTmxkRVZtWm1WamRDSTZleUkySWpvaWUxd2lhV1JjSWpvMkxGd2libUZ0WlZ3aU9sd2lVbWxuYUhRZ2MyaHZjblJjSWl4Y0luUjVjR1ZjSWpwY0luQnlaWE5sZEZ3aUxGd2labUZrWlZ3aU9uUnlkV1VzWENKMGNtRnVjMnhoZEdWWVhDSTZNVFV3ZlNJc0lqY2lPaUo3WENKcFpGd2lPamNzWENKdVlXMWxYQ0k2WENKTVpXWjBJSE5vYjNKMFhDSXNYQ0owZVhCbFhDSTZYQ0p3Y21WelpYUmNJaXhjSW1aaFpHVmNJanAwY25WbExGd2lkSEpoYm5Oc1lYUmxXRndpT2kweE5UQjlJaXdpT0NJNkludGNJbWxrWENJNk9DeGNJbTVoYldWY0lqcGNJbFJ2Y0NCemFHOXlkRndpTEZ3aWRIbHdaVndpT2x3aWNISmxjMlYwWENJc1hDSm1ZV1JsWENJNmRISjFaU3hjSW5SeVlXNXpiR0YwWlZsY0lqb3RNVFV3ZlNJc0lqa2lPaUo3WENKcFpGd2lPamtzWENKdVlXMWxYQ0k2WENKQ2IzUjBiMjBnYzJodmNuUmNJaXhjSW5SNWNHVmNJanBjSW5CeVpYTmxkRndpTEZ3aVptRmtaVndpT25SeWRXVXNYQ0owY21GdWMyeGhkR1ZaWENJNk1UVXdmU0lzSWpFd0lqb2llMXdpYVdSY0lqb3hNQ3hjSW01aGJXVmNJanBjSWxKcFoyaDBJR3h2Ym1kY0lpeGNJblI1Y0dWY0lqcGNJbkJ5WlhObGRGd2lMRndpWm1Ga1pWd2lPblJ5ZFdVc1hDSjBjbUZ1YzJ4aGRHVllYQ0k2TlRBd2ZTSXNJakV4SWpvaWUxd2lhV1JjSWpveE1TeGNJbTVoYldWY0lqcGNJa3hsWm5RZ2JHOXVaMXdpTEZ3aWRIbHdaVndpT2x3aWNISmxjMlYwWENJc1hDSm1ZV1JsWENJNmRISjFaU3hjSW5SeVlXNXpiR0YwWlZoY0lqb3ROVEF3ZlNJc0lqRXlJam9pZTF3aWFXUmNJam94TWl4Y0ltNWhiV1ZjSWpwY0lsUnZjQ0JzYjI1blhDSXNYQ0owZVhCbFhDSTZYQ0p3Y21WelpYUmNJaXhjSW1aaFpHVmNJanAwY25WbExGd2lkSEpoYm5Oc1lYUmxXVndpT2kwMU1EQjlJaXdpTVRNaU9pSjdYQ0pwWkZ3aU9qRXpMRndpYm1GdFpWd2lPbHdpUW05MGRHOXRJR3h2Ym1kY0lpeGNJblI1Y0dWY0lqcGNJbkJ5WlhObGRGd2lMRndpWm1Ga1pWd2lPblJ5ZFdVc1hDSjBjbUZ1YzJ4aGRHVlpYQ0k2TlRBd2ZTSXNJakUwSWpvaWUxd2lhV1JjSWpveE5DeGNJbTVoYldWY0lqcGNJak5FSUVaeWIyNTBJSE5vYjNKMFhDSXNYQ0owZVhCbFhDSTZYQ0p3Y21WelpYUmNJaXhjSW1aaFpHVmNJanAwY25WbExGd2lkSEpoYm5Oc1lYUmxXbHdpT2pVd01IMGlMQ0l4TlNJNkludGNJbWxrWENJNk1UVXNYQ0p1WVcxbFhDSTZYQ0l6UkNCQ1lXTnJJSE5vYjNKMFhDSXNYQ0owZVhCbFhDSTZYQ0p3Y21WelpYUmNJaXhjSW1aaFpHVmNJanAwY25WbExGd2lkSEpoYm5Oc1lYUmxXbHdpT2kwMU1EQjlJaXdpTVRZaU9pSjdYQ0pwWkZ3aU9qRTJMRndpYm1GdFpWd2lPbHdpTTBRZ1JuSnZiblFnYkc5dVoxd2lMRndpZEhsd1pWd2lPbHdpY0hKbGMyVjBYQ0lzWENKbVlXUmxYQ0k2ZEhKMVpTeGNJblJ5WVc1emJHRjBaVnBjSWpveE5UQXdmU0lzSWpFM0lqb2llMXdpYVdSY0lqb3hOeXhjSW01aGJXVmNJanBjSWpORUlFSmhZMnNnYkc5dVoxd2lMRndpZEhsd1pWd2lPbHdpY0hKbGMyVjBYQ0lzWENKbVlXUmxYQ0k2ZEhKMVpTeGNJblJ5WVc1emJHRjBaVnBjSWpvdE1UVXdNSDBpTENJeE9DSTZJbnRjSW1sa1hDSTZNVGdzWENKdVlXMWxYQ0k2WENKU2IzUmhkR1VnTVRnd1hDSXNYQ0owZVhCbFhDSTZYQ0p3Y21WelpYUmNJaXhjSW1aaFpHVmNJanAwY25WbExGd2ljbTkwWVhSbFhDSTZNVGd3ZlNJc0lqRTVJam9pZTF3aWFXUmNJam94T1N4Y0ltNWhiV1ZjSWpwY0lsSnZkR0YwWlNBek5qQmNJaXhjSW5SNWNHVmNJanBjSW5CeVpYTmxkRndpTEZ3aVptRmtaVndpT25SeWRXVXNYQ0p5YjNSaGRHVmNJam96TmpCOUlpd2lNakFpT2lKN1hDSnBaRndpT2pJd0xGd2libUZ0WlZ3aU9sd2lVbTkwWVhSbElEa3dYQ0lzWENKMGVYQmxYQ0k2WENKd2NtVnpaWFJjSWl4Y0ltWmhaR1ZjSWpwMGNuVmxMRndpY205MFlYUmxYQ0k2T1RCOUlpd2lNakVpT2lKN1hDSnBaRndpT2pJeExGd2libUZ0WlZ3aU9sd2lVbTkwWVhSbElDMDVNRndpTEZ3aWRIbHdaVndpT2x3aWNISmxjMlYwWENJc1hDSm1ZV1JsWENJNmRISjFaU3hjSW5KdmRHRjBaVndpT2kwNU1IMGlMQ0l5TWlJNkludGNJbWxrWENJNk1qSXNYQ0p1WVcxbFhDSTZYQ0l6UkNCU2IzUmhkR1VnYkdWbWRGd2lMRndpZEhsd1pWd2lPbHdpY0hKbGMyVjBYQ0lzWENKbVlXUmxYQ0k2ZEhKMVpTeGNJblJ5WVc1emJHRjBaVmhjSWpvdE1qVXdMRndpY205MFlYUmxXVndpT2pJMU1IMGlMQ0l5TXlJNkludGNJbWxrWENJNk1qTXNYQ0p1WVcxbFhDSTZYQ0l6UkNCU2IzUmhkR1VnY21sbmFIUmNJaXhjSW5SNWNHVmNJanBjSW5CeVpYTmxkRndpTEZ3aVptRmtaVndpT25SeWRXVXNYQ0owY21GdWMyeGhkR1ZZWENJNk1qVXdMRndpY205MFlYUmxXVndpT2kweU5UQjlJaXdpTWpRaU9pSjdYQ0pwWkZ3aU9qSTBMRndpYm1GdFpWd2lPbHdpTTBRZ1VtOTBZWFJsSUhSdmNGd2lMRndpZEhsd1pWd2lPbHdpY0hKbGMyVjBYQ0lzWENKbVlXUmxYQ0k2ZEhKMVpTeGNJblJ5WVc1emJHRjBaVmxjSWpvdE1qVXdMRndpY205MFlYUmxXRndpT2pFMU1IMGlMQ0l5TlNJNkludGNJbWxrWENJNk1qVXNYQ0p1WVcxbFhDSTZYQ0l6UkNCU2IzUmhkR1VnWW05MGRHOXRYQ0lzWENKMGVYQmxYQ0k2WENKd2NtVnpaWFJjSWl4Y0ltWmhaR1ZjSWpwMGNuVmxMRndpZEhKaGJuTnNZWFJsV1Z3aU9qSTFNQ3hjSW5KdmRHRjBaVmhjSWpvdE1UVXdmU0lzSWpJMklqb2llMXdpYVdSY0lqb3lOaXhjSW01aGJXVmNJanBjSWxOclpYY2diR1ZtZEZ3aUxGd2lkSGx3WlZ3aU9sd2ljSEpsYzJWMFhDSXNYQ0ptWVdSbFhDSTZkSEoxWlN4Y0luUnlZVzV6YkdGMFpWaGNJam90TWpVd0xGd2ljMnRsZDFoY0lqb3RNalY5SWl3aU1qY2lPaUo3WENKcFpGd2lPakkzTEZ3aWJtRnRaVndpT2x3aVUydGxkeUJ5YVdkb2RGd2lMRndpZEhsd1pWd2lPbHdpY0hKbGMyVjBYQ0lzWENKbVlXUmxYQ0k2ZEhKMVpTeGNJblJ5WVc1emJHRjBaVmhjSWpveU5UQXNYQ0p6YTJWM1dGd2lPakkxZlNJc0lqSTRJam9pZTF3aWFXUmNJam95T0N4Y0ltNWhiV1ZjSWpwY0lsTnJaWGNnZEc5d1hDSXNYQ0owZVhCbFhDSTZYQ0p3Y21WelpYUmNJaXhjSW1aaFpHVmNJanAwY25WbExGd2lkSEpoYm5Oc1lYUmxXVndpT2kweU5UQXNYQ0p6YTJWM1dWd2lPaTB5TlgwaUxDSXlPU0k2SW50Y0ltbGtYQ0k2TWprc1hDSnVZVzFsWENJNlhDSlRhMlYzSUdKdmRIUnZiVndpTEZ3aWRIbHdaVndpT2x3aWNISmxjMlYwWENJc1hDSm1ZV1JsWENJNmRISjFaU3hjSW5SeVlXNXpiR0YwWlZsY0lqb3lOVEFzWENKemEyVjNXVndpT2kweU5YMGlMQ0l6TUNJNkludGNJbWxrWENJNk16QXNYQ0p1WVcxbFhDSTZYQ0pTYjNSaGRHVWdabkp2Ym5SY0lpeGNJblI1Y0dWY0lqcGNJbkJ5WlhObGRGd2lMRndpWm1Ga1pWd2lPblJ5ZFdVc1hDSjBjbUZ1YzJ4aGRHVmFYQ0k2TVRVd01DeGNJbkp2ZEdGMFpWd2lPakkxTUgwaUxDSXpNU0k2SW50Y0ltbGtYQ0k2TXpFc1hDSnVZVzFsWENJNlhDSlNiM1JoZEdVZ1ltRmphMXdpTEZ3aWRIbHdaVndpT2x3aWNISmxjMlYwWENJc1hDSm1ZV1JsWENJNmRISjFaU3hjSW5SeVlXNXpiR0YwWlZwY0lqb3RNVFV3TUN4Y0luSnZkR0YwWlZ3aU9qSTFNSDBpZlgwPSJ9',
	            'screenshot'=> ''// screenshot URL for this sample slider (preferred dimension: 223x128)
	        )
	    );
	    return $starters;
	}
	add_filter( 'masterslider_starter_fields', 'ebor_custom_masterslider_starter_fields' );
}