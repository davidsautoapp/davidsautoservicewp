<?php
namespace ACF_FF_Elementor\Widgets;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use ACF_FF_Elementor\acf_ff_elementor;
/**
 * Press Elements Site Title
 *
 * Site title element for elementor.
 *
 * @since 1.0.0
 */
class ACF_Element_Form extends Widget_Base {

	/**
	 * ACF Field Groups
	 * 
	 * @var array
	 */
	protected $acf_groups;

	/**
	 * ACF Fields
	 * 
	 * @var array
	 */
	protected $acf_fields;

	public function get_name() {
		return 'acf-form';
	}

	public function get_title() {
		return __( 'ACF Form', $this->get_local() );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	public function get_categories() {
		return [ 'acf-front-form-elementor' ];
	}

	public function get_local(){
		return 'acf-front-form-elementor';
	}

	/**
     * Loads page URLs
     *
     * @since 1.2.0
     * @return void
     */
    protected function get_page_links(){
        $pages = get_posts([
            'post_type' => 'page',
            'numberposts' => -1,
		]);
		
		$page_links = [
			'none' => __( '- This page -', $this->get_local() ),
			'home' => __( '- Home URL -', $this->get_local() ),
		];

        if ( $pages ){
            foreach( $pages as $page ){
                $page_links[ $page->ID ] = $page->post_title;
            }
		}
		
		$page_links['custom'] = __( '- Custom URL -', $this->get_local() );

		return $page_links;
    }

	protected function load_acf_groups_fields(){
        /**
         * Get Groups Fields
         */
        
        $args = array(
            'numberposts' => -1,
            'post_type'   => 'acf-field-group'
        );
        
        $groups = get_posts( $args );

        if( $groups ){
            foreach( $groups as $g ){
                $this->acf_groups[ $g->ID ] = $g->post_title;
            }
        }

        /**
         * Get fields
         */
        
        $args = array(
            'numberposts' => -1,
            'post_type'   => 'acf-field',
            //'post_parent' => 944
        );
        
        $fields = get_posts( $args );

        if( $fields ){
            foreach( $fields as $f ){
                $this->acf_fields[ $f->ID ] = $f->post_title;
            }
        }
    }
	
	protected function add_controls_section_post(){

		$this->start_controls_section(
			'section_post',
			[
				'label' => __( 'Post', $this->get_local() ),
			]
		);

		$this->add_control(
			'post_id',
			[
				'label' => __( 'Post ID', $this->get_local() ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'post id or new_post', $this->get_local() ),
				'default' => 'new_post',
				'show_label' => true,
			]
		);

		$this->add_control(
			'new_post_heading',
			[
				'label'		=> __( 'New Post Values', $this->get_local() ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'post_id' => 'new_post',
				],
			]
		);
		
		$this->add_control(
			'np_title',
			[
				'label' => __( 'Post Title', $this->get_local() ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'show_label' => true,
				'condition' => [
					'post_id' => 'new_post',
				],
			]
		);
		
		$args = array(
            //'_builtin' => false,
            'public' => true
        );
        //
        $post_types = get_post_types($args, 'objects');
        //
        arsort( $post_types ); //, SORT_ASC );
        //
        $output = array();
        foreach ($post_types as $post_type) {
            $output[ $post_type->name ] = $post_type->label;
		}
		
		$this->add_control(
			'np_type',
			[
				'label' => __( 'Post Type', $this->get_local() ),
				'type' => Controls_Manager::SELECT,
				'default' => 'post',
				'options'	=> $output,
				'show_label' => true,
				'condition' => [
					'post_id' => 'new_post',
				],
			]
		);
		
		$this->add_control(
			'np_status',
			[
				'label' => __( 'Post Status', $this->get_local() ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'publish' 	=> [
						'title' => __( 'Publish', $this->get_local() ),
						'icon' 	=> 'eicon-check-circle',
					],
					'draft' 	=> [
						'title' => __( 'Draft', $this->get_local() ),
						'icon' 	=> 'fa fa-edit',
					],
					'private' 	=> [
						'title' => __( 'Private', $this->get_local() ),
						'icon' 	=> 'fa fa-lock',
					],
					'pending' 	=> [
						'title' => __( 'Pending', $this->get_local() ),
						'icon' 	=> 'fa fa-pause',
					],
					'trash' 	=> [
						'title' => __( 'Trash', $this->get_local() ),
						'icon' 	=> 'fa fa-trash',
					],
				],
				'default' => 'publish',
				'show_label' => true,
				'condition' => [
					'post_id' => 'new_post',
				],
			]
		);
		
		//	'new_post'    => '',
		$this->add_control(
			'new_post',
			[
				'label' => __( 'Additional New Post Variables', $this->get_local() ),
				'description'	=> __('One per line. New post values, Example : post_password=123. More details <a href="https://codex.wordpress.org/Class_Reference/WP_Post" target="_blank">here</a>', $this->get_local() ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'show_label' => true,
				'condition' => [
					'post_id' => 'new_post',
                ],
			]
		);
		
		$this->end_controls_section();
	}

	protected function add_controls_section_form(){
		
		$this->start_controls_section(
			'section_form',
			[
				'label' => __( 'Form', $this->get_local() ),
			]
		);

		$this->add_control(
			'form',
			[
				'label' => __( 'This is a Form', $this->get_local() ),
				'type' => Controls_Manager::SWITCHER,
				'description'	=> __( 'Whether or not to create a form element. Useful when a adding to an existing form. Defaults to Yes', $this->get_local() ),
				'default' => 'yes',
				'show_label' => true,
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', $this->get_local() ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', $this->get_local() ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', $this->get_local() ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', $this->get_local() ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', $this->get_local() ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		//id
		$this->add_control(
			'acf_form_id',
			[
				'label' => __( 'Form ID', $this->get_local() ),
				'type' => Controls_Manager::TEXT,
				'description'	=> __( 'Unique identifier for the form. Defaults to "acf-form"', $this->get_local() ),
				'default' => 'acf-form',
				'show_label' => true,
				'condition'	=> [
					'form'	=> 'yes'
				],
			]
		);

		//form_attributes
		$this->add_control(
			'form_attributes',
			[
				'label' => __( 'Form Attributes', $this->get_local() ),
				'type' => Controls_Manager::TEXTAREA,
				//'description'	=> __( 'One per line. List of HTML attributes for the form element', $this->get_local() ),
				'default' => '',
				'placeholder'	=> __( 'One per line. List of HTML attributes for the form element', $this->get_local() ),
				'show_label' => true,
				'condition'	=> [
					'form'	=> 'yes'
				],
			]
		);
		
		$this->add_control(
			'link_to',
			[
				'label' => __( 'Return to', $this->get_local() ),
				'description' => __('The Page where to be redirected to after the form is submit. Default to current page.', $this->get_local()),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => $this->get_page_links(),
				'condition'	=> [
					'form'	=> 'yes'
				],
			]
		);

		$this->add_control(
			'return',
			[
				'label' => __( 'Custom URL', $this->get_local() ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'http://your-custom-url.com', $this->get_local() ),
				'condition' => [
					'link_to' => 'custom',
					'form'	=> 'yes'
				],
				'default' => [
					'url' => '',
				],
				'show_label' => false,
			]
		);
		
		$this->add_control(
			'submit_value',
			[
				'label' => __( 'Submit Value', $this->get_local() ),
				'type' => Controls_Manager::TEXT,
				'description' => __( 'The text displayed on the submit button', $this->get_local() ),
				'placeholder' => __( 'Update', $this->get_local() ),
				'default' => 'Update',
				'show_label' => true,
				'condition'	=> [
					'form'	=> 'yes'
				],
			]
		);
		
		//updated_message
		$this->add_control(
			'updated_message',
			[
				'label' => __( 'Updated Message', $this->get_local() ),
				'type' => Controls_Manager::TEXT,
				'description'	=> __( 'A message displayed above the form after being redirected. Empty for no message', $this->get_local() ),
				'placeholder' => __( 'Post updated', $this->get_local() ),
				'default' => 'Post updated',
				'show_label' => true,
				'condition'	=> [
					'form'	=> 'yes'
				],
			]
		);

		//Whether or not to sanitize all $_POST data with the wp_kses_post() function. Defaults to true
		$this->add_control(
			'kses',
			[
				'label' => __( 'Sanitize with wp_kses_post()', $this->get_local() ),
				'type' => Controls_Manager::SWITCHER,
				'description'	=> __( 'Whether or not to sanitize all $_POST data with the wp_kses_post() function. Defaults to Yes', $this->get_local() ),
				'default' => 'yes',
				'show_label' => true,
				'condition'	=> [
					'form'	=> 'yes'
				],
			]
		);

        $this->end_controls_section();
	}

	protected function add_controls_section_fields(){

		$this->start_controls_section(
			'section_fields',
			[
				'label' => __( 'Fields', $this->get_local() ),
			]
		);
		
		$this->add_control(
			'show_title',
			[
				'label' => __( 'Show Title', $this->get_local() ),
				'type' => Controls_Manager::SWITCHER,
				'default' => false,
				'show_label' => true,
			]
        );
        $this->add_control(
			'show_content',
			[
				'label' => __( 'Show Content', $this->get_local() ),
				'type' => Controls_Manager::SWITCHER,
				'default' => false,
				'show_label' => true,
			]
		);

		$this->load_acf_groups_fields();

		$this->add_control(
			'field_groups',
			[
				'label'			=> __( 'Field Groups', $this->get_local() ),
				'type'			=> Controls_Manager::SELECT2,
				'options'		=> $this->acf_groups,
				'default'		=> '',
				'show_label'	=> true,
				'multiple'		=> true,
			]
		);
		$this->add_control(
			'fields',
			[
				'label'			=> __( 'Fields', $this->get_local() ),
				'type'			=> Controls_Manager::SELECT2,
				'options'		=> $this->acf_fields,
				'default'		=> '',
				'show_label'	=> true,
				'multiple'		=> true,
			]
		);

        $this->add_responsive_control(
			'field_el',
			[
				'label' => __( 'Field Element', $this->get_local() ),
				'description' => __("Determines element used to wrap a field. Defaults to 'div'", $this->get_local()),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'div' => [
						'title' => __( 'Division (div)', $this->get_local() ),
						'icon' 	=> 'eicon-slider-push',
					],
					'tr' => [
						'title'	=> __( 'Table Row (tr)', $this->get_local() ),
						'icon'	=> 'eicon-table',
					],
					'td' => [
						'title'	=> __( 'Table Data (td)', $this->get_local() ),
						'icon'	=> 'eicon-form-vertical',
					],
					'ul' => [
						'title'	=> __( 'Unordered List (ul)', $this->get_local() ),
						'icon'	=> 'eicon-editor-list-ul',
					],
					'ol' => [
						'title'	=> __( 'Ordered List (ol)', $this->get_local() ),
						'icon'	=> 'eicon-editor-list-ol',
					],
					'dl' => [
						'title'	=> __( 'Description List (dl)', $this->get_local() ),
						'icon'	=> 'eicon-post-list',
					],
				],
				'default' => 'div',
			]
		);

		$this->add_responsive_control(
			'label_placement',
			[
				'label' => __( 'Label Placement', $this->get_local() ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'top' => [
						'title' => __( 'Top', $this->get_local() ),
						'icon' 	=> 'fa fa-arrow-up',
					],
					'left' => [
						'title'	=> __( 'Left', $this->get_local() ),
						'icon'	=> 'fa fa-arrow-left',
					],
				],
				'default' => 'top',
			]
		);
		//instruction_placement
		$this->add_responsive_control(
			'instruction_placement',
			[
				'label' => __( 'Instruction Placement', $this->get_local() ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'label' => [
						'title' => __( 'Label', $this->get_local() ),
						'icon' 	=> 'eicon-align-left',
					],
					'field' => [
						'title'	=> __( 'Field', $this->get_local() ),
						'icon'	=> 'eicon-post-list',
					],
				],
				'default' => 'label',
			]
		);

		$this->add_control(
			'uploader',
			[
				'label' => __( 'Uploader', $this->get_local() ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'wp' => [
						'title' => __( 'WordPress', $this->get_local() ),
						'icon' 	=> 'fa fa-wordpress',
					],
					'basic' => [
						'title'	=> __( 'Basic', $this->get_local() ),
						'icon'	=> 'fa fa-upload',
					],
				],
				'default' => 'wp',
			]
		);

		//honeypot
		$this->add_control(
			'honeypot',
			[
				'label' 		=> __( 'Honeypot', $this->get_local() ),
				'type' 			=> Controls_Manager::SWITCHER,
				'description'	=> __( 'Whether to include a hidden input field to capture non human form submission. Defaults to Yes', $this->get_local()),
				'default' 		=> 'yes',
				'show_label'	=> true,
			]
		);

		$this->end_controls_section();
	}

	protected function add_controls_section_html(){

		$this->start_controls_section(
			'section_html',
			[
				'label' => __( 'HTML', $this->get_local() ),
			]
		);

		$this->add_control(
			'html_before_fields',
			[
				'label' => __( 'HTML Before Fields', $this->get_local() ),
				'description'	=> __('Extra HTML to add before the fields' , $this->get_local()),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => '',
				'default' => '',
				'show_label' => true,
			]
		);
		
		$this->add_control(
			'html_after_fields',
			[
				'label' => __( 'HTML After Fields', $this->get_local() ),
				'description'	=> __('Extra HTML to add after the fields' , $this->get_local()),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => '',
				'default' => '',
				'show_label' => true,
			]
		);
		//HTML Update Message
		$this->add_control(
			'html_updated_message',
			[
				'label' => __( 'HTML Update Message', $this->get_local() ),
				'description'	=> __('HTML used to render the updated message' , $this->get_local()),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => '',
				'default' => '<div id="message" class="updated"><p>%s</p></div>',
				'show_label' => true,
			]
		);
		//Submit Button
		$this->add_control(
			'html_submit_button',
			[
				'label' => __( 'Submit Button', $this->get_local() ),
				'description'	=> __('HTML used to render the submit button' , $this->get_local()),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => '',
				'default' => '<input type="submit" class="acf-button button button-primary button-large" value="%s" />',
				'show_label' => true,
			]
		);
		//Submit Spinner
		$this->add_control(
			'html_submit_spinner',
			[
				'label' => __( 'Submit Spinner', $this->get_local() ),
				'description'	=> __('HTML used to render the submit button loading spinner' , $this->get_local()),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => '',
				'default' => '<span class="acf-spinner"></span>',
				'show_label' => true,
			]
		);

		
		$this->end_controls_section();
	}

	protected function add_controls_section_table(){

		$this->start_controls_section(
			'section_table',
			[
				'label' => __( 'Table', $this->get_local() ),
				'condition' => [
                    'field_el'	=> [ 'td', 'tr' ]
                ],
			]
		);

		//	'table_el'
		$this->add_control(
			'table_el',
			[
				'label' => __( 'Add table tags', $this->get_local() ),
				'description'	=> __('Whether or not to add table tag. Works only if field_el is set to tr or td', $this->get_local() ),
				'type' => Controls_Manager::SWITCHER,
				'default' => false,
				'show_label' => true,
			]
		);
		//	'thead'    => '',
		$this->add_control(
			'thead',
			[
				'label' => __( 'Table Head Columns', $this->get_local() ),
				'description'	=> __('One per line. Text added into td tags. This will add the thead tag', $this->get_local() ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'show_label' => true,
				'condition' => [
                    'table_el'	=> 'yes',
                ],
			]
		);
		//	'tfoot'    => '',
		$this->add_control(
			'tfoot',
			[
				'label' => __( 'Table Footer Columns', $this->get_local() ),
				'description'	=> __('One per line. Text added into td tags. This will add the tfooter tag', $this->get_local() ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'show_label' => true,
				'condition' => [
                    'table_el'	=> 'yes'
                ],
			]
		);

		$this->end_controls_section();
	}
    
	protected function _register_controls() {

		$this->add_controls_section_post();

		$this->add_controls_section_form();

		$this->add_controls_section_fields();

		$this->add_controls_section_table();

		//$this->add_controls_section_html();
				
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Site Title', $this->get_local() ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => __( 'Text Color', $this->get_local() ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .acf_front_form_elementor-site-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .acf_front_form_elementor-site-title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .acf_front_form_elementor-site-title',
			]
        );
        
        $this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', $this->get_local() ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_section();

	}
	
	/**
	 * Whether the reload preview is required or not.
	 *
	 * Used to determine whether the reload preview is required.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return bool Whether the reload preview is required.
	 */
	public function is_reload_preview_required() {
		return true;
	}


	protected function render() {

		$args = $this->get_shortcode();
		
		$shortcode = do_shortcode( shortcode_unautop( $args ) );

		?>
		<div class="elementor-shortcode"><?php echo $shortcode; ?></div>
		<?php
		
	}
	private function get_shortcode(){

		$args = '[acf_front_form';

		/**
		 * Post Section
		 */
		$args .= ( $this->get_settings('post_id') ) ? ' post_id="'.$this->get_settings('post_id').'"' : '';

		if( $this->get_settings('post_id') == 'new_post'){
			$args .= ( $this->get_settings('np_title') ) ? ' np_title="'.$this->get_settings('np_title').'"' : '';
			$args .= ( $this->get_settings('np_status') ) ? ' np_status="'.$this->get_settings('np_status').'"' : '';
			$args .= ( $this->get_settings('np_type') ) ? ' np_type="'.$this->get_settings('np_type').'"' : '';
			
			/**
			 * New_Post attributes
			 */
			if ( $this->get_settings('new_post') ) {

				$fs = \explode( "\n", $this->get_settings('new_post') );

				$args .= ' new_post="';

				foreach ( $fs as $f ) {
					$args .= $f . ',';
				}
				$args = rtrim($args,",") . '"';
			}
		}

		/**
		 * Form section
		 */
		$args .= ( $this->get_settings('form') != 'yes' ) ? ' form="No"' : '';
		$args .= ( $this->get_settings('acf_form_id') != 'acf-form' ) ? ' id="'.$this->get_settings('acf_form_id').'"' : '';

		if ( $this->get_settings('form_attributes') ) {

			$fatts = \explode( "\n", $this->get_settings('form_attributes') );

			$args .= ' form_attributes="';

			foreach ( $fatts as $fa ) {
				$args .= $fa . ',';
			}
			$args = rtrim($args,",") . '"';
		}
		
		switch ( $this->get_settings('link_to') ) {

			case 'none':
				// do nothing
				break;
			case 'home':
				$args .= ' return="' . home_url() . '"';
				break;
			case 'custom':
				if ( $this->get_settings('return') ) {

					$url = $this->get_settings('return')['url'];

					if ( filter_var($url, FILTER_VALIDATE_URL) !== FALSE ) {

						$args .= ' return="' . $url . '"';
					}
				}
				break;
			default:
				if ( \is_numeric( $this->get_settings('link_to') ) ) {
					$args .= ' return="' . get_permalink( $this->get_settings('link_to') ) . '"';
				}
				break;
		}
		$args .= ( $this->get_settings('submit_value') ) ? ' submit_value="'. $this->get_settings('submit_value') . '"' : '';
		$args .= ( $this->get_settings('updated_message') ) ? ' updated_message="'. $this->get_settings('updated_message') . '"' : '';
		$args .= ( $this->get_settings('kses') != 'yes' ) ? ' kses="No"' : '';

		/**
		 * Fields section
		 */
		$args .= ( $this->get_settings('show_title') ) ? ' post_title="Yes"' : '';
		$args .= ( $this->get_settings('show_content') ) ? ' post_content="Yes"' : '';
		//
		$args .= ( $this->get_settings('field_el') != 'div' ) ? ' field_el="'. $this->get_settings('field_el').'"' : '';
		$args .= ( $this->get_settings('label_placement') != 'top' ) ? ' label_placement="'.$this->get_settings('label_placement').'"' : '';
		$args .= ( $this->get_settings('instruction_placement') != 'label' ) ? ' instruction_placement="'.$this->get_settings('instruction_placement').'"' : '';
		$args .= ( $this->get_settings('uploader') != 'wp' ) ? ' uploader="'.$this->get_settings('uploader').'"' : '';

		if ( $this->get_settings('field_groups') ) {

			$fgs = $this->get_settings('field_groups');

			$args .= ' field_groups="';

			foreach ( $fgs as $fg ) {
				$args .= $fg . ',';
			}
			$args = rtrim($args,",") . '"';
		}

		if ( $this->get_settings('fields') ) {

			$fs = $this->get_settings('fields');

			$args .= ' fields="';

			foreach ( $fs as $f ) {
				$args .= $f . ',';
			}
			$args = rtrim($args,",") . '"';
		}
		$args .= ( $this->get_settings('honeypot') != 'yes' ) ? ' honeypot="No"' : '';

		/**
		 * Table Section
		 */
		if ( $this->get_settings('table_el') == 'yes' ) {

			$args .= ' table_el="Yes"';

			/**
			 * Table header columns
			 */
			if ( $this->get_settings('thead') ) {

				$fs = \explode( "\n", $this->get_settings('thead') );

				$args .= ' thead="';

				foreach ( $fs as $f ) {
					$args .= $f . ',';
				}
				$args = rtrim($args,",") . '"';
			}

			/**
			 * Table header columns
			 */
			if ( $this->get_settings('tfoot') ) {

				$fs = \explode( "\n", $this->get_settings('tfoot') );

				$args .= ' tfoot="';

				foreach ( $fs as $f ) {
					$args .= $f . ',';
				}
				$args = rtrim($args,",") . '"';
			}
		}
		//
		$args .= ']';

		return $args;

	}
	/**
	 * Render shortcode widget as plain content.
	 *
	 * Override the default behavior by printing the shortcode insted of rendering it.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function render_plain_content() {
		// In plain mode, render without shortcode
		echo $this->get_shortcode();
	}


	protected function _content_template() {}
}
