<?php
/**
 * The shortcode plugin class.
 *
 * This is used to define shortcode.
 *
 * @since      1.0.0
 * @package    Acf_front_form
 * @subpackage Acf_front_form/includes
 * @author     Mourad Arifi <arifi.armedia@gmail.com>
 */

/**
 * Plugin base name.
 */
if ( ! defined( 'ACF_FRONT_FORM_NAME' ) ) define( 'ACF_FRONT_FORM_NAME', 'acf_front_form' );

/**
 * Currently pligin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
if ( ! defined( 'ACF_FRONT_FORM_VERSION' ) ) define( 'ACF_FRONT_FORM_VERSION', '1.2.0' );


if ( ! class_exists( 'Acf_front_form_Shortcode' )) :
class Acf_front_form_Shortcode {

    /**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
    private $version;
    
    /**
     * Array of acf_form args
     *
     * @var array
     */
    private $form_args;

    /**
     * bartag, the tag of the shortcode
     */
    private $bartag;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = ACF_FRONT_FORM_NAME;
        $this->version = ACF_FRONT_FORM_VERSION;
        $this->bartag = 'acf_front_form';

        /**
         * Default $args values of acf_form() function with extra shortcode settings
         * 
         * @link https://www.advancedcustomfields.com/resources/acf_form/
         */
        $this->form_args = array(

            /* (string) Unique identifier for the form. Defaults to 'acf-form' */
            'id' => 'acf-form',
            
            /* (int|string) The post ID to load data from and save data to. Defaults to the current post ID. 
            Can also be set to 'new_post' to create a new post on submit */
            'post_id' => false,
            
            /* (array) An array of post data used to create a post. See wp_insert_post for available parameters.
            The above 'post_id' setting must contain a value of 'new_post' */
            'new_post' => false,
            
            /* (array) An array of field group IDs/keys to override the fields displayed in this form */
            'field_groups' => false,
            
            /* (array) An array of field IDs/keys to override the fields displayed in this form */
            'fields' => false,
            
            /* (boolean) Whether or not to show the post title text field. Defaults to false */
            'post_title' => false,
            
            /* (boolean) Whether or not to show the post content editor field. Defaults to false */
            'post_content' => false,
            
            /* (boolean) Whether or not to create a form element. Useful when a adding to an existing form. Defaults to true */
            'form' => true,
            
            /* (array) An array or HTML attributes for the form element */
            'form_attributes' => false, // array(),
            
            /* (string) The URL to be redirected to after the form is submit. Defaults to the current URL with a GET parameter '?updated=true'.
            A special placeholder '%post_url%' will be converted to post's permalink (handy if creating a new post)
            A special placeholder '%post_id%' will be converted to post's ID (handy if creating a new post) */
            'return' => '',
            
            /* (string) Extra HTML to add before the fields */
            'html_before_fields' => '',
            
            /* (string) Extra HTML to add after the fields */
            'html_after_fields' => '',
            
            /* (string) The text displayed on the submit button */
            'submit_value' => __("Update", $this->plugin_name ),
            
            /* (string) A message displayed above the form after being redirected. Can also be set to false for no message */
            'updated_message' => __("Post updated", $this->plugin_name ),
            
            /* (string) Determines where field labels are places in relation to fields. Defaults to 'top'. 
            Choices of 'top' (Above fields) or 'left' (Beside fields) */
            'label_placement' => 'top',
            
            /* (string) Determines where field instructions are places in relation to fields. Defaults to 'label'. 
            Choices of 'label' (Below labels) or 'field' (Below fields) */
            'instruction_placement' => 'label',
            
            /* (string) Determines element used to wrap a field. Defaults to 'div' 
            Choices of 'div', 'tr', 'td', 'ul', 'ol', 'dl' */
            'field_el' => 'div',
            
            /* (string) Whether to use the WP uploader or a basic input for image and file fields. Defaults to 'wp' 
            Choices of 'wp' or 'basic'. Added in v5.2.4 */
            'uploader' => 'wp',
            
            /* (boolean) Whether to include a hidden input field to capture non human form submission. Defaults to true. Added in v5.3.4 */
            'honeypot' => true,
            
            /* (string) HTML used to render the updated message. Added in v5.5.10 */
            'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>',
            
            /* (string) HTML used to render the submit button. Added in v5.5.10 */
            'html_submit_button'	=> '<input type="submit" class="acf-button button button-primary button-large" value="%s" />',
            
            /* (string) HTML used to render the submit button loading spinner. Added in v5.5.10 */
            'html_submit_spinner'	=> '<span class="acf-spinner"></span>',
            
            /* (boolean) Whether or not to sanitize all $_POST data with the wp_kses_post() function. Defaults to true. Added in v5.6.5 */
            'kses'	=> true,

            /**
             * Extra shortcode settings
             */

             /** (boolean) Whether or not to add <table> tag before html_before_fields and </table> tag after html_after_fields
              * This works only if field_el is set to tr or td
              */
             'table_el' => false,

             /** (array) Text added into td tags. This will add the thead tag.
              * This works only if table_el is true 
              */
             'thead'    => '',

             /** (array) Text added into td tags. This will add the tfooter tag.
              * This works only if table_el is true 
              */
             'tfoot'    => '',

             /**
              * Extended Attributes
              */
            /**
             * Default new post title
             */
            'np_title'      => '',

            /**
             * Default new post type
             */
            'np_type'       => 'post',

            /**
             * Default new post status
             */
            'np_status'     => 'publish',

            /**
             * Alternative Return URL, used if return value is set to custom
             */
            'return_alt'    => '',

        );
    }

    /**
     * Singleton
     * 
     * @since 1.2.0
     */
    public static function Inst(){

        static $inst = null;
        if ( null === $inst ){
            $inst = new Acf_front_form_Shortcode( ACF_FRONT_FORM_NAME, ACF_FRONT_FORM_VERSION );
        }
        return $inst;
    }


    /**
     * Gets the shortcode tag
     *
     * @return void
     */
    public function get_bartag(){
        return $this->bartag;
    }
    /**
	 * Parse Shortcode settings, usage [acf_front_form]
	 *
	 * @param array $atts
	 * @return void
	 */
	public function acf_front_form_shortcode( $atts ) {
        
        // extract attributs
        extract(  shortcode_atts( $this->form_args, $atts ));

        // Handling boolean values
        $post_title     = (isset($post_title) && $post_title == 'Yes') ? true : false;
        $post_content   = (isset($post_content) && $post_content == 'Yes') ? true : false;
        $form           = (isset($form) && $form == 'Yes') ? true : false;
        $honeypot       = (isset($form) && $form == 'Yes') ? true : false;
        $kses           = (isset($kses) && $kses == 'Yes') ? true : false;
        // is table_el set ?
        $table_el = (isset($table_el) && $table_el == 'Yes') ? true : false;
        //
        // parsing into arrays
        $field_groups       = (isset($field_groups) && is_string($field_groups)) ? explode(",", $field_groups) : false;
        $fields             = (isset($fields) && is_string($fields)) ? explode(",", $fields) : false;
        $form_attributes    = (isset($form_attributes) && is_string($form_attributes)) ? explode(",", $form_attributes) : array();
        // thead / tfooter into array
        $thead      = (isset($thead) && is_string($thead)) ? explode(",", $thead) : false;
        $tfoot    = (isset($tfoot) && is_string($tfoot)) ? explode(",", $tfoot) : false;
        //
        // if return is set to custom, then get return_alt value
        $return = ( $return == 'custom' ) ? $return_alt : $return;

        ob_start();

        /**
         * Build table ?
         */
        if($field_el == 'tr' || $field_el == 'td'){
            
            if($table_el){ 
                
                $table_befor = '<table class="acf-form-table">';
                $table_after = '';
                if( $thead ){
                    
                    $table_befor .= '<thead><tr>';
                    foreach($thead as $td) {
                        if( !empty($td) ) $table_befor .= '<td><strong>' . $td . '</strong></td>';
                    }
                    $table_befor .= '</tr></thead>';
                }

                $table_befor .= '<tbody>';
                
                if ($field_el == 'td'){
                    $table_befor .= '<tr class="acf-form-td">';
                }

                $html_before_fields = $table_befor . $html_before_fields;

                //
                if ($field_el == 'td'){
                    $table_after .= '</tr>';
                }
                //
                if ($field_el == 'tr'){
                    //$table_after .= '</td>';
                }
    
                $table_after .= '</tbody>';
    
                if( $tfoot ){

                    $table_after .= '<tfoot><tr>';

                    foreach($tfoot as $td) if( !empty($td) ) $table_after .= '<td>' . $td . '</td>';

                    $table_after .= '</tr></tfoot>';
                }

                $table_after .= '</table>';
                
                $html_after_fields = $table_after . $html_after_fields;

            }
        }
        
        // parse new_post values into array
        if(isset($new_post) && $post_id == 'new_post'){

            $temp = str_replace( ",", "&", $new_post );
            parse_str( $temp,  $new_post );

            // override or set new_post values
            if( isset( $np_title ) && ! empty( $np_title )) $new_post['post_title'] = $np_title;
            if( isset( $np_type ) && ! empty( $np_type ) ) $new_post['post_type'] = $np_type;
            if( isset( $np_status ) && ! empty( $np_status ) ) $new_post['post_status'] = $np_status;

        }
        //
        
        // here the magic..
        acf_form(array(
            'id' => $id,
            'post_id' => $post_id,
            'post_title'	=> $post_title, // true,
            'post_content'	=> $post_content, //true
            'new_post' => $new_post,
            'field_groups' => $field_groups,
            'fields' => $fields,
            'form' => $form,
            'form_attributes' => $form_attributes,
            'return' => $return,
            'html_before_fields' => $html_before_fields,
            'html_after_fields' => $html_after_fields,
            'submit_value' => $submit_value,
            'updated_message' => $updated_message,
            'label_placement' => $label_placement,
            'instruction_placement' => $instruction_placement,
            'field_el' => $field_el,
            'uploader' => $uploader,
            'honeypot' => $honeypot,
            'html_updated_message'	=> $html_updated_message,
            'html_submit_button'	=> $html_submit_button,
            'html_submit_spinner'	=> $html_submit_spinner,
            'kses'	=> $kses
            )
        );


        // close tbody/tr/td tags
        
        return ob_get_clean();
    }
}
    
endif;
