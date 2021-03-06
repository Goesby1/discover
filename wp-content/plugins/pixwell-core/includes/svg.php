<?php
/** Don't load directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'pixwell_get_svg' ) ) {
	/**
	 * @param string $svg_name
	 * @param string $color
	 * @param string $ui
	 *
	 * @return false|string
	 * get svg icon
	 */
	function pixwell_get_svg( $svg_name = '', $color = '', $ui = '' ) {

		$output = Pixwell_SVG_Icons::get_svg( $svg_name, $color, $ui );

		if ( empty( $ui ) ) {
			$output = wp_kses( $output,
				array(
					'svg'     => array(
						'class'       => true,
						'xmlns'       => true,
						'width'       => true,
						'height'      => true,
						'viewbox'     => true,
						'aria-hidden' => true,
						'role'        => true,
						'focusable'   => true,
					),
					'rect'    => array(
						'width'  => true,
						'height' => true,
					),
					'path'    => array(
						'fill'              => true,
						'fill-rule'         => true,
						'd'                 => true,
						'transform'         => true,
						'stroke'            => true,
						'stroke-miterlimit' => true,
					),
					'polygon' => array(
						'fill'      => true,
						'fill-rule' => true,
						'points'    => true,
						'transform' => true,
						'focusable' => true,
					)
				)
			);
		}

		if ( ! $output ) {
			return false;
		}

		return $output;
	}
}

if ( ! function_exists( 'pixwell_render_svg' ) ) {
	/**
	 * @param string $svg_name
	 * @param string $color
	 * @param string $ui
	 * render svg
	 */
	function pixwell_render_svg( $svg_name = '', $color = '', $ui = '' ) {
		echo pixwell_get_svg( $svg_name, $color, $ui );
	}
}

