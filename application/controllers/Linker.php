<?php
/*   ________________________________________
    |                 GarudaCBT              |
    |    https://github.com/garudacbt/cbt    |
    |________________________________________|
*/
 defined("\102\x41\x53\x45\120\101\x54\x48") or exit("\x4e\x6f\x20\144\151\x72\145\143\x74\40\163\x63\x72\x69\x70\164\x20\141\x63\x63\145\163\x73\40\141\x6c\x6c\x6f\167\x65\144"); class Linker extends CI_Controller { public function __construct() { parent::__construct(); } public function output_json($data, $encode = true) { goto iUxWm; M8RIz: v6Imj: goto yeq2L; iUxWm: if (!$encode) { goto v6Imj; } goto iMjzL; yeq2L: $this->output->set_content_type("\141\160\x70\154\x69\x63\141\164\151\x6f\156\x2f\152\x73\x6f\156")->set_output($data); goto JM54L; iMjzL: $data = json_encode($data); goto M8RIz; JM54L: } public function index() { $this->load->view("\x6c\x69\x6e\153\145\162"); } }