if ( ! class_exists( 'Pixwell_SVG_Icons', false ) ) {
	/**
	 * Class Pixwell_SVG_Icons
	 */
	class Pixwell_SVG_Icons {

		public static function get_svg( $icon, $color = '', $ui = '' ) {

            $data = self::$ui_icons;

			$data = apply_filters( 'pixwell_add_svg', $data );
			if ( array_key_exists( $icon, $data ) ) {
				$repl   = '<svg class="svg-icon" aria-hidden="true" role="img" focusable="false" ';
				$output = preg_replace( '/^<svg /', $repl, trim( $data[ $icon ] ) );
				if ( ! empty( $color ) ) {
					$output = str_replace( 'currentColor', $color, $output );
				}
				$output = preg_replace( "/([\n\t]+)/", ' ', $output );
				$output = preg_replace( '/>\s*</', '><', $output );

				return $output;
			}

			return null;
		}

		/** @var array svg data */
		public static $ui_icons = array(
            'mode-dark' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
			<path fill="currentColor" d="M507.681,209.011c-1.297-6.991-7.324-12.111-14.433-12.262c-7.104-0.122-13.347,4.711-14.936,11.643
						c-15.26,66.497-73.643,112.94-141.978,112.94c-80.321,0-145.667-65.346-145.667-145.666c0-68.335,46.443-126.718,112.942-141.976
						c6.93-1.59,11.791-7.826,11.643-14.934c-0.149-7.108-5.269-13.136-12.259-14.434C287.546,1.454,271.735,0,256,0
						C187.62,0,123.333,26.629,74.98,74.981C26.628,123.333,0,187.62,0,256s26.628,132.667,74.98,181.019
						C123.333,485.371,187.62,512,256,512s132.667-26.629,181.02-74.981C485.372,388.667,512,324.38,512,256
						C512,240.278,510.546,224.469,507.681,209.011z"/>
			</svg>',
            'mode-light' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
			<path fill="currentColor" d="M507.681,209.011c-1.297-6.991-7.323-12.112-14.433-12.262c-7.145-0.155-13.346,4.712-14.936,11.642
						c-15.26,66.498-73.643,112.941-141.978,112.941c-80.321,0-145.667-65.346-145.667-145.666
						c0-68.335,46.443-126.718,112.942-141.976c6.93-1.59,11.791-7.827,11.643-14.934c-0.149-7.108-5.269-13.136-12.259-14.434
						C287.545,1.454,271.735,0,256,0C187.62,0,123.333,26.629,74.98,74.981C26.629,123.333,0,187.62,0,256
						s26.629,132.667,74.98,181.019C123.333,485.371,187.62,512,256,512s132.667-26.629,181.02-74.981
						C485.371,388.667,512,324.38,512,256C512,240.278,510.547,224.469,507.681,209.011z M256,482C131.383,482,30,380.617,30,256
						c0-118.227,91.264-215.544,207.036-225.212c-14.041,9.63-26.724,21.303-37.513,34.681
						c-25.058,31.071-38.857,70.207-38.857,110.197c0,96.863,78.804,175.666,175.667,175.666c39.99,0,79.126-13.8,110.197-38.857
						c13.378-10.789,25.051-23.471,34.682-37.511C471.544,390.736,374.228,482,256,482z"/>
			</svg>',
            'bookmark' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
			<path fill="currentColor" d="M391.416,0H120.584c-17.778,0-32.242,14.464-32.242,32.242v460.413c0,7.016,3.798,13.477,9.924,16.895
			c2.934,1.638,6.178,2.45,9.421,2.45c3.534,0,7.055-0.961,10.169-2.882l138.182-85.312l138.163,84.693
			c5.971,3.669,13.458,3.817,19.564,0.387c6.107-3.418,9.892-9.872,9.892-16.875V32.242C423.657,14.464,409.194,0,391.416,0z
			 M384.967,457.453l-118.85-72.86c-6.229-3.817-14.07-3.798-20.28,0.032l-118.805,73.35V38.69h257.935V457.453z"/>
			</svg>',
			'audio-volume' =>'<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 477.526 477.526">
				<g>
					<g>
						<path d="M213.333,104.461c-5.28-3.049-11.786-3.049-17.067,0L80.794,170.424H17.067C7.641,170.424,0,178.065,0,187.49v102.4
							c0,9.426,7.641,17.067,17.067,17.067h63.727l115.541,66.014c8.185,4.675,18.609,1.83,23.284-6.354
							c1.472-2.577,2.246-5.492,2.247-8.46V119.224C221.86,113.133,218.608,107.507,213.333,104.461z"/>
					</g>
				</g>
				<g>
					<g>
						<path d="M286.362,176.79c-5.909-7.331-16.639-8.492-23.979-2.594c-7.347,5.904-8.517,16.647-2.613,23.994
							c0,0,0.001,0.001,0.001,0.002c17.649,24.115,17.649,56.883,0,80.998c-5.95,7.31-4.847,18.06,2.463,24.01s18.06,4.847,24.01-2.463
							c0.039-0.048,0.078-0.096,0.117-0.145C314.284,264.047,314.284,213.334,286.362,176.79z"/>
					</g>
				</g>
				<g>
					<g>
						<path d="M354.628,125.59c-5.909-7.331-16.639-8.492-23.979-2.594c-7.347,5.904-8.517,16.647-2.612,23.994
							c0,0.001,0.001,0.001,0.001,0.002c40.653,54.374,40.653,129.024,0,183.398c-5.95,7.31-4.847,18.06,2.463,24.01
							c7.31,5.95,18.06,4.847,24.01-2.463c0.039-0.048,0.078-0.096,0.117-0.145C404.771,284.727,404.771,192.654,354.628,125.59z"/>
					</g>
				</g>
				<g>
					<g>
						<path d="M422.895,74.39c-5.95-7.31-16.7-8.413-24.01-2.463c-7.254,5.904-8.405,16.547-2.58,23.865
							c63.352,84.734,63.352,201.065,0,285.798c-5.95,7.31-4.847,18.06,2.463,24.01c7.31,5.95,18.06,4.847,24.01-2.463
							c0.039-0.048,0.078-0.096,0.117-0.145C495.736,305.567,495.736,171.813,422.895,74.39z"/>
					</g>
				</g>
				</svg>',
		);
	}
}